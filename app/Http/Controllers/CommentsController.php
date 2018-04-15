<?php

namespace App\Http\Controllers;
use App\Comment as Comment;
use App\User as User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(Request $request){
    	if ($request->has('like')|| $request->has('dislike')){
    		return $this->socials($request);
    	}

    	$comment=new Comment();
    	 $comment->text = $request->comment;
$comment->user_id=$request->user_id;
$comment->news_id=$request->news_id;
$comment->is_allowed=true;
$comment->respond=$request->has('respond') ? 1 : null;
        $comment->save();
        $user=User::find($request->user_id);
        $time = \Carbon\Carbon::now();
        return ['user'=>$user->name,'time'=>$time,'comment'=>$request->comment,'comment_id'=>$comment->id];
    }

    private function socials($request){
    	if($request->like){
    		$comment=Comment::find($request->comment_id);
    		$comment->increment('likes',1);
    		return $comment->likes;
    	}else{
    		$comment=Comment::find($request->comment_id);
    		$comment->increment('dislikes',1);
    		return $comment->dislikes;
    	}
    }

}
