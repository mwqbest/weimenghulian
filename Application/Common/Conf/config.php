<?php
if (!defined('THINK_PATH')) exit();
//数据库配置信息
$config = require("config.inc.php");
$array =  array(
    'MODULE_DENY_LIST'   => array('Common','Admin'),
    'DEFAULT_MODULE'     => 'Home', //默认模块
    'SESSION_AUTO_START' => true, //是否开启session
    'URL_CASE_INSENSITIVE' => true ,
    'URL_MODEL'         => 0,           //URL模式：0普通模式 1PATHINFO 2REWRITE 3兼容模式
    'COOKIE_EXPIRE'=>3600,                // Cookie有效期
    'COOKIE_DOMAIN'=>'',        // Cookie有效域名
    'COOKIE_PATH'=>'/',                        // Cookie路径
    'COOKIE_PREFIX'         => 'weimeihulian_',      // Cookie前缀 避免冲突
    //数据缓存设置开始
    'DATA_CACHE_TYPE'       => 'file', // 数据缓存方式 文件
    'DATA_CACHE_TIME'       => 300,      // 数据缓存有效期 0表示永久缓存
    'DATA_CACHE_COMPRESS'   => false,   // 数据缓存是否压缩缓存
    'DATA_CACHE_CHECK'      => false,   // 数据缓存是否校验缓存
    'DATA_CACHE_PREFIX'     => '@wm@',     // 缓存前缀
    'DATA_CACHE_SUBDIR'     => false,  // 使用子目录缓存 (根据缓存标识的哈希创建子目录)
    'DATA_PATH_LEVEL'       => 1,        // 子目录缓存级别
);


return array_merge($config,$array);