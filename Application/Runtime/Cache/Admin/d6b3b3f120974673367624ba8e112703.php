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
<body class="childrenBody">
	<form class="layui-form">
		<div class="layui-form-item">
			<label class="layui-form-label">文章标题</label>
			<div class="layui-input-block">
				<input type="text" name="title" id="title" value="<?php echo ($info["title"]); ?>" class="layui-input newsName" lay-verify="required" placeholder="请输入文章标题">
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-inline">
				<label class="layui-form-label">自定义属性</label>
				<div class="layui-input-block">
					<input type="checkbox" name="is_hot" id="is_hot" class="tuijian" title="推荐">
					<input type="checkbox" name="status" id="status" class="newsStatus" title="审核">
				</div>
			</div>
			<div class="layui-inline">		
				<label class="layui-form-label">文章作者</label>
				<div class="layui-input-inline">
					<input type="text" class="layui-input newsAuthor" name="author" id="author"  placeholder="请输入文章作者">
				</div>
			</div>
			<div class="layui-inline">		
				<label class="layui-form-label">发布时间</label>
				<div class="layui-input-inline">
					<input type="text" class="layui-input newsTime" name="add_time" id="add_time" lay-verify="date" onclick="layui.laydate.render({elem:this})">
				</div>
			</div>
			<div class="layui-inline">
				<label class="layui-form-label">分类</label>
				<div class="layui-input-inline">
					<select name="browseLook" class="newsLook" name="cate_id" id="cate_id" lay-filter="browseLook">
				        <option value="0">选择文章分类</option>
				        <?php if(is_array($category_list)): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($info['cate_id']==$vo['id']){echo 'selected';}?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				        
				    </select>
				</div>
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-inline">		
				<label class="layui-form-label">阅读人数</label>
				<div class="layui-input-inline">
					<input type="text" class="layui-input newsAuthor" name="view" id="view" value="<?php echo ($info["view"]); ?>" placeholder="请输入文章阅读人数"value="<?php echo $info['view']?$info['view']:0;?>">
				</div>
			</div>
			<div class="layui-inline">		
				<label class="layui-form-label">排序</label>
				<div class="layui-input-inline">
					<input type="text" class="layui-input newsAuthor" name="sort" id="sort" lay- placeholder="请输入文章排序" value="<?php echo $info['sort']?$info['sort']:0;?>">
				</div>
			</div>
	
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">文章配图</label>
			<div class="layui-input-block">
					<button type="button" class="layui-btn" id="img_upload"><i class="layui-icon">&#xe67c;</i>上传图片</button>
					<input type="hidden" name="img" id="news_img" value=<?php echo ($info["img"]); ?>>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">关键字</label>
			<div class="layui-input-block">
				<input type="text" class="layui-input" name="seo_key" id="seo_key" placeholder="请输入文章关键字">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">内容摘要</label>
			<div class="layui-input-block">
				<textarea placeholder="请输入内容摘要" name="abstract" id="abstract" value="<?php echo ($info["abstract"]); ?>" class="layui-textarea"></textarea>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">文章内容</label>
			<div class="layui-input-block">
				<textarea class="layui-textarea layui-hide" name="content" lay-verify="content" id="news_content"><?php echo ($info["content"]); ?></textarea>
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-input-block">
			    <input type="hidden" name="id" id="id" value="<?php echo ($info["id"]); ?>">
				<button class="layui-btn" lay-submit="" lay-filter="addNews">立即提交</button>
<!-- 				<button type="reset" class="layui-btn layui-btn-primary">重置</button> -->
		    </div>
		</div>
	</form>
	<script type="text/javascript" src="/Statics/admin/layui/layui.all.js"></script>
	<script type="text/javascript" src="/Statics/admin/js/addNews.js"></script>
</body>
</html>