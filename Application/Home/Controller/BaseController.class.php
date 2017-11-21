<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
	public function _initialize() {
		$this->assign('modulename', CONTROLLER_NAME);
		//获取友情链接
		$friend_link = $this->getFriendLindData();
		$this->assign('friend_link', $friend_link);
	}

	public function _empty() {
		header("HTTP/1.0 404 Not Found");
		// 使HTTP返回404状态码
		$this->display("Public:404");
	}

	private function getFriendLindData(){
		$list = M('Friend_link')->cache(true)->field('name,url')->where('status=1')->order('orderby asc,id asc')->select();
		return $list?$list:array();
	}
}
?>