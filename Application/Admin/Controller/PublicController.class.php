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
			$list = $menu -> cache(true) -> where($where) -> order('sortby asc,id asc') -> select();
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
		$list = M("Menu") -> cache(true) -> where($where) -> order('sortby asc,id asc') -> select();
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
	public function pass() {

		if (I('post.dosubmit')) {

			$user_mod = M('User');
			$data['password'] = md5(I('post.password'));
			$data['id'] = session('admin_info.id');
			$user_mod -> save($data);

			$this -> success('操作成功!', u('public/pass'));

		} else {
			$this -> display();
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
		if (session('?admin_info')) {
			session('admin_info',null);
			$this -> success('退出登录成功！', u('public/login'));
		} else {
			$this -> redirect(u('public/login'));
		}
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
		//import("ORG.Util.Image");
		//Image::buildImageVerify();
	}
	// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
	function check_verify($code, $id = ''){ 
	     $verify = new \Think\Verify();  
	     return $verify->check($code, $id);
	 }

}