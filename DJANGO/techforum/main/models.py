from django.db import models


class User(models.Model):
	name = models.CharField(max_length=50, default="user")
	username = models.SlugField(max_length=50, default="user")
	email = models.EmailField(max_length=50)
	phone = models.IntegerField()
	password = models.CharField(max_length=50)
	photo = models.FileField()
	usertype = models.IntegerField(default=3)	#1: Administrator, 2:Moderator, 3:User


class Topic(models.Model):
	name = models.CharField(max_length=50)
	description = models.TextField()


class Post(models.Model):
	user = models.ForeignKey(User, on_delete=models.CASCADE)
	topic = models.ForeignKey(Topic, on_delete=models.CASCADE)	
	title = models.TextField()
	body = models.TextField()
	date = models.DateField()
	isactive = models.BooleanField()


class PostImages(models.Model):
	post = models.ForeignKey(Post, on_delete=models.CASCADE)
	url = models.URLField()


class Response(models.Model):	
	user = models.ForeignKey(User, on_delete=models.CASCADE)
	post = models.ForeignKey(Post, on_delete=models.CASCADE)
	body = models.TextField()
	date = models.DateField()
	isflagged = models.BooleanField()


class Views(models.Model):
	user = models.ForeignKey(User, on_delete=models.CASCADE)
	post = models.ForeignKey(Post, on_delete=models.CASCADE)


class Votes(models.Model):
	user = models.ForeignKey(User, on_delete=models.CASCADE)
	post = models.ForeignKey(Post, on_delete=models.CASCADE)
	vote = models.IntegerField()	#1 : Like, 0 : Dislike


