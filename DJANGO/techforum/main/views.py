from django.shortcuts import render
from main.forms import *



def Index(request):
	user=None
	if(request.COOKIES.get('user')):
		user=User.objects.get(id=request.COOKIES.get('user'))	
	posts=Post.objects.all()
	return render(request,'index.html',{'posts':posts,'user':user})


def DisplayPost(request, id):
	user=None
	if(request.COOKIES.get('user')):
		user=User.objects.get(id=request.COOKIES.get('user'))	
	post=Post.objects.get(id=id)
	return render(request,'post.html',{'post':post,'user':user})
