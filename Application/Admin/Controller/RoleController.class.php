<?php
namespace Admin\Controller;
class RoleController extends BaseController
{
	function index()
	{
		$role_mod = M('Role');
		$where = '1=1 ';
		if($keyword){
			$where .= " and name like '%".$keyword."%'";
			$this->assign('keyword', $keyword);
		}
		import("ORG.Util.Page");
		$prex = C('DB_PREFIX');
		$count = $role_mod->where($where)->count();
		$p = new \Think\Page($count,15);
 		$role_list = $role_mod->where($where)->limit($p->firstRow.','.$p->listRows)->order('id asc')->select();

		$page = $p->show();
		$this->assign('page',$page);
		$this->assign('role_list',$role_list);
		$this->display();
	}

	public function userOption(){
		//获取用户角色
		$User = new \Admin\Model\UserModel();
		$role_list = $User ->getUserRole();
		
		//修改 获取修改用户信息
		$id = $_GET['id']?intval($_GET['id']):0;
		if($id){
			$info = $User ->getUserInfoById($id);
		}
		$this ->assign('info',$info);
		$this ->assign('role_list',$role_list);
		$this->display();
	}

	public function ajaxAddUser(){
		$user_name = I('post.user_name','','strip_tags,htmlspecialchars');
		$id        = $_POST['id']?intval($_POST['id']):0;
		if(!isset($user_name)||($user_name=='')){
			$result = array('code' => 129 , 'msg' => '用户名不能为空');
			ajaxOutput( $result );
			exit();
		}
		
 		$User = new \Admin\Model\UserModel($user_name);
 		if(!$id){
 			$result = $User->isNameExist($_POST['user_name']);
			if($result){
			    $this->error('管理员'.$user_name.'已经存在');
			}
 		}
		
		$data = array(
			'user_name'=>$user_name,
			'sex'=>I('post.sex',0),
			'role_id'=>I('post.role_id',0),
			'realname'=>I('post.realname','','strip_tags,htmlspecialchars'),
			'email'=>I('post.email','','strip_tags,htmlspecialchars'),
			'phone'=>I('post.phone','','strip_tags,htmlspecialchars'),
		);
		if($id>0){
			$data['id'] = $id;
			$res  = $User ->editUser($data);
		}else{
			$data['add_time'] = time();
			$data['password'] = md5(trim($_POST['password']));
			$res  = $User ->addUser($data);
		}
		if($res>0){
			$result = array('code' => 128 , 'msg' => '操作成功');
		}else{
			$result = array('code' => 129 , 'msg' => '操作失败');
		}
		ajaxOutput( $result );
		exit();
	}

	/**
	 * @desc 用户修改状态
	 * @return null
	 */
	public function ajaxDelUser(){
		$param['id'] 	= $_POST['id']?intval($_POST['id']):0;
		if(!$param['id']){
			$result = array('code' => 129 , 'msg' => '参数错误');
			ajaxOutput( $result );
			exit();
		}
		$User = new \Admin\Model\UserModel();
		$res  = $User->delUser($param);
		if($res>0){
			$result = array('code' => 128 , 'msg' => '操作成功');
		}else{
			$result = array('code' => 129 , 'msg' => '操作失败');
		}
		ajaxOutput( $result );
		exit();
	}
}
?>