<?php
/* 首页入口文件 */
namespace Home\Controller;

class IndexController extends BaseController {
	public function __construct() {
		parent::__construct();

		$this -> assign('modulename', CONTROLLER_NAME);
	}
	private $perPageNum = 10;
	private $sgPageNum = 5;
	
	/**
	 *@desc 首页
	 *@date 2017/11/15
	 */
	public function index() {
		$this->display ();
	}

	/**
	 *@desc 关于我们
	 *@date 2017/11/15
	 */
	public function about() {
		$this->display ();
	}
	/**
	 *@desc 新闻资讯
	 *@date 2017/11/15
	 */
	public function news(){
		//获取新闻分类
		$News = new \Home\Model\NewsModel();
		$news_category = $News -> getNewsCategory();
		
		$cate_id = $_GET['id']?intval($_GET['id']):$news_category[0]['id'];
		//根据分类获取新闻列表
		$news_list = $News -> getNewsList($cate_id);

		//获取当前分类名称
		foreach ($news_category as $key => $value) {
			if($value['id']==$cate_id){
				$cate_name = $value['name'];
				break;
			}
		}
		$this ->assign('cate_id',$cate_id);
		$this ->assign('cate_name',$cate_name);
		$this ->assign('news_category',$news_category);
		$this ->assign('news_list',$news_list);
		$this ->assign('news_num',count($news_list));
		$this->display ();
	}
	
	/**
	 *@desc 项目案例
	 *@date 2017/11/15
	 */
	public function product(){
		//获取案例分类
		$ProductMod = new \Home\Model\ProductModel();
		$product_category = $ProductMod -> getProductCategory();
		
		$cate_id = $_GET['id']?intval($_GET['id']):$product_category[0]['id'];
		//根据分类获取案例列表
		$product_list = $ProductMod -> getProductList($cate_id);

		//获取当前分类名称
		foreach ($product_category as $key => $value) {
			if($value['id']==$cate_id){
				$cate_name = $value['name'];
				break;
			}
		}
		$this ->assign('cate_id',$cate_id);
		$this ->assign('cate_name',$cate_name);
		$this ->assign('product_category',$product_category);
		$this ->assign('product_list',$product_list);
		$this ->assign('product_num',count($product_list));
		$this->display ();
	}

	/**
	 *@desc 常见问题
	 *@date 2017/11/15
	 */
	public function question(){
		//根据分类获取问题列表
		$News = new \Home\Model\NewsModel();
		$question_list = $News -> getNewsList(3);
		$this ->assign('question_list',$question_list);
		$this ->assign('question_num',count($question_list));
		$this->display ();
	}

	/**
	 *@desc 联系我们
	 *@date 2017/11/15
	 */
	public function contact(){
		$this->display ();
	}

	/*@desc 新闻资讯 详情
	 *@date 2017/11/15
	 */
	public function news_detail(){
		$id =$_GET['id']?intval($_GET['id']):0;

		$News = new \Home\Model\NewsModel();
		if($id){
			$news_detail = $News -> getNewsDetail($id);
		}
		//获取新闻分类
		$news_category = $News -> getNewsCategory();
		$cate_id = $news_detail['cate_id']?$news_detail['cate_id']:$news_category[0]['id'];

		//获取当前分类名称
		foreach ($news_category as $key => $value) {
			if($value['id']==$cate_id){
				$cate_name = $value['name'];
				break;
			}
		}
		$this ->assign('cate_id',$cate_id);
		$this ->assign('cate_name',$cate_name);
		$this ->assign('news_category',$news_category);
		$this->assign('news_detail',$news_detail);
		$this->display ();
	}
	
}
?>