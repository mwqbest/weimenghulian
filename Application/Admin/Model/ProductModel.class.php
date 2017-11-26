<?php 
/**
 * 产品Model
 * @author mwqnice
 * 2017/11/15
 */
namespace Admin\Model;
use Think\Model;
class ProductModel extends Model{

	public function __construct() {
		parent::__construct();
	}

	/**
	 * @desc 获取产品分类
	 * @param null
	 * @return $data array 分类数组
	 * @edittime  2017-11-15
	 */
	public function getProductCategory(){

		$data = M('Product_category')->field('id,name')->where(" status = 1")->order('sort asc,id asc')->select();

		return $data;
	}
	/**
	 * @desc 获取产品信息
	 * @param id int
	 * @return $data array 数组
	 * @edittime  2017-11-15
	 */
	public function getProductInfoById($id){
		if(!$id){
			return array();
			exit();
		}

		$data = M('Product')->where("id=$id")->find();
		return $data;
	}

	/**
	 * @desc 获取产品列表
	 * @param id int
	 * @return $data array 分类数组
	 * @edittime  2017-11-15
	 */
	public function getProductList($id=0){
		if(!$id){
			return array();
			exit();
		}

		$data = M('Product')->where(" status = 1 and cate_id=$id")->order('sort asc,id asc')->select();

		return $data;
	}
	/**
	 * @desc 添加产品
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function addProduct($data){
		if(empty($data)){
			return 0;
			exit();
		}
		$res = M('Product')->add($data);
		return $res>0?1:0;
	}
	/**
	 * @desc 修改产品
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function editProduct($data){
		if(empty($data)){
			return 0;
			exit();
		}
		$res = M('Product')->save($data);
		return $res>0?1:0;
	}
	/**
	 * @desc 删除产品
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function delProduct($data){
		if(!$data['id']){
			return 0;
			exit();
		}
		$sql 	= "update ".C('DB_PREFIX')."product set status=(status+1)%2 where id=".$data['id'];
		$res 	= M('Product')->execute($sql);
		return $res?1:0;
	}
	/**
	 * @desc 审核产品
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function auditProduct($data){
		if(!$data['id']){
			return 0;
			exit();
		}
		$sql 	= "update ".C('DB_PREFIX')."product set is_hot=(is_hot+1)%2 where id=".$data['id'];
		$res 	= M('Product')->execute($sql);
		return $res?1:0;
	}
	/**
	 * @desc 获取产品分类信息
	 * @param id int
	 * @return $data array 数组
	 * @edittime  2017-11-15
	 */
	public function getProductCateInfoById($id){
		if(!$id){
			return array();
			exit();
		}

		$data = M('News_category')->where("id=$id")->find();
		return $data;
	}
	
}
?>
