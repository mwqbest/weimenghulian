layui.config({
	base : "js/"
}).use(['form','layer'],function(){
	 var form = layui.form,
		layer = parent.layer === undefined ? layui.layer : parent.layer,
		$ = layui.jquery;
	//video背景
	$(window).resize(function(){
		if($(".video-player").width() > $(window).width()){
			$(".video-player").css({"height":$(window).height(),"width":"auto","left":-($(".video-player").width()-$(window).width())/2});
		}else{
			$(".video-player").css({"width":$(window).width(),"height":"auto","left":-($(".video-player").width()-$(window).width())/2});
		}
	}).resize();
	
	//登录按钮事件
	form.on("submit(login)",function(data){
		var url      = $("#form").attr("action");    // 获取 表单的 提交地址
		var username = $('#username').val();
		var password = $('#password').val();
		var verify   = $('#verify').val();
		$.ajax({
			url  : url,
			type : "post",
			dataType : "json",
			data:{username:username,password:password,verify:verify},
			success : function(data){
				if (data.code == '128') {
	                layer.msg(data.msg, {
						icon: 1,
						time: 1000 //2秒关闭（如果不配置，默认是3秒）
						}, function(){
						window.location.href=data.data;
					});
	            } else if(data.code == '129'){
	                layer.alert(data.msg, {icon: 5});
	            }
			}
		})
        return false;
	})
})
