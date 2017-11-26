<?php 
/**
 * 友情链接Model
 * @author mwqnice
 * 2017/11/15
 */
namespace Admin\Model;
use Think\Model;
class Friend_linkModel extends Model{

	public function __construct() {
		parent::__construct();
	}

	/**
	 * @desc 获取产品信息
	 * @param id int
	 * @return $data array 数组
	 * @edittime  2017-11-15
	 */
	public function getFriendlinkInfoById($id){
		if(!$id){
			return array();
			exit();
		}

		$data = M('Friend_link')->where("id=$id")->find();
		return $data;
	}

	/**
	 * @desc 获取产品列表
	 * @param id int
	 * @return $data array 分类数组
	 * @edittime  2017-11-15
	 */
	public function getFriendlinkList($id=0){
		if(!$id){
			return array();
			exit();
		}

		$data = M('Friend_link')->where(" status = 1 ")->order('orderby asc,id asc')->select();

		return $data;
	}
	/**
	 * @desc 添加友情链接
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function addFriendlink($data){
		if(empty($data)){
			return 0;
			exit();
		}
		$res = M('Friend_link')->add($data);
		return $res>0?1:0;
	}
	/**
	 * @desc 修改友情链接
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function editFriendlink($data){
		if(empty($data)){
			return 0;
			exit();
		}
		$res = M('Friend_link')->save($data);
		return $res>0?1:0;
	}
	/**
	 * @desc 删除友情链接
	 * @param data array
	 * @return $res int
	 * @edittime  2017-11-15
	 */
	public function delFriendlink($data){
		if(!$data['id']){
			return 0;
			exit();
		}
		if($data['type']==1){
			$sql 	= "update ".C('DB_PREFIX')."friend_link set status=0 where id=".$data['id'];
		}else{
			$sql 	= "update ".C('DB_PREFIX')."friend_link set status=(status+1)%2 where id=".$data['id'];
		}
		$res 	= M('Friend_link')->execute($sql);
		return $res?1:0;
	}
	
}
?>
