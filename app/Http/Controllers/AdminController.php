<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    
    public function login_page()
    {
        return view('admin.login');
    }
    public function login_admin(Request $request)
    {
    
        $admin=Admin::where('bango',$request->id)->where('passwd',$request->password)->first();
        if($admin)
        {
            Session::put('admin',$admin);
            $users=User::all();
            return view('admin.dashboard',compact('users'));
        }
        
    }
    public function edit_user_by_admin($id)
    {
        $user=User::find($id);
        $users=User::all();
        return view('admin.dashboard',compact('user','users'));
    }
    public function form_submit_edit(Request $request,$id)
    {
        $inputs = request()->validate([
           'name' => 'required | min:6 | max: 20',
           'mail' => 'required|unique:kokyaku1,mail_soushin',
           'password' => 'required| min:4| max:7 |confirmed',
           'password_confirmation' => 'required| min:4'
        ]);

        User::where('bango',$id)->update([
            'name'=>request('name'),
            'mail_soushin'=>request('mail'),
            'mail_toiawase_mb'=>request('password')
        ]);
        $users=User::all();
        return view('admin.dashboard',compact('users'));
    }
    public function delete_user(Request $request,$id)
    {
        User::where('bango',$id)->delete();
        $users=User::all();
        return view('admin.dashboard',compact('users'));
    }
}
