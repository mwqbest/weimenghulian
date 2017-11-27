<?php 
/**
 * 产品案例Model
 * @author mwqnice
 * 2017/11/15
 */
namespace Home\Model;
use Think\Model;
class ProductModel extends Model{

	public function __construct() {
		parent::__construct();
	}

	/**
	 * @desc 获取产品案例分类
	 * @param null
	 * @return $data array 分类数组
	 * @edittime  2017-11-15
	 */
	public function getProductCategory(){

		$data = M('Product_category')->field('id,name')->where(" status = 1")->order('sort asc,id asc')->select();

		return $data;
	}
	/**
	 * @desc 获取产品案例列表
	 * @param id int
	 * @return $data array 分类数组
	 * @edittime  2017-11-15
	 */
	public function getProductList($id=0){
		$where = '1=1 and status =1';
		if($id){
			$where.=" and cate_id=$id";
		}

		$data = M('Product')->where($where)->order('sort asc,id asc')->select();

		return $data;
	}
	/**
	 * @desc 获取产品案例详情
	 * @param id int
	 * @return $data array 数组
	 * @edittime  2017-11-15
	 */
	public function getProductDetail($id=0){
		if(!$id){
			return array();
			exit();
		}

		$data = M('Product')->where(" status = 1 and id=$id")->find();

		return $data;
	}
	
	
}
?>
