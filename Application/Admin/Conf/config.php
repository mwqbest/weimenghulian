<?php
if (!defined('THINK_PATH'))	exit();
//数据库配置信息

$config = require("config.inc.php");
$array= array(
	//'配置项'=>'配置值'
	'SHOW_PAGE_TRACE'=>1,
	'URL_CASE_INSENSITIVE' => true ,
	'URL_MODEL'         =>1,		    //URL模式：0普通模式 1PATHINFO 2REWRITE 3兼容模式
	'DEFAULT_MODULE'    =>'Admin',
	'COOKIE_EXPIRE'=>30000000000,                // Cookie有效期
	'COOKIE_DOMAIN'=>$_SERVER['HTTP_HOST'],        // Cookie有效域名
	'COOKIE_PATH'=>'/',                        // Cookie路径
	'SESSION_PREFIX' => 'hui8_admin', //session前缀
	//数据缓存设置开始
	'DATA_CACHE_TYPE'       => 'file', // 数据缓存方式 文件
	'DATA_CACHE_TIME'       => 300,      // 数据缓存有效期 0表示永久缓存
	'DATA_CACHE_COMPRESS'   => false,   // 数据缓存是否压缩缓存
	'DATA_CACHE_CHECK'      => false,   // 数据缓存是否校验缓存
	'DATA_CACHE_PREFIX'     => '@',     // 缓存前缀
	'DATA_CACHE_SUBDIR'     => false,  // 使用子目录缓存 (根据缓存标识的哈希创建子目录)
	'DATA_PATH_LEVEL'       => 1,        // 子目录缓存级别
	//数据缓存设置结束


	'TMPL_ACTION_SUCCESS' => 'Public:jump',
	'TMPL_ACTION_ERROR' => 'Public:jump',
	 /* 图片上传相关配置 */
    'PICTURE_UPLOAD' => array(
		'mimes'    => '', //允许上传的文件MiMe类型
		'maxSize'  => 2*1024*1024, //上传的文件大小限制 (0-不做限制)
		'exts'     => 'jpg,gif,png,jpeg', //允许上传的文件后缀
		'autoSub'  => true, //自动子目录保存文件
		'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
		'rootPath' => './upload/', //保存根路径
		'savePath' => '', //保存路径
		'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
		'saveExt'  => '', //文件保存后缀，空则使用原后缀
		'replace'  => false, //存在同名是否覆盖
		'hash'     => true, //是否生成hash编码
		'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
    ), 
	 /* 编辑器图片上传相关配置 */
    'EDITOR_UPLOAD' => array(
		'mimes'    => '', //允许上传的文件MiMe类型
		'maxSize'  => 2*1024*1024, //上传的文件大小限制 (0-不做限制)
		'exts'     => 'jpg,gif,png,jpeg', //允许上传的文件后缀
		'autoSub'  => true, //自动子目录保存文件
		'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
		'rootPath' => './upload/', //保存根路径
		'savePath' => '', //保存路径
		'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
		'saveExt'  => '', //文件保存后缀，空则使用原后缀
		'replace'  => false, //存在同名是否覆盖
		'hash'     => true, //是否生成hash编码
		'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
    ),

	
);
return array_merge($config,$array);
?>