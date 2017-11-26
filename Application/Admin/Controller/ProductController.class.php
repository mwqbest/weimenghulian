<?php
namespace Admin\Controller;
class ProductController extends BaseController
{
	function index()
	{	

		$keyword = $_GET['keyword']?trim($_GET['keyword']):'';
		$prex = C('DB_PREFIX');
		$where ='1=1';
		if($keyword){
			$where .= " and product_name like '%".$keyword."%'";
			$this->assign('keyword', $keyword);
		}
		$product_mod = M('Product');
		import("ORG.Util.Page");
		
		$count = $product_mod->where($where)->count();
		$p = new \Think\Page($count,15);

		$product_list = $product_mod->field($prex.'product.*,'.$prex.'product_category.name as cate_name')->where($where)->join('LEFT JOIN '.$prex.'product_category ON '.$prex.'product.cate_id = '.$prex.'product_category.id ')->limit($p->firstRow.','.$p->listRows)->order($prex.'product.add_time DESC')->select();
		foreach($product_list as $k=>$val){
			$product_list[$k]['key'] = ++$p->firstRow;
		}
		$page = $p->show();
		$this->assign('page',$page);
		$this->assign('product_list',$product_list);
		$this->display();
	}

	/**
	 * @desc 新闻添加 修改
	 * @return null
	 */
	public function productOption(){
		//获取文章分类
		$Product = new \Admin\Model\ProductModel();
		$category_list = $Product ->getProductCategory();
		
		//修改 获取修改文章信息
		$id = $_GET['id']?intval($_GET['id']):0;
		if($id){
			$info = $Product ->getProductInfoById($id);
		}
		$this ->assign('info',$info);
		$this ->assign('category_list',$category_list);
		$this->display();
	}

	/**
	 * @desc ajax新闻添加 修改
	 * @return null
	 */
	public function ajaxAddProduct(){
		if(!isset($_POST['product_name'])||($_POST['product_name']=='')){
			$result = array('code' => 129 , 'msg' => '产品名称不能为空');
			ajaxOutput( $result );
			exit();
		}
		$data = array(
			'product_name'=>I('post.product_name','','strip_tags,htmlspecialchars'),
			'is_hot'=>I('post.is_hot',0),
			'status'=>I('post.status',0),
			'cate_id'=>I('post.cate_id',0),
			'lable_list'=>I('post.lable_list',''),
			'sort'=>I('post.sort',0), 
			'img'=>I('post.img',''), 
			'keywords'=>I('post.keywords','','strip_tags,htmlspecialchars'),
			'description'=>I('post.description','','strip_tags,htmlspecialchars'),
			'content'=>trim(I('post.content','')),
		);
		$id   = $_POST['id']?intval($_POST['id']):0;
		$Product = new \Admin\Model\ProductModel();
		if($id>0){
			$data['id'] = $id;
			$data['edit_time'] = time();
			$res  = $Product ->editProduct($data);
		}else{
			$data['add_time'] = time();
			$data['product_sn'] = 'weimenghulian'.time();
			$res  = $Product ->addProduct($data);
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
	 * @desc 产品修改状态
	 * @return null
	 */
	public function ajaxDelProduct(){
		$param['id'] 	= $_POST['id']?intval($_POST['id']):0;
		$param['type'] 	= $_POST['type']?intval($_POST['type']):0;
		if(!$param['id']){
			$result = array('code' => 129 , 'msg' => '参数错误');
			ajaxOutput( $result );
			exit();
		}
		$Product = new \Admin\Model\ProductModel();
		$res  = $Product->delProduct($param);
		if($res>0){
			$result = array('code' => 128 , 'msg' => '操作成功');
		}else{
			$result = array('code' => 129 , 'msg' => '操作失败');
		}
		ajaxOutput( $result );
		exit();
	}
	/**
	 * @desc 审核产品 ishot
	 * @return null
	 */
	public function ajaxAuditProduct(){
		$param['id'] 	= $_POST['id']?intval($_POST['id']):0;
		if(!$param['id']){
			$result = array('code' => 129 , 'msg' => '参数错误');
			ajaxOutput( $result );
			exit();
		}
		$Product = new \Admin\Model\ProductModel();
		$res  = $Product->auditProduct($param);
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
	public function product_category(){
		$keyword = $_GET['keyword']?trim($_GET['keyword']):'';
		$prex = C('DB_PREFIX');
		$where ='1=1';
		if($keyword){
			$where .= " and name like '%".$keyword."%'";
			$this->assign('keyword', $keyword);
		}
		$news_cate_mod = M('Product_category');
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
	 * @desc 新闻添加 修改
	 * @return null
	 */
	public function productCateOption(){
		//获取文章分类
		$ProductCate = new \Admin\Model\ProductModel();
		$category_list = $ProductCate ->getNewsCategory(array('type'=>1));
		
		//修改 获取修改文章分类信息
		$id = $_GET['id']?intval($_GET['id']):0;
		if($id){
			$info = $ProductCate ->getNewsCateInfoById($id);
		}
		$this ->assign('info',$info);
		$this ->assign('category_list',$category_list);
		$this->display();
	}
	

}
?>