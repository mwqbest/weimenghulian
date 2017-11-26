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
		$(".friendlinkAdd_btn").click(function(){
			var index = layui.layer.open({
				title : "添加友情链接",
				type : 2,
				content : "/admin.php/Friendlink/friendlinkOption.html",
				success : function(layero, index){
					setTimeout(function(){
						layui.layer.tips('点击此处返回友情链接列表', '.layui-layer-setwin .layui-layer-close', {
							tips: 3
						});
					},500)
				}
			})			
			layui.layer.full(index);
		})
	}).resize();


	//操作
	$("body").on("click",".friendlink_edit",function(){  //编辑
		var _this = $(this);
		var id =_this.attr("data-id");
		var index = layui.layer.open({
				title : "编辑友情链接",
				type : 2,
				content : "/admin.php/Friendlink/friendlinkOption.html?id="+id,
				success : function(layero, index){
					setTimeout(function(){
						layui.layer.tips('点击此处返回友情链接列表', '.layui-layer-setwin .layui-layer-close', {
							tips: 3
						});
					},500)
				}
			})			
			layui.layer.full(index);
	})


	$("body").on("click",".friendlink_del",function(){  //删除
		var _this = $(this);
		var id    = _this.attr("data-id");
		layer.confirm('确定删除此信息？',{icon:3, title:'提示信息'},function(index){
			$.ajax({
				url  : '/admin.php/Friendlink/ajaxDelFriendlink.html',
				type : "post",
				dataType :"json",
				data:{id:id,type:1},
				success : function(data){
					if (data.code == '128') {
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
