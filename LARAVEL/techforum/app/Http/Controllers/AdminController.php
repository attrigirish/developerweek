<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\User;
use App\Topic;

class AdminController extends Controller
{
    function Login(Request $request){

    	$user=User::where('user_id',Cookie::get('userid'))->first();

    	if($user){
    		return redirect('/admin');
    	}
    	

    	if($request->method()=='GET')
    	{
    		return view('/admin/login');
    	}
    	else
    	{
    		$userdetail=$request->GET('userdetail');
    		$password=$request->GET('password');
    		$user = User::where([
    				['display_name','=',$userdetail],
    				['password','=',$password]
    		    ])->orWhere([
    				['email','=',$userdetail],
    			    ['password','=',$password]
    		    ])->orWhere([
    				['phone','=',$userdetail],
    			    ['password','=',$password]
    		    ])
    			->first();

    		Cookie::queue('userid', $user->user_id);
	    }
    }

    function Index(Request $request)
    {
        if(!Cookie::get('userid'))
        {
            return redirect('/admin/login');
        }
        return view('admin/index');
    }

    function Logout(Request $request){
        Cookie::queue('userid','', -1);
        return redirect('/admin');
    }

    function AddTopic(Request $request){
        if($request->method()=='GET'){
                return view('/admin/addtopic');
        }
        else{
            $topic=new Topic();
            $topic->create($request->all());
            return redirect('/admin/topics');
        }
    }

    function DisplayTopics(Request $request){
        $topics=Topic::all();
        return view('/admin/topics',['topics'=>$topics]);
    }
}
