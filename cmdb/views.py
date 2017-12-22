from django.shortcuts import render
from cmdb import models
# Create your views here.
from django.http import HttpResponse

user_list=[
    {"user": 'a', "pwd": '123'},
    {"user":'b',"pwd":'234'},
]
#request参数必须有他封装了用户请求的所有内容
def index(request):
    #return HttpResponse("Hello world ! ")#不能直接返回字符串 必须由这个类封装起来，这是diango的规则 不是Python的
    if(request.method=='POST'):
        username = request.POST.get("username",None)
        password = request.POST.get('password',None)

        #temp = {"user": username, "pwd": password}
        #user_list.append(temp)

        #添加数据到数据库中
        models.UserInfo.objects.create(user=username,pwd=password)

     #从数据库中读取所有数据
    user_list=models.UserInfo.objects.all()
    return render(request,"index.html",{"data":user_list})#第一个参数固定的 第二个参数指定的文件