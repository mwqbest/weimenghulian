<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
	/**
	 * @desc 获取菜单
	 * @return [string]
	 */
	public function getMenus(){
		if(session('admin_info.role_id')){
			$menu = array();
			$node_ids_res = M("Access") -> where("role_id=" . session('admin_info.role_id')) -> getField("node_id");
			$menu = M("Menu");
				// 读取该用户组的权限节点
			$node_id = "";
			foreach (unserialize ( $node_ids_res ) as $row) {// 通过反序列化转化数据
				$node_id .= $row . ",";
			}
			$node_id = substr($node_id, 0, -1);
			//读取数据库模块列表生成菜单项
			$where = "status=1 and isnav=1 and parent_id=0 and id in($node_id)";
			$list = $menu  -> cache(true)-> where($where) -> order('sortby asc,id asc') -> select();

			//children
			foreach ($list as $key => $value) {
				$list[$key]['href'] = U($value['module'] . '/' . $value['function']);
				$list[$key]['children']= $this->getMenuTree($value['id'],$node_id);
			}
			$result = array('code' => 128 , 'msg' => 'success','data'=>$list );
        	ajaxOutput( $result );
        	exit();
		}else{
			$result = array('code' => 129 , 'msg' => '没有权限' );
        	ajaxOutput( $result );
        	exit();
		}
	}

	private function getMenuTree($pid=0,$node_id=0){
		if(!$pid){
			return array();
			return false;
		}
		$where ='1=1';
		$where .= " and status=1 and isnav=1 and parent_id=$pid";
		if($node_id){
			$where .= " and id in ($node_id)";
		}
		$list = M("Menu") -> cache(true)-> where($where) -> order('sortby asc,id asc') -> select();
		foreach ($list as $key => $v) {
			$list[$key]['href'] = U($v['module'] . '/' . $v['function']);
		}
		return $list;
	}

	/**
	 * 后台主页
	 */
	public function main() {
		$disk_space = @disk_free_space(".") / pow(1024, 2);
		$server_info = array('操作系统' => PHP_OS, '运行环境' => $_SERVER["SERVER_SOFTWARE"], '上传附件限制' => ini_get('upload_max_filesize'), '执行时间限制' => ini_get('max_execution_time') . '秒', '服务器域名/IP' => $_SERVER['SERVER_NAME'] . ' [ ' . gethostbyname($_SERVER['SERVER_NAME']) . ' ]', '剩余空间' => round($disk_space < 1024 ? $disk_space : $disk_space / 1024, 2) . ($disk_space < 1024 ? 'M' : 'G'), );
		$this -> assign('set', $this -> setting);
		$this -> assign('server_info', $server_info);

		/*统计数据*/
		// $user = M('Wxuser');
		// $count = $user -> where(" (TO_DAYS(from_unixtime(subscribe_time))=TO_DAYS(NOW()))") -> count();
		// $this -> assign('count', $count);
		// $qxcount = $user -> where(" (TO_DAYS(from_unixtime(unsubscribe_time))=TO_DAYS(NOW())) and isfocus=0") -> count();
		// $this -> assign('qxcount', $qxcount);
		// $msg = M('Usermsg');
		// $msgcount = $msg -> where(" (TO_DAYS(from_unixtime(createtime))=TO_DAYS(NOW()) and replyid=0)") -> count();
		// $this -> assign('msgcount', $msgcount);
		// $usercount = $user -> where("isfocus=1") -> count();
		// $this -> assign('usercount', $usercount);
		// $this -> assign('role_id', session('admin_info.role_id'));

		$this -> display();
	}

	/**
	 * @desc 登陆
	 * @return strint
	 */
	public function login() {
		if ($_POST) {
			$admin_mod = M('User');
			$username  =  I('post.username','','strip_tags,htmlspecialchars'); // 采用htmlspecialchars方法对$_POST['name'] 进行过滤，如果不存在则返回空字符串
			$password =  I('post.password','','');
			$verify   =  I('post.verify','','');
			if(!$this->check_verify($verify)){
				$result = array('code' => 129 , 'msg' => '验证码输入错误!'  );
        		ajaxOutput( $result );
        		exit();
			}
			if (!$username || !$password) {
				$result = array('code' => 129 , 'msg' => '用户名或密码不能为空！' );
        		ajaxOutput( $result );
        		exit();
			}

			//生成认证条件
			$map = array();
			$map['user_name'] = $username;
			$map["status"] = array('gt', 0);
			$admin_info = $admin_mod -> where("user_name='$username'") -> find();

			//使用用户名、密码和状态的方式进行认证
			if (!$admin_info) {
				$result = array('code' => 129 , 'msg' => '帐号不存在或已禁用！'  );
        		ajaxOutput( $result );
        		exit();
			} else {
				if ($admin_info['password'] != md5($password)) {
					$result = array('code' => 129 , 'msg' => '密码错误！'  );
        			ajaxOutput( $result );
        			exit();
				}
                session("admin_info",$admin_info);
				if ($admin_info['user_name'] == 'admin') {
					session("administrator",true);
				}
				$result = array('code' => 128 , 'msg' => '登录成功！' , 'data' => u('Index/index') );
        		ajaxOutput( $result );
        		exit();
			}
		}
		$this -> display();
	}

	//修改密码
	public function updatePwd() {
		$admin_info = session('admin_info');
		$this->assign('user_name',$admin_info['user_name']);
		$this -> display();
	}
	//ajax修改密码
	public function ajaxUpdatePwd(){
		if ($_POST) {
			$oldpwd  =  I('post.oldpwd','','');
			$newpwd  =  I('post.newpwd','','');
			$rnewpwd =  I('post.rnewpwd','','');
			if(!$oldpwd){
				$result = array('code' => 129 , 'msg' => '旧密码不能为空!' );
	        	ajaxOutput( $result );
	        	exit();
			}
			if(!$newpwd){
				$result = array('code' => 129 , 'msg' => '新密码不能为空!' );
	        	ajaxOutput( $result );
	        	exit();
			}
			if(!$rnewpwd){
				$result = array('code' => 129 , 'msg' => '确认密码不能为空!' );
	        	ajaxOutput( $result );
	        	exit();
			}
			if($rnewpwd !=$newpwd){
				$result = array('code' => 129 , 'msg' => '新密码与确认密码不一致!' );
	        	ajaxOutput( $result );
	        	exit();
			}
			//检查旧密码是否正确
			$User = new \Admin\Model\UserModel();
			$user_info = $User ->getUserInfoById(session('admin_info.id'));
			if($user_info['password'] != md5($oldpwd)){
				$result = array('code' => 129 , 'msg' => '旧密码不正确!' );
	        	ajaxOutput( $result );
	        	exit();
			}
			$data=array(
					'password' =>md5($newpwd),
					'id'=>session('admin_info.id')
				);
			$res = $User->editUser($data);
			if($res){
				$result = array('code' => 128 , 'msg' => '修改成功!' );
			}else{
				$result = array('code' => 129 , 'msg' => '修改失败!' );
			}
			ajaxOutput( $result );
	        exit();
		} else {
			$result = array('code' => 129 , 'msg' => '数据不能为空,修改失败!' );
        	ajaxOutput( $result );
        	exit();
		}
	}

	//基本设置
	public function config() {

		if ($_POST) {
			F('site', I('post.site'), './');
			$this -> success('操作成功!', u('public/config'));

		} else {
			$site =
			require './site.php';
			$this -> assign('set', $site);
			$this -> display();
		}
		$data = F('site');
		// dump($data);

	}

	//退出
	public function logout() {
		session('admin_info',null);
		$result = array('code' => 128 , 'msg' => '退出成功!' );
    	ajaxOutput( $result );
    	exit();
	}

	//验证码
	public function verify() {
		$config = array('fontSize' => 200,    // 验证码字体大小  
				  		'length'   => 4,     // 验证码位数    
				  		'useNoise' => false, // 关闭验证码杂点
				  		'useCurve' => false,
				  		);

		$Verify =  new \Think\Verify($config);// 设置验证码字符为纯数字
		$Verify->codeSet = '0123456789';
		$Verify->entry();
	}
	// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
	function check_verify($code, $id = ''){ 
	     $verify = new \Think\Verify();  
	     return $verify->check($code, $id);
	}

	//公共上传图片方法
	public function upload()
	{   
		$type = $_POST['type']?intval($_POST['type']):0;
		if($type==1){
			$savepath = 'Product/';
		}else if($type==2){
			$savepath = 'News/';
		}else{
			$savepath = 'Others/';
		}
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   = 3145728 ;// 设置附件上传大小    
		$upload->exts      = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->autoSub   = true;
		$upload->subName   = array('date','Ymd');
		$upload->rootPath  = './Uploads/';
		$upload->savePath  = $savepath; // 设置附件上传（子）目录
		$upload->saveName  = time().'_'.mt_rand();
		$upload->saveRule  = uniqid;
		$info = $upload->upload();
		if (!$info) {
			//捕获上传异常
			$result = array('code' => 129 , 'msg' => 'error' , 'data' => $upload->getError() );
		}else{
			$pic = $upload->rootPath.$info['file']['savepath'].$info['file']['savename'];
			$result = array('code' => 128 , 'msg' => 'success' , 'data' => $pic );
		}
		ajaxOutput( $result );
		exit();
	}

}
