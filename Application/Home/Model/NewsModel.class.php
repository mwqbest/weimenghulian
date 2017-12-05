<?php 
/**
 * 新闻资讯Model
 * @author mwqnice
 * 2017/11/15
 */
namespace Home\Model;
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

		$data = M('News_category')->field('id,name')->where(" status = 1 and is_show=1")->order('sort asc,id asc')->select();

		return $data;
	}
	/**
	 * @desc 获取新闻资讯列表
	 * @param id int
	 * @return $data array 分类数组
	 * @edittime  2017-11-15
	 */
	public function getNewsList($param){
		$where = '1=1 and status =1 and is_audit=1';
		if($param['id']){
			$where.=" and cate_id=".$param['id'];
		}
		if($param['is_hot']==1){
			$where.=" and is_hot=1";
		}

		$data = M('News')->where($where)->order('sort asc,id asc')->select();
		return $data;
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

		$data = M('News')->where(" status = 1 and is_audit=1 and id=$id")->find();

		return $data;
	}
	
	
}
?>
