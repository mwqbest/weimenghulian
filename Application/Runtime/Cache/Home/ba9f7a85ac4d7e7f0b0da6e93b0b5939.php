<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微梦互联网络科技-卓越设计 精益求精</title>
<meta name="description" content="微梦互联,建站" />
<meta name="keywords" content="微梦互联,建站" />
<meta name="author" content="order by" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<link rel="stylesheet" type="text/css" href="/Statics/home/css/style_2_common.css" />
<script src="/Statics/home/js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="/Statics/home/js/common.js" type="text/javascript"></script>
<script src="/Statics/home/js/pace.js" type="text/javascript"></script>
<link href="/Statics/home/css/style.css" type="text/css" />
</head>

<body id="nv_portal" class="pg_index">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div id="toptb" class="cl" style="display:none;"> </div>
<div id="hd" style="background:#FFF; height:60px; border-bottom:1px solid #E6E6E6; ">
  <div class="clear"></div>
  <div id="week_nav">
    <div class="wk_navwp">
      <div class="wk_lonav">
        <div class="wk_logo">
          <h2><a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'];?>" title=""><img src="/Statics/home/images/logo.png" alt="" border="0" /></a></h2>
        </div>
        <div class="wk_inav">
          <ul class="nav">
            <li><a href="<?php echo u('Index/index');?>">网站首页</a></li>
            
            <li><a href="<?php echo u('Index/about');?>">关于我们</a></li>
            
            <li><a href="<?php echo u('Index/news');?>">新闻资讯</a></li>
            
            <li><a href="<?php echo u('Index/product');?>">项目案例</a></li>
            
            <li><a href="<?php echo u('Index/question');?>">常见问题</a></li>
            
            <li><a href="<?php echo u('Index/contact');?>">联系我们</a></li>
            
          </ul>
        </div>
      </div>
      
    </div>
  </div>
</div>
 <link rel="stylesheet" type="text/css" href="/Statics/home/404/404.css" />
<script type="text/javascript" src="/Statics/home/js/jquery-1.4.2.min.js"></script>
<!--解决 IE6 背景缓存-->
<!--[if IE 6]><script type="text/javascript">document.execCommand("BackgroundImageCache", false, true);</script><![endif]-->
<script type="text/javascript">
$(function(){
	if (!$.browser.msie){
		$("#icon").addClass('fade').delay(800).queue(function(next){
			$("h1, p").addClass("fade");
			$("a.link").css("opacity", 1);
			next();
		});
	}else{
		$("img, h1, p").addClass('fade');
		$('a.link').css('opacity', 1);
	}
});
</script>
 <div id="wrapper">
        <a href="<?php echo 'http://'.$_SERVER['SERVER_NAME']; ?>"><img src="/Statics/home/404/404_icon.png" id="icon"></a>
        <div>
            <h1>我勒个去</h1>
            <p>页面被外星人挟持了!<a style="color:#ff6600;" href="<?php echo 'http://'.$_SERVER['SERVER_NAME']; ?>">可能在这里！</a></p>
            <br/>
            <a class="link" href="/" onclick="history.go(-1)"><span id="sec">5</span> 秒后返回首页</a>
        </div>
</div>
<div class="section fp-auto-height">
  <div class="wk_footer_side">
    <div class="wk_footer">Copyright © 2017 weimenghulian.com <a title="baidu" href="#" target="_blank">技术支持：</a> 备案号：<a href="http://www.miitbeian.gov.cn/" target="_blank" title="鲁ICP12345678">鲁ICP12345678</a> <br />
      友情链接：
      <?php if(is_array($friend_link)): $i = 0; $__LIST__ = $friend_link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["url"]); ?>" target='_blank'><?php echo ($vo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
  </div>
</div>

</div>
<script src="/Statics/home/js/banner.js" type="text/javascript"></script>
<div class="clear"></div>
<div class="wp"><!--[diy=diy1]-->
  
  <div id="diy1" class="area"></div>
  
  <!--[/diy]--></div>
<div class="clear"></div>
<div id="wp" class="wp"> </div>
<div id="wk_ft" style="display:none; ">
  <div id="ft" class="wp cl" style="border:0;"> </div>
</div>
<ul id="scbar_type_menu" class="p_pop" style="display: none;">
</ul>

<link href="/Statics/home/css/service.css" rel="stylesheet" type="text/css" />
<div class="main-im">
  <div id="open_im" class="open-im"> </div>
  <div class="im_main" id="im_main">
    <div id="close_im" class="close-im"><a href="javascript:void(0);" title="点击关闭"> </a></div>
    <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=1804251146&amp;site=qq&amp;menu=yes" target="_blank" class="im-qq qq-a" title="在线QQ客服">
    <div class="qq-container"></div>
    <div class="qq-hover-c"><img class="img-qq" src="/Statics/home/images/qq.png" ></div>
    <span>QQ在线咨询</span> </a>
    <div class="im-tel">
      <dt>咨询热线</dt>
      <dt class="tel-num">187-0131-1071</dt>
      <!-- <dt>售后服务热线</dt>
      <dt class="tel-num">158-8888-8888</dt> -->
    </div>
    <div class="im-footer" style="position:relative">
      <div class="weixing-container">
        <div class="weixing-show">
          <div class="weixing-txt">微信扫一扫<br>
            关注我们<br>
            获取更多精彩风格</div>
          <img class="weixing-ma" src="/Statics/home/images/weixin.jpg" >
          <div class="weixing-sanjiao"></div>
          <div class="weixing-sanjiao-big"></div>
        </div>
      </div>
      <div class="go-top"><a href="#" title="返回顶部"></a> </div>
      <div style="clear:both"></div>
    </div>
  </div>
</div>
<script type="text/javascript">

PTM(document).ready(function(){

PTM('#close_im').bind('click',function(){

PTM('#main-im').css("height","0");

PTM('#im_main').hide();

PTM('#open_im').show();

});

PTM('#open_im').bind('click',function(e){

PTM('#main-im').css("height","272");

PTM('#im_main').show();

PTM(this).hide();

});



PTM(".weixing-container").bind('mouseenter',function(){

PTM('.weixing-show').show();

})

PTM(".weixing-container").bind('mouseleave',function(){        

PTM('.weixing-show').hide();

});

});

</script> 
<script src="/Statics/home/js/home.js" type="text/javascript"></script>
<div id="scrolltop"> <span hidefocus="true"><a title="返回顶部" onclick="window.scrollTo('0','0')" class="scrolltopa" ><b>返回顶部</b></a></span> </div>
<script type="text/javascript">_attachEvent(window, 'scroll', function () { showTopLink(); });checkBlind();</script>
<div id="discuz_tips" style="display:none;"></div>
<script src="/Statics/home/js/discuz_tips.js" type="text/javascript" charset="UTF-8"></script>
</body>
</html>
<script type="text/javascript">
	$(function () {  
	  setTimeout("lazyGo();", 1000);
	});
	function lazyGo() {
		var sec = $("#sec").text();
		$("#sec").text(--sec);
		if (sec > 0)
			setTimeout("lazyGo();", 1000);
		else
			window.location.href = 'http://'+document.domain;
	}
</script>