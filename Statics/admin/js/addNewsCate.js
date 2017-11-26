layui.config({
	base : "js/"
}).use(['form','layer','jquery','laydate','upload'],function(){
	var form = layui.form,
		layer = parent.layer === undefined ? layui.layer : parent.layer,
		laypage = layui.laypage,
		laydate = layui.laydate,
		upload = layui.upload,
		$ = layui.jquery;

 	var addNewsCateArray = [],addNewsCate;

 	form.on("submit(addNewsCate)",function(data){
	 	//显示、审核状态
 		var is_show = data.field.is_show=="on" ? 1 : 0;
 		var push ={
 			name:$("#name").val(),
 			sort:$("#sort").val(),
 			keyword:$("#keyword").val(),
 			description:$("#description").val(),
 			id:$("#id").val(),
 			pid:$("#pid").val(),
 			is_show:is_show
 		};
 		//弹出loading
 		var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
 		$.ajax({
			url  : '/admin.php/News/ajaxAddNewsCate.html',
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
