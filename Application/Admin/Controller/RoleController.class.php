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

	public function roleOption(){
		//修改 获取修改用户信息
		$id = $_GET['id']?intval($_GET['id']):0;
		if($id){
			//获取用户角色
			$Role = new \Admin\Model\RoleModel();
			$info = $Role ->getRoleInfoById($id);
		}
		$this ->assign('info',$info);
		$this->display();
	}

	public function ajaxAddRole(){
		$name = I('post.name','','strip_tags,htmlspecialchars');
		$id        = $_POST['id']?intval($_POST['id']):0;
		if(!isset($name)||($name=='')){
			$result = array('code' => 129 , 'msg' => '角色名称不能为空');
			ajaxOutput( $result );
			exit();
		}
		
 		$Role = new \Admin\Model\RoleModel();
		$data = array(
			'name'=>$name,
			'remark'=>I('post.remark','','strip_tags,htmlspecialchars')
		);
		if($id>0){
			$data['id'] = $id;
			$data['update_time'] = time();
			$res  = $Role ->editRole($data);
		}else{
			$data['add_time'] = time();
			$res  = $Role ->addRole($data);
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
	 * @desc 角色修改状态
	 * @return null
	 */
	public function ajaxDelRole(){
		$param['id'] 	= $_POST['id']?intval($_POST['id']):0;
		if(!$param['id']){
			$result = array('code' => 129 , 'msg' => '参数错误');
			ajaxOutput( $result );
			exit();
		}
		$Role = new \Admin\Model\RoleModel();
		$res  = $Role->delRole($param);
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