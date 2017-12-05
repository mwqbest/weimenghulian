<?php
namespace Admin\Controller;
class NewsController extends BaseController
{
	function index()
	{	

		$keyword = $_GET['keyword']?trim($_GET['keyword']):'';
		$prex = C('DB_PREFIX');
		$where ='1=1';
		if($keyword){
			$where .= " and title like '%".$keyword."%'";
			$this->assign('keyword', $keyword);
		}
		$news_mod = M('News');
		import("ORG.Util.Page");
		
		$count = $news_mod->where($where)->count();
		$p = new \Think\Page($count,15);

		$news_list = $news_mod->field($prex.'news.*,'.$prex.'news_category.name as cate_name')->where($where)->join('LEFT JOIN '.$prex.'news_category ON '.$prex.'news.cate_id = '.$prex.'news_category.id ')->limit($p->firstRow.','.$p->listRows)->order($prex.'news.add_time DESC')->select();
		foreach($news_list as $k=>$val){
			$news_list[$k]['key'] = ++$p->firstRow;
		}
		$page = $p->show();
		$this->assign('page',$page);
		$this->assign('news_list',$news_list);
		$this->display();
	}

	/**
	 * @desc 新闻添加 修改
	 * @return null
	 */
	public function newsOption(){
		//获取文章分类
		$News = new \Admin\Model\NewsModel();
		$category_list = $News ->getNewsCategory();
		
		//修改 获取修改文章信息
		$id = $_GET['id']?intval($_GET['id']):0;
		if($id){
			$info = $News ->getNewsInfoById($id);
		}
		$this ->assign('info',$info);
		$this ->assign('category_list',$category_list);
		$this->display();
	}

	/**
	 * @desc ajax新闻添加 修改
	 * @return null
	 */
	public function ajaxAddNews(){
		if(!isset($_POST['title'])||($_POST['title']=='')){
			$result = array('code' => 129 , 'msg' => '标题不能为空');
			ajaxOutput( $result );
			exit();
		}
		$data = array(
			'title'=>I('post.title','','strip_tags,htmlspecialchars'),
			'author'=>I('post.author','','strip_tags,htmlspecialchars'),
			'is_hot'=>I('post.is_hot',0),
			'status'=>I('post.status',0),
			'cate_id'=>I('post.cate_id',0),
			'view'=>I('post.view',0),
			'sort'=>I('post.sort',0), 
			'img'=>I('post.img',''), 
			'seo_key'=>I('post.seo_key','','strip_tags,htmlspecialchars'),
			'abstract'=>I('post.abstract','','strip_tags,htmlspecialchars'),
			'content'=>$_POST['content']?trim($_POST['content']):'',
		);
		$id   = $_POST['id']?intval($_POST['id']):0;
		$News = new \Admin\Model\NewsModel();
		if($id>0){
			$data['id'] = $id;
			$res  = $News ->editNews($data);
		}else{
			$data['add_time'] = $_POST['add_time']?strtotime($_POST['add_time']):time();
			$res  = $News ->addNews($data);
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
	 * @desc 新闻修改状态
	 * @return null
	 */
	public function ajaxDelNews(){
		$param['id'] 	= $_POST['id']?intval($_POST['id']):0;
		if(!$param['id']){
			$result = array('code' => 129 , 'msg' => '参数错误');
			ajaxOutput( $result );
			exit();
		}
		$News = new \Admin\Model\NewsModel();
		$res  = $News->delNews($param);
		if($res>0){
			$result = array('code' => 128 , 'msg' => '操作成功');
		}else{
			$result = array('code' => 129 , 'msg' => '操作失败');
		}
		ajaxOutput( $result );
		exit();
	}
	
	/**
	 * @desc 新闻审核
	 * @return null
	 */
	public function ajaxAuditNews(){
		$param['id'] 	= $_POST['id']?intval($_POST['id']):0;
		if(!$param['id']){
			$result = array('code' => 129 , 'msg' => '参数错误');
			ajaxOutput( $result );
			exit();
		}
		$News = new \Admin\Model\NewsModel();
		$res  = $News->auditNews($param);
		if($res>0){
			$result = array('code' => 128 , 'msg' => '操作成功');
		}else{
			$result = array('code' => 129 , 'msg' => '操作失败');
		}
		ajaxOutput( $result );
		exit();
	}
	/**
	 * @desc 新闻分类
	 * @return null
	 */
	public function news_category(){
		$keyword = $_GET['keyword']?trim($_GET['keyword']):'';
		$prex = C('DB_PREFIX');
		$where ='1=1';
		if($keyword){
			$where .= " and name like '%".$keyword."%'";
			$this->assign('keyword', $keyword);
		}
		$news_cate_mod = M('News_category');
		import("ORG.Util.Page");
		
		$count = $news_cate_mod->where($where)->count();
		$p = new \Think\Page($count,15);

		$news_cate_list = $news_cate_mod->where($where)->limit($p->firstRow.','.$p->listRows)->order('sort asc')->select();
		$page = $p->show();
		$this->assign('page',$page);
		$this->assign('news_cate_list',$news_cate_list);
		$this->display();
	}
	/**
	 * @desc 新闻分类添加 修改
	 * @return null
	 */
	public function newsCateOption(){
		//获取文章分类
		$NewsCate = new \Admin\Model\NewsModel();
		$category_list = $NewsCate ->getNewsCategory(array('type'=>1));
		
		//修改 获取修改文章分类信息
		$id = $_GET['id']?intval($_GET['id']):0;
		if($id){
			$info = $NewsCate ->getNewsCateInfoById($id);
		}
		$this ->assign('info',$info);
		$this ->assign('category_list',$category_list);
		$this->display();
	}
	
	/**
	 * @desc ajax新闻分类添加 修改
	 * @return null
	 */
	public function ajaxAddNewsCate(){
		if(!isset($_POST['name'])||($_POST['name']=='')){
			$result = array('code' => 129 , 'msg' => '分类名称不能为空');
			ajaxOutput( $result );
			exit();
		}
		$data = array(
			'name'=>I('post.name','','strip_tags,htmlspecialchars'),
			'is_show'=>I('post.is_show',0),
			'pid'=>I('post.pid',0),
			'sort'=>I('post.sort',0), 
			'keyword'=>I('post.keyword','','strip_tags,htmlspecialchars'),
			'description'=>I('post.description','','strip_tags,htmlspecialchars'),
		);
		$id   = $_POST['id']?intval($_POST['id']):0;
		$News = new \Admin\Model\NewsModel();
		if($id>0){
			$data['id'] = $id;
			$res  = $News ->editNewsCategory($data);
		}else{
			$res  = $News ->addNewsCategory($data);
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
	 * @desc 新闻修改状态
	 * @return null
	 */
	public function ajaxDelNewsCategory(){
		$param['id'] 	= $_POST['id']?intval($_POST['id']):0;
		if(!$param['id']){
			$result = array('code' => 129 , 'msg' => '参数错误');
			ajaxOutput( $result );
			exit();
		}
		$News = new \Admin\Model\NewsModel();
		$res  = $News->delNewsCategory($param);
		if($res>0){
			$result = array('code' => 128 , 'msg' => '操作成功');
		}else{
			$result = array('code' => 129 , 'msg' => '操作失败');
		}
		ajaxOutput( $result );
		exit();
	}

	/**
	 * @desc 新闻分类审核
	 * @return null
	 */

	public function ajaxAuditNewsCategory(){
		$param['id'] 	= $_POST['id']?intval($_POST['id']):0;
		if(!$param['id']){
			$result = array('code' => 129 , 'msg' => '参数错误');
			ajaxOutput( $result );
			exit();
		}
		$News = new \Admin\Model\NewsModel();
		$res  = $News->auditNewsCategory($param);
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