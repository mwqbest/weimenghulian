<?php 
/**
 * 新闻资讯Model
 * @author mwqnice
 * 2017/11/15
 */
namespace Admin\Model;
use Think\Model;
class NewsModel extends Model{

	public function __construct() {
		parent::__construct();
	}

	/**
	 * @desc 获取新闻资讯分类
	 * @param null
	 * @return $data array 分类数组
	 * @edittime  2017-11-15
	 */
	public function getNewsCategory(){

		$data = M('News_category')->field('id,name')->where(" status = 1")->order('sort asc,id asc')->select();

		return $data;
	}
	/**
	 * @desc 获取新闻信息
	 * @param id int
	 * @return $data array 数组
	 * @edittime  2017-11-15
	 */
	public function getNewsInfoById($id){
		if(!$id){
			return array();
			exit();
		}

		$data = M('News')->where("id=$id")->find();
		return $data;
	}

	/**
	 * @desc 获取新闻资讯列表
	 * @param id int
	 * @return $data array 分类数组
	 * @edittime  2017-11-15
	 */
	public function getNewsList($id=0){
		if(!$id){
			return array();
			exit();
		}

		$data = M('News')->where(" status = 1 and cate_id=$id")->order('sort asc,id asc')->select();

		return $data;
	}
	/**
	 * @desc 添加新闻
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function addNews($data){
		if(empty($data)){
			return 1;
			exit();
		}
		$res = M('News')->add($data);
		return $res>0?1:0;
	}
	/**
	 * @desc 修改新闻
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function editNews($data){
		if(empty($data)){
			return 1;
			exit();
		}
		$res = M('News')->save($data);
		return $res>0?1:0;
	}
	/**
	 * @desc 获取新闻资讯详情
	 * @param id int
	 * @return $data array 数组
	 * @edittime  2017-11-15
	 */
	public function getNewsDetail($id=0){
		if(!$id){
			return array();
			exit();
		}

		$data = M('News')->where(" status = 1 and id=$id")->find();

		return $data;
	}
	
	
}
?>
