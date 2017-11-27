<?php 
/**
 * 用户Model
 * @author mwqnice
 * 2017/11/15
 */
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{

	public function __construct() {
		parent::__construct();
	}

	/**
	 * @desc 通过id获取用户信息
	 * @param id int
	 * @return $data array 数组
	 * @edittime  2017-11-15
	 */
	public function getUserInfoById($id){
		if(!$id){
			return array();
			exit();
		}

		$data = M('User')->where("id=$id")->find();
		return $data;
	}

	/**
	 * @desc 修改用户信息
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function editUser($data){
		if(empty($data)){
			return 0;
			exit();
		}
		$res = M('User')->save($data);
		return $res>0?1:0;
	}
	/**
	 * @desc 判断用户名是否存在
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function isNameExist($user_name){
		if(empty($user_name)){
			return 0;
			exit();
		}
		$res = M('User')->where("user_name='".$user_name."'")->count();
		return $res>0?1:0;
	}

	/**
	 * @desc 添加用户
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function addUser($data){
		if(empty($data)){
			return 0;
			exit();
		}
		$res = M('User')->add($data);
		return $res>0?1:0;
	}
	
	/**
	 * @desc 删除用户
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function delUser($data){
		if(!$data['id']){
			return 0;
			exit();
		}
		$sql 	= "update ".C('DB_PREFIX')."user set status=(status+1)%2 where id=".$data['id'];
		$res 	= M('User')->execute($sql);
		return $res?1:0;
	}
	

	//=============================用户角色=====================================//
	
	/**
	 * @desc 获取用户角色
	 * @param null
	 * @return $data array 分类数组
	 * @edittime  2017-11-15
	 */
	public function getUserRole(){

		$data = M('Role')->field('id,name')->where(" status = 1")->order('id asc')->select();

		return $data;
	}

	
}
?>
