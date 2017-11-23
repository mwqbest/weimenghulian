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
		    <div class="layui-input-inline">
		    	<input type="text" value="" placeholder="请输入关键字" class="layui-input search_input">
		    </div>
		    <a class="layui-btn search_btn">查询</a>
		</div>
		<div class="layui-inline">
			<a class="layui-btn layui-btn-normal newsAdd_btn">添加用户</a>
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
					<th>用户名</th>
					<th>角色</th>
					<th>审核状态</th>
					<th>添加时间</th>
					<th>操作</th>
				</tr> 
		    </thead>
		    <tbody class="news_content">
		    	<?php if(empty($user_list) != true): if(is_array($user_list)): $i = 0; $__LIST__ = $user_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
					        	<td><?php echo ($val["id"]); ?></td>
					            <td><input type="checkbox" lay-skin="primary" lay-filter="choose" value="<?php echo ($val["id"]); ?>" name="id[]" <?php if($val['user_name'] == 'admin'): ?>disabled="disabled"<?php endif; ?>></td>
					            <td><?php echo ($val["user_name"]); ?></td>
					            <td><?php echo ($val["role_name"]); ?></td>
					            <td><input type="checkbox" name="show" lay-skin="switch" lay-text="是|否" lay-filter="isShow" <?php if($val['status'] == 1): ?>checked<?php endif; ?>></td>

					     		<td><?php echo (date('Y-m-d H:i:s',$val["add_time"])); ?></td>
					            <td align="center">
					            	<a class="layui-btn layui-btn-mini news_edit"><i class="iconfont icon-edit"></i> 编辑</a>
					            	<a class="layui-btn layui-btn-danger layui-btn-mini news_del" data-id="<?php echo ($val["id"]); ?>"><i class="layui-icon">&#xe640;</i> 删除</a>
					            </td>
					        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

		    		<?php else: ?>
		    			<tr><td colspan="7">暂无数据</td></tr><?php endif; ?>
		    </tbody>
		</table>
	</div>
	<div id="page"><?php echo ($page); ?></div>
	<!-- <script type="text/javascript" src="/Statics/admin/js/userList.js"></script> -->
	<script language="javascript">
	function status(id,type){
	    $.post("<?php echo u('user/status');?>", { id: id, type: type }, function(jsondata){
			
			//var return_data  = eval("("+jsondata+")");
			$("#"+type+"_"+id+" img").attr('src', '/statics/images/status_'+jsondata+'.gif');
		}); 
	}
</script>
    <script type="text/javascript" src="/Statics/admin/layui/layui.all.js"></script>
    <script type="text/javascript" src="/Statics/admin/js/leftNav.js"></script>
    <script type="text/javascript" src="/Statics/admin/js/index.js"></script>
</body>
</html>