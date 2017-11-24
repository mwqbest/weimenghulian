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
			<label class="layui-form-label">分类名称</label>
			<div class="layui-input-block">
				<input type="text" name="name" id="name" value="<?php echo ($info["name"]); ?>" class="layui-input newsName" lay-verify="required" placeholder="分类名称">
			</div>
		</div>
		<div class="layui-form-item">
		<div class="layui-inline">
				<label class="layui-form-label">自定义属性</label>
				<div class="layui-input-block">
					<input type="checkbox" name="status" id="status" class="newsStatus" title="审核" <?php if($info['status']==1): ?>checked<?php endif; ?>>
				</div>
			</div>
			<div class="layui-inline">		
				<label class="layui-form-label">排序</label>
				<div class="layui-input-inline">
					<input type="text" class="layui-input newsAuthor" name="sort" id="sort"  placeholder="排序" value="<?php echo ($info["sort"]); ?>">
				</div>
			</div>

			<div class="layui-inline">
				<label class="layui-form-label">父级分类</label>
				<div class="layui-input-inline">
					<select  class="newsLook" name="pid" id="pid" lay-filter="browseLook">
				        <option value="0">选择父级分类</option>
				        <?php if(is_array($category_list)): $i = 0; $__LIST__ = $category_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($info['pid']==$vo['id']){echo 'selected';}?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				        
				    </select>
				</div>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">关键字</label>
			<div class="layui-input-block">
				<input type="text" class="layui-input" name="keyword" id="keyword" placeholder="请输入分类关键字" value="<?php echo ($info["keyword"]); ?>">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">描述</label>
			<div class="layui-input-block">
				<textarea placeholder="请输入分类描述" name="describe" id="describe" class="layui-textarea"><?php echo ($info["describe"]); ?></textarea>
			</div>
		</div>

		<div class="layui-form-item">
			<div class="layui-input-block">
			    <input type="hidden" name="id" id="id" value="<?php echo ($info["id"]); ?>">
				<button class="layui-btn" lay-submit="" lay-filter="addNewsCate">立即提交</button>
<!-- 				<button type="reset" class="layui-btn layui-btn-primary">重置</button> -->
		    </div>
		</div>
	</form>
	<script type="text/javascript" src="/Statics/admin/layui/layui.all.js"></script>
	<script type="text/javascript" src="/Statics/admin/js/addNewsCate.js"></script>
</body>
</html>