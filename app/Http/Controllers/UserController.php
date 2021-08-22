<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Blog;
use App\Models\Category;

class UserController extends Controller
{
    public function index()
    {
        $blogs=Blog::all();
        $categories=Category::get();
        return view('index',compact('blogs','categories'));
    }

    public static function registration()
    {
        return view('user.user_registration');
    }
    
    public static function form_submit(Request $request)
    {
    
        $inputs = request()->validate([
           'name' => 'required | min:6 | max: 20',
           'mail' => 'required|unique:kokyaku1,mail_soushin',
           'password' => 'required| min:4| max:7 |confirmed',
           'password_confirmation' => 'required| min:4'
        ]);
         
        $user = new User;

        $user->name = request('name');
        $user->mail_soushin = request('mail');
        $user->mail_toiawase_mb = request('password');
        //$user->mail_toiawase_mb = bcrypt(request('password'));
        $user->save();

        Session::flash('message', "Special message goes here");
        return Redirect::back(); 
    }
    
    public static function login()
    {
        return view('user.login');
    }

    public static function form_submit_login(Request $request)
    {
        //dd($request->all());
        //$hash_pass=bcrypt(request('password'));
        $user=User::where('mail_soushin',request('mail'))
                   ->where('mail_toiawase_mb',request('password'))
                   ->first();
        
      /*  if(! bcrypt( $user->mail_toiawase_mb , request('password') ) ){
            dd('hose');
        }*/
        Session::put('user',$user);
        if(!empty($user)){
          return Redirect::route('homepage'); 
        }

        return Redirect::back(); 
        
    }
    
    public static function user_logout()
    {
        Session::forget('user');
        return Redirect::route('homepage'); 
    }
    
}
