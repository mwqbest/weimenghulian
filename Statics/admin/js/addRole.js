layui.config({
	base : "js/"
}).use(['form','layer','jquery'],function(){
	var form = layui.form,
		layer = parent.layer === undefined ? layui.layer : parent.layer,
		laypage = layui.laypage,
		$ = layui.jquery;

 	var addNewsArray = [],addNews;

 	form.on("submit(addRole)",function(data){
 		var push ={
 			name:$("#name").val(),
 			remark:$("#remark").val(),
 			id:$("#id").val()
 		};
 		//弹出loading
 		var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
 		$.ajax({
			url  : '/admin.php/Role/ajaxAddRole.html',
			type : "post",
			dataType :"json",
			data:push,
			success : function(data){
				if (data.code == '128') {
	                setTimeout(function(){
			            top.layer.close(index);
						top.layer.msg(data.msg);
			 			layer.closeAll("iframe");
				 		//刷新父页面
				 		parent.location.reload();
			        },2000);
	            } else if(data.code == '129'){
	            	top.layer.close(index);
	            	top.layer.msg(data.msg);
	            	return false;
	            }
			}
		});
 		return false;
 	})
	
})
