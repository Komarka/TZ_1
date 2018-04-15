<?php

namespace App\Http\Controllers;
use App\Category as Category;
use App\Comment as Comment;
use Illuminate\Support\Facades\Cache;
use DB;
use Illuminate\Http\Request;
use View;
class BaseController extends Controller
{
   public function __construct(){
   	$amount=Comment::where('is_allowed',0)->count();
   	$categories = Cache::remember('categories', 120, function () {
    return DB::table('categories')->get();
});
return View::share(['categories'=>$categories,'amount'=>$amount]);
   }
}
