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
		$(".newsCateAdd_btn").click(function(){
			var index = layui.layer.open({
				title : "添加新闻分类",
				type : 2,
				content : "/admin.php/News/newsCateOption.html",
				success : function(layero, index){
					setTimeout(function(){
						layui.layer.tips('点击此处返回文章分类列表', '.layui-layer-setwin .layui-layer-close', {
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
				url  : '/admin.php/News/ajaxDelNewsCategory.html',
				type : "post",
				dataType :"json",
				data:{id:id,type:0},
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
	$("body").on("click",".news_cate_edit",function(){  //编辑
		var _this = $(this);
		var id =_this.attr("data-id");
		var index = layui.layer.open({
				title : "编辑新闻分类",
				type : 2,
				content : "/admin.php/News/newsCateOption.html?id="+id,
				success : function(layero, index){
					setTimeout(function(){
						layui.layer.tips('点击此处返回文章分类列表', '.layui-layer-setwin .layui-layer-close', {
							tips: 3
						});
					},500)
				}
			})			
			layui.layer.full(index);
	})


	$("body").on("click",".news_cate_del",function(){  //删除
		var _this = $(this);
		var id    = _this.attr("data-id");
		layer.confirm('确定删除此分类？',{icon:3, title:'提示信息'},function(index){
			$.ajax({
				url  : '/admin.php/News/ajaxDelNewsCategory.html',
				type : "post",
				dataType :"json",
				data:{id:id,type:1},
				success : function(data){
					if (data.code == '128') {
						//_this.parents("tr").remove();
	                	layer.msg("删除成功！");
	                	location.reload();
		            } else if(data.code == '129'){
		            	layer.msg('删除失败');
		            	return false;
		            }
				}
			});
			layer.close(index);
		});
	})

})
