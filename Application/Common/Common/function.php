<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

// OneThink常量定义
const ONETHINK_VERSION = '1.0.131218';

/**
 * 系统公共库文件
 * 主要定义系统公共函数库
 */

/**
 * 检测用户是否登录
 * 
 * @return integer 0-未登录，大于0-当前登录用户ID
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function is_login() {
	$user = session ( 'user_auth' );
	if (empty ( $user )) {
		return 0;
	} else {
		return session ( 'user_auth_sign' ) == data_auth_sign ( $user ) ? $user ['uid'] : 0;
	}
}
/**
 * 写日志
 * 作者：gaozhanchao
 * 时间：2014-12-17 下午2:53:30
 *
 * @param unknown_type $content
 *        	内容
 * @param unknown_type $title
 *        	提示
 */
function h8Log($content, $title = '', $file = "h8Log.txt") {
	if ($file != "h8Log.txt") {
		$file = "Application/Runtime/" . $file;
	}
	$fp = @fopen ( $file, 'a+' );
	$str = "[" . date ( 'Y-m-d H:i:s' ) . "] " . $title . '---' . $content . "\r\n";
	@fwrite ( $fp, $str );
	@fclose ( $fp );
}

/**
*读取调试页面
*@author shangguoqing
*/
function logread($file = "h8Log.txt"){
		header("Content-Type: text/html; charset=utf-8");
	    if ($file != "h8Log.txt") {
	   		$file = "Application/Runtime/" . $file;
	   	}
		$fp = fopen ($file, "r");
    	$contents = fread ($fp, filesize ($file));
    	fclose ($fp);
		
		dump($contents);
}

/**
 * 检测当前用户是否为管理员
 * 
 * @return boolean true-管理员，false-非管理员
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function is_administrator($uid = null) {
	$uid = is_null ( $uid ) ? is_login () : $uid;
	return $uid && (intval ( $uid ) === C ( 'USER_ADMINISTRATOR' ));
}

/**
 * 字符串转换为数组，主要用于把分隔符调整到第二个参数
 * 
 * @param string $str
 *        	要分割的字符串
 * @param string $glue
 *        	分割符
 * @return array
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function str2arr($str, $glue = ',') {
	return explode ( $glue, $str );
}

/**
 * 数组转换为字符串，主要用于把分隔符调整到第二个参数
 * 
 * @param array $arr
 *        	要连接的数组
 * @param string $glue
 *        	分割符
 * @return string
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function arr2str($arr, $glue = ',') {
	return implode ( $glue, $arr );
}

/**
 * 字符串截取，支持中文和其他编码
 * 
 * @static
 *
 * @access public
 * @param string $str
 *        	需要转换的字符串
 * @param string $start
 *        	开始位置
 * @param string $length
 *        	截取长度
 * @param string $charset
 *        	编码格式
 * @param string $suffix
 *        	截断显示字符
 * @return string
 */
function msubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = true) {
	if (function_exists ( "mb_substr" ))
		$slice = mb_substr ( $str, $start, $length, $charset );
	elseif (function_exists ( 'iconv_substr' )) {
		$slice = iconv_substr ( $str, $start, $length, $charset );
		if (false === $slice) {
			$slice = '';
		}
	} else {
		$re ['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
		$re ['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
		$re ['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
		$re ['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
		preg_match_all ( $re [$charset], $str, $match );
		$slice = join ( "", array_slice ( $match [0], $start, $length ) );
	}
	return $suffix ? $slice . '...' : $slice;
}

/**
 * 系统加密方法
 * 
 * @param string $data
 *        	要加密的字符串
 * @param string $key
 *        	加密密钥
 * @param int $expire
 *        	过期时间 单位 秒
 * @return string
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function think_encrypt($data, $key = '', $expire = 0) {
	$key = md5 ( empty ( $key ) ? C ( 'DATA_AUTH_KEY' ) : $key );
	$data = base64_encode ( $data );
	$x = 0;
	$len = strlen ( $data );
	$l = strlen ( $key );
	$char = '';
	
	for($i = 0; $i < $len; $i ++) {
		if ($x == $l)
			$x = 0;
		$char .= substr ( $key, $x, 1 );
		$x ++;
	}
	
	$str = sprintf ( '%010d', $expire ? $expire + time () : 0 );
	
	for($i = 0; $i < $len; $i ++) {
		$str .= chr ( ord ( substr ( $data, $i, 1 ) ) + (ord ( substr ( $char, $i, 1 ) )) % 256 );
	}
	return str_replace ( array (
			'+',
			'/',
			'=' 
	), array (
			'-',
			'_',
			'' 
	), base64_encode ( $str ) );
}

/**
 * 系统解密方法
 * 
 * @param string $data
 *        	要解密的字符串 （必须是think_encrypt方法加密的字符串）
 * @param string $key
 *        	加密密钥
 * @return string
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function think_decrypt($data, $key = '') {
	$key = md5 ( empty ( $key ) ? C ( 'DATA_AUTH_KEY' ) : $key );
	$data = str_replace ( array (
			'-',
			'_' 
	), array (
			'+',
			'/' 
	), $data );
	$mod4 = strlen ( $data ) % 4;
	if ($mod4) {
		$data .= substr ( '====', $mod4 );
	}
	$data = base64_decode ( $data );
	$expire = substr ( $data, 0, 10 );
	$data = substr ( $data, 10 );
	
	if ($expire > 0 && $expire < time ()) {
		return '';
	}
	$x = 0;
	$len = strlen ( $data );
	$l = strlen ( $key );
	$char = $str = '';
	
	for($i = 0; $i < $len; $i ++) {
		if ($x == $l)
			$x = 0;
		$char .= substr ( $key, $x, 1 );
		$x ++;
	}
	
	for($i = 0; $i < $len; $i ++) {
		if (ord ( substr ( $data, $i, 1 ) ) < ord ( substr ( $char, $i, 1 ) )) {
			$str .= chr ( (ord ( substr ( $data, $i, 1 ) ) + 256) - ord ( substr ( $char, $i, 1 ) ) );
		} else {
			$str .= chr ( ord ( substr ( $data, $i, 1 ) ) - ord ( substr ( $char, $i, 1 ) ) );
		}
	}
	return base64_decode ( $str );
}

/**
 * 数据签名认证
 * 
 * @param array $data
 *        	被认证的数据
 * @return string 签名
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function data_auth_sign($data) {
	// 数据类型检测
	if (! is_array ( $data )) {
		$data = ( array ) $data;
	}
	ksort ( $data ); // 排序
	$code = http_build_query ( $data ); // url编码并生成query字符串
	$sign = sha1 ( $code ); // 生成签名
	return $sign;
}

/**
 * 对查询结果集进行排序
 * 
 * @access public
 * @param array $list
 *        	查询结果
 * @param string $field
 *        	排序的字段名
 * @param array $sortby
 *        	排序类型
 *        	asc正向排序 desc逆向排序 nat自然排序
 * @return array
 *
 */
function list_sort_by($list, $field, $sortby = 'asc') {
	if (is_array ( $list )) {
		$refer = $resultSet = array ();
		foreach ( $list as $i => $data )
			$refer [$i] = &$data [$field];
		switch ($sortby) {
			case 'asc' : // 正向排序
				asort ( $refer );
				break;
			case 'desc' : // 逆向排序
				arsort ( $refer );
				break;
			case 'nat' : // 自然排序
				natcasesort ( $refer );
				break;
		}
		foreach ( $refer as $key => $val )
			$resultSet [] = &$list [$key];
		return $resultSet;
	}
	return false;
}

/**
 * 把返回的数据集转换成Tree
 * 
 * @param array $list
 *        	要转换的数据集
 * @param string $pid
 *        	parent标记字段
 * @param string $level
 *        	level标记字段
 * @return array
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function list_to_tree($list, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0) {
	// 创建Tree
	$tree = array ();
	if (is_array ( $list )) {
		// 创建基于主键的数组引用
		$refer = array ();
		foreach ( $list as $key => $data ) {
			$refer [$data [$pk]] = & $list [$key];
		}
		foreach ( $list as $key => $data ) {
			// 判断是否存在parent
			$parentId = $data [$pid];
			if ($root == $parentId) {
				$tree [] = & $list [$key];
			} else {
				if (isset ( $refer [$parentId] )) {
					$parent = & $refer [$parentId];
					$parent [$child] [] = & $list [$key];
				}
			}
		}
	}
	return $tree;
}

/**
 * 将list_to_tree的树还原成列表
 * 
 * @param array $tree
 *        	原来的树
 * @param string $child
 *        	孩子节点的键
 * @param string $order
 *        	排序显示的键，一般是主键 升序排列
 * @param array $list
 *        	过渡用的中间数组，
 * @return array 返回排过序的列表数组
 * @author yangweijie <yangweijiester@gmail.com>
 */
function tree_to_list($tree, $child = '_child', $order = 'id', &$list = array()) {
	if (is_array ( $tree )) {
		$refer = array ();
		foreach ( $tree as $key => $value ) {
			$reffer = $value;
			if (isset ( $reffer [$child] )) {
				unset ( $reffer [$child] );
				tree_to_list ( $value [$child], $child, $order, $list );
			}
			$list [] = $reffer;
		}
		$list = list_sort_by ( $list, $order, $sortby = 'asc' );
	}
	return $list;
}

/**
 * 格式化字节大小
 * 
 * @param number $size
 *        	字节数
 * @param string $delimiter
 *        	数字和单位分隔符
 * @return string 格式化后的带单位的大小
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function format_bytes($size, $delimiter = '') {
	$units = array (
			'B',
			'KB',
			'MB',
			'GB',
			'TB',
			'PB' 
	);
	for($i = 0; $size >= 1024 && $i < 5; $i ++)
		$size /= 1024;
	return round ( $size, 2 ) . $delimiter . $units [$i];
}

/**
 * 设置跳转页面URL
 * 使用函数再次封装，方便以后选择不同的存储方式（目前使用cookie存储）
 * 
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function set_redirect_url($url) {
	cookie ( 'redirect_url', $url );
}

/**
 * 获取跳转页面URL
 * 
 * @return string 跳转页URL
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function get_redirect_url() {
	$url = cookie ( 'redirect_url' );
	return empty ( $url ) ? __APP__ : $url;
}

/**
 * 时间戳格式化
 * 
 * @param int $time        	
 * @return string 完整的时间显示
 * @author huajie <banhuajie@163.com>
 */
function time_format($time = NULL, $format = 'Y-m-d H:i') {
	$time = $time === NULL ? NOW_TIME : intval ( $time );
	return date ( $format, $time );
}

// 基于数组创建目录和文件
function create_dir_or_files($files) {
	foreach ( $files as $key => $value ) {
		if (substr ( $value, - 1 ) == '/') {
			mkdir ( $value );
		} else {
			@file_put_contents ( $value, '' );
		}
	}
}

if (! function_exists ( 'array_column' )) {
	function array_column(array $input, $columnKey, $indexKey = null) {
		$result = array ();
		if (null === $indexKey) {
			if (null === $columnKey) {
				$result = array_values ( $input );
			} else {
				foreach ( $input as $row ) {
					$result [] = $row [$columnKey];
				}
			}
		} else {
			if (null === $columnKey) {
				foreach ( $input as $row ) {
					$result [$row [$indexKey]] = $row;
				}
			} else {
				foreach ( $input as $row ) {
					$result [$row [$indexKey]] = $row [$columnKey];
				}
			}
		}
		return $result;
	}
}

// 删除目录和目录内的文件
function deldir($dir) {
	$dh = opendir ( $dir );
	while ( ($file = readdir ( $dh )) !== false ) {
		$fullpath = $dir . $file;
		echo $fullpath . "<br />";
		if ($file != "." && $file != "..") {
			unlink ( $fullpath );
		}
	}
}

function rmdirr($dirname) {
	if (! file_exists ( $dirname )) {
		return false;
	}
	if (is_file ( $dirname ) || is_link ( $dirname )) {
		return unlink ( $dirname );
	}
	$dir = dir ( $dirname );
	if ($dir) {
		while ( false !== $entry = $dir->read () ) {
			if ($entry == '.' || $entry == '..') {
				continue;
			}
			rmdirr ( $dirname . DIRECTORY_SEPARATOR . $entry );
		}
	}
	$dir->close ();
	return rmdir ( $dirname );
}

function xml_decode($xmldata) {
	$xml_parser = @xml_parser_create ();
	if (! xml_parse ( $xml_parser, $xmldata, true )) {
		xml_parse_into_struct ( $xml_parser, $xmldata, $values );
		xml_parser_free ( $xml_parser );
		return $values;
		// 非法格式
	} else {
		return (json_decode ( json_encode ( simplexml_load_string ( $xmldata ) ), true ));
	}
}



function g2b($x, $y) {
	$data = @file_get_contents ( "http://api.map.baidu.com/ag/coord/convert?from=2&to=4&x=" . $x . "&y=" . $y );
	$array = json_decode ( $data, true );
	$arr = array ();
	$arr ["x"] = base64_decode ( $array ["x"] );
	$arr ["y"] = base64_decode ( $array ["y"] );
	return $arr;
}

 


// 判断客户端
function order_source() {
	$useragent = strtolower ( $_SERVER ["HTTP_USER_AGENT"] );
	// iphone
	$is_iphone = strripos ( $useragent, 'iphone' );
	if ($is_iphone) {
		return 'iphone';
	}
	// android
	$is_android = strripos ( $useragent, 'android' );
	if ($is_android) {
		return 'android';
	}
	// 微信
	/*
	 * $is_weixin = strripos($useragent,'micromessenger'); if($is_weixin){
	 * return 'weixin'; }
	 */
	// ipad
	$is_ipad = strripos ( $useragent, 'ipad' );
	if ($is_ipad) {
		return 'ipad';
	}
	// ipod
	$is_ipod = strripos ( $useragent, 'ipod' );
	if ($is_ipod) {
		return 'ipod';
	}
	// pc电脑
	$is_pc = strripos ( $useragent, 'windows nt' );
	if ($is_pc) {
		return 'pc';
	}
	return 'other';
}

function cutstr_html($string, $sublen) {
	$string = strip_tags ( $string );
	$string = preg_replace ( '/\n/is', '', $string );
	$string = preg_replace ( '/ |　/is', '', $string );
	$string = preg_replace ( '/&nbsp;/is', '', $string );
	
	preg_match_all ( "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $t_string );
	if (count ( $t_string [0] ) - 0 > $sublen)
		$string = join ( '', array_slice ( $t_string [0], 0, $sublen ) ) . "…";
	else
		$string = join ( '', array_slice ( $t_string [0], 0, $sublen ) );
	
	return $string;
}

function check_url($url) {
	if (! preg_match ( '/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is', $url )) {
		
		return false;
	}
	
	return true;
}


// 根据数组某一字段排序
function array_sort($arr, $keys, $type = 'asc') {
	$keysvalue = $new_array = array ();
	
	foreach ( $arr as $k => $v ) {
		
		$keysvalue [$k] = $v [$keys];
	}
	
	if ($type == 'asc') {
		
		asort ( $keysvalue );
	} else {
		
		arsort ( $keysvalue );
	}
	
	reset ( $keysvalue );
	
	foreach ( $keysvalue as $k => $v ) {
		
		$new_array [] = $arr [$k];
	}
	return $new_array;
}
/**
 * 二维数组去掉重复值 并保留键值
 * @author 商国庆
 * @param $column 传入字段名
 * @date 2014-11-26
 */
function array_unique_arr($array, array $column){

    foreach ($array as $k=>$v){

        $v = join(",",$v);  //降维,也可以用implode,将一维数组转换为用逗号连接的字符串

        $temp[$k] = $v;

    }
    
    $temp = array_unique($temp);    //去掉重复的字符串,也就是重复的一维数组

    foreach ($temp as $k => $v) {

        $array=explode(",",$v);     //再将拆开的数组重新组装
       
      	foreach ($column as $key => $value) {

    		$temp2[$k][$value] = $array[$key];
    	}
    }
    return $temp2;
}


/**
 * 创建像这样的查询: "IN('a','b')"; by gaoyan
 *
 * @access public
 * @param mix $item_list
 *        	列表数组或字符串
 * @param string $field_name
 *        	字段名称
 *        	
 * @return void
 */
function db_create_in($item_list, $field_name = '') {
	if (empty ( $item_list )) {
		return $field_name . " IN ('') ";
	} else {
		if (! is_array ( $item_list )) {
			$item_list = explode ( ',', $item_list );
		}
		$item_list = array_unique ( $item_list );
		$item_list_tmp = '';
		foreach ( $item_list as $item ) {
			if ($item !== '') {
				$item_list_tmp .= $item_list_tmp ? ",'$item'" : "'$item'";
			}
		}
		if (empty ( $item_list_tmp )) {
			return $field_name . " IN ('') ";
		} else {
			return $field_name . ' IN (' . $item_list_tmp . ') ';
		}
	}
}

/**
 * 获取当前页面完整URL地址
 */
function get_url() {
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
    return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
}
/**
 * 根据当前时间计算剩余时间
 * @param endtime int 结束时间
 * @return int
 * @author 毛文强
 * @edittime 2015-1-6
 * @editauthor
 */
function times($endtime) {
	$residue = abs($endtime - time ());
	if ($residue > 86400) {
		$residue = round ( $residue / 86400 );
	} else {
		$residue = 1;
	}
	$residue = $residue % 10;
	$residue = $residue == 0 ? 10 : $residue;
	if ($residue > 5) {
		$residue = $residue - 5;
	}
	return $residue;
}

/**
 * 等比例压缩图片
 * @param $im 图片对象,应用函数之前,你需要用imagecreatefromjpeg()读取图片对象
 * @param $maxwidth 定义生成图片的最大宽度（单位：像素）
 * @param $maxheight 生成图片的最大高度（单位：像素）
 * @param $name 生成的图片名
 * @param $filetype 最终生成的图片类型（.jpg/.png/.gif）
 * @author 商国庆
 * @edittime 2015-1-8
 * @editauthor
 */
function resizeImage($im,$maxwidth,$maxheight,$name,$filetype,$upload)
{
    $pic_width = imagesx($im);
    $pic_height = imagesy($im);

    if(($maxwidth && $pic_width > $maxwidth) || ($maxheight && $pic_height > $maxheight))
    {
        if($maxwidth && $pic_width>$maxwidth)
        {
            $widthratio = $maxwidth/$pic_width;
            $resizewidth_tag = true;
        }

        if($maxheight && $pic_height>$maxheight)
        {
            $heightratio = $maxheight/$pic_height;
            $resizeheight_tag = true;
        }

        if($resizewidth_tag && $resizeheight_tag)
        {
            if($widthratio<$heightratio)
                $ratio = $widthratio;
            else
                $ratio = $heightratio;
        }

        if($resizewidth_tag && !$resizeheight_tag)
            $ratio = $widthratio;
        if($resizeheight_tag && !$resizewidth_tag)
            $ratio = $heightratio;

        $newwidth = $pic_width * $ratio;
        $newheight = $pic_height * $ratio;

        if(function_exists("imagecopyresampled"))
        {
            $newim = imagecreatetruecolor($newwidth,$newheight);
           imagecopyresampled($newim,$im,0,0,0,0,$newwidth,$newheight,$pic_width,$pic_height);
        }
        else
        {
            $newim = imagecreate($newwidth,$newheight);
           imagecopyresized($newim,$im,0,0,0,0,$newwidth,$newheight,$pic_width,$pic_height);
        }

        $name = $upload.$name.$filetype;
        imagejpeg($newim,$name);
        imagedestroy($newim);
    }
    else
    {
        $name = $upload.$name.$filetype;
        imagejpeg($im,$name);
    } 
    $url = $upload.$name;
    return $url;        
}


//转换编码
function characet($data) {
	if (! empty ( $data )) {
		$fileType = mb_detect_encoding ( $data, array (
				'UTF-8',
				'GBK',
				'GB2312',
				'LATIN1',
				'BIG5' 
		) );
		if ($fileType != 'UTF-8') {
			$data = mb_convert_encoding ( $data, 'UTF-8', $fileType );
		}
	}
	return $data;
}

/**
 * 计算2个经纬度之间的距离
 *
 *
 * @return (km)
 */
function getDistance($lat1, $lng1, $lat2, $lng2) {
	$EARTH_RADIUS = 6378.137;
	$radLat1 = rad($lat1);
	$radLat2 = rad($lat2);
	$a = $radLat1 - $radLat2;
	$b = rad($lng1) - rad($lng2);
	$s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2)));
	$s = $s * $EARTH_RADIUS;
	$s = round($s * 1000) / 1000;
	return $s;
}
function rad($d) {
	return $d * 3.1415926535898 / 180.0;
}
//===================================new==============================//
function ajaxOutput( $result,$retype='JSON' ){
	if( !empty( $result['data'] ) )
	{
    	switch (strtoupper($retype)) {
    		case 'JSONP':
    			header('Content-Type:application/json;charset=utf-8');
    			echo ( 'callback(' . json_encode( $result ) . ')');
    			break;
    		case 'JSON' :
    			header('Content-Type:application/json;charset=utf-8');
    			echo ( json_encode( $result ) );
    			break;
    		default:
    			break;
    	}
        return;
    }
}

