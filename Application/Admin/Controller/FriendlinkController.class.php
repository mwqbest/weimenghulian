<?php
namespace Admin\Controller;
class FriendlinkController extends BaseController
{
	function index()
	{	

		$keyword = $_GET['keyword']?trim($_GET['keyword']):'';
		$prex = C('DB_PREFIX');
		$where ='1=1';
		if($keyword){
			$where .= " and name like '%".$keyword."%'";
			$this->assign('keyword', $keyword);
		}
		$friendlink_mod = M('Friend_link');
		import("ORG.Util.Page");
		
		$count = $friendlink_mod->where($where)->count();
		$p = new \Think\Page($count,15);

		$friendlink_list = $friendlink_mod->where($where)->limit($p->firstRow.','.$p->listRows)->order('orderby asc')->select();
		foreach($friendlink_list as $k=>$val){
			$friendlink_list[$k]['key'] = ++$p->firstRow;
		}
		$page = $p->show();
		$this->assign('page',$page);
		$this->assign('friendlink_list',$friendlink_list);
		$this->display();
	}

	/**
	 * @desc 友情链接添加 修改
	 * @return null
	 */
	public function friendlinkOption(){
		//获取文章分类
		$friendlink_mod = new \Admin\Model\Friend_linkModel();
		
		//修改 获取修改文章信息
		$id = $_GET['id']?intval($_GET['id']):0;
		if($id){
			$info = $friendlink_mod ->getFriendlinkInfoById($id);
		}
		$this ->assign('info',$info);
		$this->display();
	}

	/**
	 * @desc ajax友情链接添加修改
	 * @return null
	 */
	public function ajaxAddFriendlink(){
		if(!isset($_POST['name'])||($_POST['name']=='')){
			$result = array('code' => 129 , 'msg' => '名称不能为空');
			ajaxOutput( $result );
			exit();
		}
		$data = array(
			'name'=>I('post.name','','strip_tags,htmlspecialchars'),
			'url'=>I('post.url','','strip_tags,htmlspecialchars'),
			'orderby'=>I('post.orderby',0), 
			'describe'=>I('post.describe','','strip_tags,htmlspecialchars'),
			'content'=>I('post.content',''),
		);
		$id   = $_POST['id']?intval($_POST['id']):0;
		$friendlink_mod = new \Admin\Model\Friend_linkModel();
		if($id>0){
			$data['id'] = $id;
			$res  = $friendlink_mod ->editFriendlink($data);
		}else{
			$data['add_time'] = time();
			$res  = $friendlink_mod ->addFriendlink($data);
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
	 * @desc 友情链接修改状态
	 * @return null
	 */
	public function ajaxDelFriendlink(){
		$param['id'] 	= $_POST['id']?intval($_POST['id']):0;
		$param['type'] 	= $_POST['type']?intval($_POST['type']):0;
		if(!$param['id']){
			$result = array('code' => 129 , 'msg' => '参数错误');
			ajaxOutput( $result );
			exit();
		}
		$friendlink_mod = new \Admin\Model\Friend_linkModel();
		$res  = $friendlink_mod->delFriendlink($param);
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