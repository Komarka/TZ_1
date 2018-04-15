<?php

namespace App\Http\Controllers;
use App\Comment as Comment;
use Illuminate\Http\Request;

class ModerController extends BaseController
{
    public function index(Request $request){
    	$comment=new Comment();
    	 $comment->text = $request->comment;
$comment->user_id=$request->user_id;
$comment->news_id=$request->news_id;
$comment->is_allowed=false;
$comment->respond=$request->has('respond') ? 1 : null;
        $comment->save();
    	    	return ['message'=>'Ваше сообщение будет обработано в ближайшее время модератором','moder'=>true];
    }
    public function showPolyticalComments(){
    	$nonChecked=Comment::where('is_allowed',0)->orderBy('created_at','desc')->paginate(5);
    	return view('moderator.nonCheckedComments',['nonChecked'=>$nonChecked]);
    }
    public function publish(Request $request){
    	$comment=Comment::find($request->publish_id);
    	$comment->is_allowed=true;
    	$comment->save();
    	return redirect()->back();
    }
      public function notpublish(Request $request){
    	$comment=Comment::find($request->nonpublish_id);
    	$comment->delete();
    	return redirect()->back();
    }
}
