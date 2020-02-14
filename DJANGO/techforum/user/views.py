from django.shortcuts import render,redirect
from django.http import HttpResponse
from main.models import *
from main.forms import *

from datetime import date


def Register(request):
	if(request.method=='GET'):
		form=RegisterForm()
		return render(request,'register.html', {'form':form})
	else:
		model=RegisterForm(request.POST)
		model.save()
		return HttpResponse("Saved Successfully")


def Login(request):
	if(request.method=='GET'):
		form=LoginForm()
		return render(request,'login.html',{'form':form})
	else:
		userdetail=request.POST.get('userdetail')
		password=request.POST.get('password')

		users = list(filter(lambda x:x.username==userdetail or x.email==userdetail or x.phone==userdetail and x.password==password, User.objects.all()))


		if(len(users)==0):
			form = LoginForm()
			return render(request,'login.html',{'form':form,'error':'Incorrect Details'})
		else:
			user=users[0]
			response=redirect('/')
			response.set_cookie('user',user.id,max_age=60*60*24*365)
			return response


def CreatePost(request):
	try:
		user = User.objects.get(id=request.COOKIES.get('user'))
		if(request.method=='GET'):
			form=PostForm()
			return render(request,'createpost.html',{'form':form})
		else:
			post=Post()
			post.title=request.POST.get('title')
			post.body=request.POST.get('body')
			post.topic=Topic.objects.get(id=request.POST.get('topic'))
			post.user=user
			post.date=date.today()
			post.isactive=True
			post.save()	
			return redirect('/')
	except Exception as e:
		print(e)
		return redirect('/user/login/')

	