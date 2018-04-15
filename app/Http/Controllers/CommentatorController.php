<?php

namespace App\Http\Controllers;
use App\Comment as Comment;

use Illuminate\Http\Request;

class CommentatorController extends BaseController
{
   public function index($user_id){
   	$comments=Comment::where('user_id',$user_id)->orderBy('created_at','desc')->paginate(5);
return view('comments.allComments',['comments'=>$comments]);

   }
}
