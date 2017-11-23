<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui后台管理模板</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="/Statics/admin/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="/Statics/admin/css/font_tnyc012u2rlwstt9.css" media="all" />
    <link rel="stylesheet" href="/Statics/admin/css/main.css" media="all" />
</head>
<script src="http://cdn.static.runoob.com/libs/jquery/1.10.2/jquery.min.js"></script>
<link rel="stylesheet" href="/Statics/admin/css/login.css" media="all" />
<body>
	<video class="video-player" preload="auto" autoplay="autoplay" loop="loop" data-height="1080" data-width="1920" height="1080" width="100%">
	    <source src="/Statics/admin/images/login.mp4" type="video/mp4">
	</video>
	<div class="video_mask"></div>
	<div class="login">
	    <h1>微梦互联-管理登录</h1>
	    <form class="layui-form">
	    	<div class="layui-form-item">
				<input class="layui-input" name="username" id="username" placeholder="用户名" lay-verify="required" type="text" autocomplete="off">
		    </div>
		    <div class="layui-form-item">
				<input class="layui-input" name="password" id="password" placeholder="密码" lay-verify="required" type="password" autocomplete="off">
		    </div>
		    <div class="layui-form-item form_code">
				<input class="layui-input" name="verify" id="verify" placeholder="验证码" lay-verify="required" type="text" autocomplete="off">
				<div class="code"><img id="verify_img" src="<?php echo U('public/verify',array('rand'=>time()));?>" title="看不清？点击刷新" onclick="javascript:this.src='<?php echo U('public/verify');?>'" width="116" height="36"/> </div>
		    </div>
			<button class="layui-btn login_btn" lay-submit="" id="submit" lay-filter="login">登录</button>
		</form>
	</div>
	<script type="text/javascript" src="/Statics/admin/layui/layui.all.js"></script>
    <script type="text/javascript" src="/Statics/admin/js/login.js"></script>
</body>
</html>