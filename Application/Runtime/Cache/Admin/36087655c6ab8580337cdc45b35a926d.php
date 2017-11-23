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
<link rel="stylesheet" href="/Statics/admin/css/user.css" media="all" />
<body class="childrenBody">
	<blockquote class="layui-elem-quote news_search">
		<div class="layui-inline">
		<form action="<?php echo u('News/index');?>" method="get">
				<div class="layui-input-inline">
		    	<input type="text" value="<?php echo ($keyword); ?>" name="keyword" placeholder="请输入关键字" class="layui-input search_input">
		    </div>
		    <input type="submit" value="查询" class="layui-btn search_btn"/>
		</form>
		</div>
		<div class="layui-inline">
			<a class="layui-btn layui-btn-normal newsAdd_btn">添加文章</a>
		</div>
		<!-- <div class="layui-inline">
			<a class="layui-btn layui-btn-danger batchDel">批量删除</a>
		</div> -->
		<div class="layui-inline">
			<div class="layui-form-mid layui-word-aux"> <!-- --></div>
		</div>
	</blockquote>
	<div class="layui-form news_list">
	  	<table class="layui-table">
		    <colgroup>
		    	<col width="50">
				<col width="50">
				<col>
				<col width="15%">
				<col width="15%">
				<col width="15%">
				<col width="20%">
		    </colgroup>
		    <thead>
				<tr>
					<th>编号</th>
					<th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose" id="allChoose"></th>
					<th>标题</th>
					<th>分类</th>
					<th>审核状态</th>
					<th>添加时间</th>
					<th>操作</th>
				</tr> 
		    </thead>
		    <tbody class="news_content">
		    	<?php if(empty($news_list) != true): if(is_array($news_list)): $i = 0; $__LIST__ = $news_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
					        	<td><?php echo ($val["id"]); ?></td>
					            <td><input type="checkbox" lay-skin="primary" lay-filter="choose" value="<?php echo ($val["id"]); ?>" name="id[]"></td>
					            <td><?php echo ($val["title"]); ?></td>
					            <td><?php echo ($val["cate_name"]); ?></td>
					            <td><input type="checkbox" name="status" lay-skin="switch" lay-text="是|否" lay-filter="isShow" data-id="<?php echo ($val["id"]); ?>" class="status" <?php if($val['status'] == 1): ?>checked<?php endif; ?>></td>
					     		<td><?php echo (date('Y-m-d H:i:s',$val["add_time"])); ?></td>
					            <td align="center">
					            	<a class="layui-btn layui-btn-mini news_edit" data-id="<?php echo ($val["id"]); ?>"><i class="iconfont icon-edit"></i> 编辑</a>
					            	<?php if($val['status']==1): ?><a class="layui-btn layui-btn-danger layui-btn-mini news_del" data-id="<?php echo ($val["id"]); ?>"><i class="layui-icon">&#xe640;</i> 删除</a>
					            	<?php else: ?>
					            	<a class="layui-btn layui-btn-danger layui-btn-mini" style="background-color:gray;" data-id="<?php echo ($val["id"]); ?>"><i class="layui-icon">&#xe640;</i> 已删</a><?php endif; ?>
					            </td>
					        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

		    		<?php else: ?>
		    			<tr><td colspan="7">暂无数据</td></tr><?php endif; ?>
		    </tbody>
		</table>
	</div>
	<div id="page"><?php echo ($page); ?></div>
	<script type="text/javascript" src="/Statics/admin/layui/layui.all.js"></script>
	<script type="text/javascript" src="/Statics/admin/js/newsList.js"></script>
    <script type="text/javascript" src="/Statics/admin/layui/layui.all.js"></script>
    <script type="text/javascript" src="/Statics/admin/js/leftNav.js"></script>
    <script type="text/javascript" src="/Statics/admin/js/index.js"></script>
</body>
</html>