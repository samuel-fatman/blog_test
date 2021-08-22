<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comments;
use DB;

class BlogController extends Controller
{
    public static function post_blog()
    {
        $categories=Category::get();
        return view('user.blog_post',compact('categories'));
    }

    public static function post_blog_submit(Request $request)
    {

        $request->validate([

            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $user=Session::get('user');
        $image=date("YmdHis").'_'.$request->file('photo')->getClientOriginalName();
        
        DB::beginTransaction();
        try{
          $request->photo->storeAs('images', $image);

          $blog = new Blog;
  
          $blog->kokyakuorderbango = $request->title;
          $blog->kokyakubango = $user->bango;
          $blog->date = date("Y-m-d H:i:s");
          $blog->datachar04 = $request->tag;
          $blog->datachar05 = $request->editor1;
          $blog->datachar06 = $image;
          $blog->intorder01 = $request->category;
          $blog->save();

          DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            return $e;
        }
        
        return Redirect::back(); 
        

    }

    public static function post_detail($post_id){

        $blog=Blog::where('bango',$post_id)->first();

        return view('user.post',compact('blog'));

    }

    public static function post_comment(Request $request)
    {
        $request->validate([

            'comment' => 'required',

        ]);
        
        $user=Session::get('user');

        $Comment = new Comments;
        $Comment->orderbango=$request->post_id;
        $Comment->kanryoubi=date("Y-m-d H:i:s");
        $Comment->datachar01=$request->comment;
        $Comment->yoteisu=$user->bango;

        $Comment->save();
        
        return Redirect::back(); 
    }
    
    public static function blog_delete($id)
    {
 
        Blog::find($id)->delete();

        return Redirect::route('homepage'); 
    }
    
    public static function blog_edit($id)
    {
        $blog=Blog::find($id);
        $categories=Category::get();
        return view('user.blog_edit',compact('categories','blog'));
         
    }

    public static function blog_edit_submit(Request $request,$id)
    {

        Blog::where('bango',$id)->update(['datachar05'=>$request->editor1]);

        return Redirect::back(); 
    }

    public static function comment_delete($id,$time)
    {
        Comments::where('orderbango',$id)
                 ->where('kanryoubi',$time)
                 ->where('yoteisu',$user=Session::get('user')->bango)
                 ->delete();

        return Redirect::back(); 
    }
    public static function comment_edit(Request $request,$id,$time)
    {
        
        Comments::where('orderbango',$id)
                 ->where('kanryoubi',$time)
                 ->where('yoteisu',$user=Session::get('user')->bango)
                 ->update(['datachar01'=>$request->edited_comment]);

        return Redirect::back(); 
    }
}
