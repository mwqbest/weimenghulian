layui.config({
	base : "js/"
}).use(['form','layer','jquery','laypage'],function(){
	var form = layui.form,
		layer = parent.layer === undefined ? layui.layer : parent.layer,
		laypage = layui.laypage,
		$ = layui.jquery;

	//添加文章
	//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
	$(window).one("resize",function(){
		$(".userAdd_btn").click(function(){
			var index = layui.layer.open({
				title : "添加用户",
				type : 2,
				content : "/admin.php/User/userOption.html",
				success : function(layero, index){
					setTimeout(function(){
						layui.layer.tips('点击此处返回用户列表', '.layui-layer-setwin .layui-layer-close', {
							tips: 3
						});
					},500)
				}
			})			
			layui.layer.full(index);
		})
	}).resize();


	$("body").on("click",".layui-form-switch",function(){  //修改状态
		var _this = $(this).prev();
		var id =_this.attr("data-id");
		layer.confirm('确定修改此状态？',{icon:3, title:'提示信息'},function(index){
			var index = layer.msg('修改中，请稍候',{icon: 16,time:false,shade:0.8});
			$.ajax({
				url  : '/admin.php/User/ajaxDelUser.html',
				type : "post",
				dataType :"json",
				data:{id:id},
				success : function(data){
					if (data.code == '128') {
						layer.close(index);
	                	layer.msg("修改成功！");
	                	location.reload();
		            } else if(data.code == '129'){
		            	layer.msg('修改失败');
		            	return false;
		            }
				}
			});
			layer.close(index);
		});
	})

	//操作
	$("body").on("click",".user_edit",function(){  //编辑
		var _this = $(this);
		var id =_this.attr("data-id");
		var index = layui.layer.open({
				title : "编辑用户",
				type : 2,
				content : "/admin.php/User/userOption.html?id="+id,
				success : function(layero, index){
					setTimeout(function(){
						layui.layer.tips('点击此处返回用户列表', '.layui-layer-setwin .layui-layer-close', {
							tips: 3
						});
					},500)
				}
			})			
			layui.layer.full(index);
	})

	$("body").on("click",".user_del",function(){  //删除
		var _this = $(this);
		var id    = _this.attr("data-id");
		var type  = _this.attr("data-type");
		var del=type==1?'恢复':'删除';
		layer.confirm('确定'+del+'此用户？',{icon:3, title:'提示信息'},function(index){
			$.ajax({
				url  : '/admin.php/User/ajaxDelUser.html',
				type : "post",
				dataType :"json",
				data:{id:id},
				success : function(data){
					if (data.code == '128') {
						//_this.parents("tr").remove();
	                	layer.msg(del+"成功！");
	                	location.reload();
		            } else if(data.code == '129'){
		            	layer.msg(del+'失败');
		            	return false;
		            }
				}
			});
			layer.close(index);
		});
	})

})
