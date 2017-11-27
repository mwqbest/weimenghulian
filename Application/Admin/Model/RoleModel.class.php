<?php 
/**
 * 角色Model
 * @author mwqnice
 * 2017/11/15
 */
namespace Admin\Model;
use Think\Model;
class RoleModel extends Model{

	public function __construct() {
		parent::__construct();
	}

	/**
	 * @desc 通过id获取角色信息
	 * @param id int
	 * @return $data array 数组
	 * @edittime  2017-11-15
	 */
	public function getRoleInfoById($id){
		if(!$id){
			return array();
			exit();
		}

		$data = M('Role')->where("id=$id")->find();
		return $data;
	}

	/**
	 * @desc 修改角色信息
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function editRole($data){
		if(empty($data)){
			return 0;
			exit();
		}
		$res = M('Role')->save($data);
		return $res>0?1:0;
	}

	/**
	 * @desc 添加角色
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function addRole($data){
		if(empty($data)){
			return 0;
			exit();
		}
		$res = M('Role')->add($data);
		return $res>0?1:0;
	}
	
	/**
	 * @desc 删除角色
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function delRole($data){
		if(!$data['id']){
			return 0;
			exit();
		}
		$sql 	= "update ".C('DB_PREFIX')."role set status=(status+1)%2 where id=".$data['id'];
		$res 	= M('Role')->execute($sql);
		return $res?1:0;
	}
}
?>
