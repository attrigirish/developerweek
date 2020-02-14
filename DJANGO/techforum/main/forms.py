from django import forms
from main.models import *


class RegisterForm(forms.ModelForm):
	class Meta:
		model = User
		fields = ['email','phone','password']

	email = forms.EmailField(max_length=50)
	phone = forms.IntegerField()
	password = forms.CharField(max_length=50,widget=forms.PasswordInput)
	repeatpassword = forms.CharField(max_length=50, widget=forms.PasswordInput)

	email.widget.attrs.update({'class':'form-control','placeholder':'Email'})
	phone.widget.attrs.update({'class':'form-control','placeholder':'Phone Number'})
	password.widget.attrs.update({'class':'form-control','placeholder':'Password'})
	repeatpassword.widget.attrs.update({'class':'form-control','placeholder':'Password'})


class LoginForm(forms.Form):
	userdetail = forms.SlugField()
	password = forms.CharField(max_length=50,widget=forms.PasswordInput)

	userdetail.widget.attrs.update({'class':'form-control', 'placeholder':'User Name/Email/Phone'})
	password.widget.attrs.update({'class':'form-control','placeholder':'Password'})


class ProfileForm(forms.ModelForm):	
	class Meta:
		model = User
		fields = ['name','email','phone','photo']

	name=forms.CharField(max_length=50)
	email=forms.EmailField(max_length=50)
	phone=forms.IntegerField()
	photo=forms.FileField()

	name.widget.attrs.update({'class':'form-control','placeholder':'Name'})
	email.widget.attrs.update({'class':'form-control','placeholder':'Email'})
	phone.widget.attrs.update({'class':'form-control','placeholder':'Phone Number'})
	photo.widget.attrs.update({'class':'form-control'})


class PasswordResetForm(forms.Form):
	oldpassword=forms.CharField(widget=forms.PasswordInput, max_length=50)
	newpassword=forms.CharField(widget=forms.PasswordInput, max_length=50)
	repeatpassword=forms.CharField(widget=forms.PasswordInput, max_length=50)

	oldpassword.widget.attrs.update({'class':'form-control', 'placeholder':'Old Password'})
	newpassword.widget.attrs.update({'class':'form-control', 'placeholder':'New Password'})
	repeatpassword.widget.attrs.update({'class':'form-control', 'placeholder':'Repeat Password'})


class PostForm(forms.ModelForm):
	class Meta:
		model = Post
		fields = ['topic','title','body']	


	topicoptions = Topic.objects.values_list('id','name')

	topic = forms.ChoiceField(choices=topicoptions)
	title = forms.CharField()
	body = forms.CharField(widget=forms.Textarea)
	images = forms.ImageField()

	topic.widget.attrs.update({'class':'form-control'})
	title.widget.attrs.update({'class':'form-control','placeholder':'Title'})
	body.widget.attrs.update({'class':'form-control','placeholder':'Body'})
	images.widget.attrs.update({'multiple':'true'})


class TopicForm(forms.ModelForm):
	class Meta:
		model = Topic
		fields = '__all__'

	name = forms.CharField(max_length=50)
	description = forms.CharField(widget=forms.Textarea)

	name.widget.attrs.update({'class':'form-control','placeholder':'Topic Name'})
	description.widget.attrs.update({'class':'form-control','placeholder':'Description'})


class ResponseForm(forms.ModelForm):
	class Meta:
		model = Response
		fields = ['body']

	body = forms.CharField(widget=forms.Textarea)

	body.widget.attrs.update({'class':'form-control','placeholder':'Response'})