var $form;
var form;
var $;
layui.config({
	base : "js/"
}).use(['form','layer','upload','laydate'],function(){
	form = layui.form;
	var layer = parent.layer === undefined ? layui.layer : parent.layer;
		$ = layui.jquery;
		$form = $('form');
		laydate = layui.laydate;

    //添加验证规则
    form.verify({
        newPwd : function(value, item){
            if(value.length < 6){
                return "密码长度不能小于6位";
            }
        },
        confirmPwd : function(value, item){
            if(!new RegExp($("#oldPwd").val()).test(value)){
                return "两次输入密码不一致，请重新输入！";
            }
        }
    })

    //判断是否修改过头像，如果修改过则显示修改后的头像，否则显示默认头像
    if(window.sessionStorage.getItem('userFace')){
    	$("#userFace").attr("src",window.sessionStorage.getItem('userFace'));
    }else{
    	$("#userFace").attr("src","/Statics/admin/images/face.jpg");
    }

    //提交个人资料
    form.on("submit(changeUser)",function(data){
        push = {
            'user_name' : $("#user_name").val(),
            'realname' : $(".realName").val(),
            'sex' : data.field.sex,
            'phone' : $(".userPhone").val(),
            'email' : $(".userEmail").val(),
            'role_id' : $("#role_id").val(),
            'password' : $("#password").val(),
            'id': $("#id").val()
        };
        var index = layer.msg('提交中，请稍候',{icon: 16,time:false,shade:0.8});
        $.ajax({
            url  : '/admin.php/User/ajaxAddUser.html',
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
    	return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
    })

    $("body").on("click","#logout",function(){  //修改状态
        layer.confirm('确定退出？',{icon:3, title:'提示信息'},function(index){
            var index = layer.msg('正在退出，请稍候',{icon: 16,time:false,shade:0.8});
            $.ajax({
                url  : '/admin.php/Public/logout.html',
                type : "post",
                dataType :"json",
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

    //修改密码
    form.on("submit(changePwd)",function(data){
        var push ={
            oldpwd:$("#oldpwd").val(),
            newpwd:$("#newpwd").val(),
            rnewpwd:$("#rnewpwd").val(),
        };
    	var index = layer.msg('提交中，请稍候',{icon: 16,time:false,shade:0.8});
        $.ajax({
            url  : '/admin.php/Public/ajaxUpdatePwd.html',
            type : "post",
            dataType :"json",
            data:push,
            success : function(data){
                if (data.code == '128') {
                    setTimeout(function(){
                        top.layer.close(index);
                        top.layer.msg(data.msg);
                        $(".pwd").val('');
                    },2000);
                } else if(data.code == '129'){
                    top.layer.close(index);
                    top.layer.msg(data.msg);
                    return false;
                }
            }
        });

    	return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
    })

})


