<?php

namespace App\Http\Controllers;

use App\Category as Category;
use App\News as News;
use App\User as User;
use App\Comment as Comment;
use App\Advertisement as Adv;

use DB;
use Illuminate\Http\Request;

class MainPageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

$comments=$this->getList('topics');
$activeUsers=$this->getList('activeUsers');
 $advertisement=Adv::all();
        $latestNews=News::orderBy('date','desc')->take(3)->get();
        $latestPoliticalNews=News::where('categories_id',1)->orderBy('date','desc')->take(3)->get();
        $latestEconomiclNews=News::where('categories_id',2)->orderBy('date','desc')->take(3)->get();
        $latestCulturelNews=News::where('categories_id',3)->orderBy('date','desc')->take(3)->get();
        $latestSportlNews=News::where('categories_id',4)->orderBy('date','desc')->take(3)->get();
       return view('main', ['categories' => $categories,'latestNews'=>$latestNews,'political_news'=>$latestPoliticalNews,'economic_news'=>$latestEconomiclNews,'culture_news'=>$latestCulturelNews,'sport_news'=>$latestSportlNews,'comments'=>$comments,'active_users'=>$activeUsers,'advertisement'=>$advertisement]);
    }



    private function getList($type){
        if($type==='topics'){
                  $comments_query=DB::select('SELECT COUNT(text) as comments_number,news_id  FROM `comments` GROUP BY news_id ORDER BY comments_number DESC');
        $comments=[];
        $comments_1=News::find($comments_query[0]->news_id);
        $comments_2=News::find($comments_query[1]->news_id);
        $comments_3=News::find($comments_query[2]->news_id);
        array_push($comments, $comments_1);
        array_push($comments, $comments_2);
        array_push($comments, $comments_3); 
        return $comments;
        }else if($type==='activeUsers'){
            $active_users_query=DB::select('SELECT COUNT(text) as comments_number,user_id  FROM `comments` GROUP BY user_id ORDER BY comments_number DESC');
$active_users=[];
$active_user_1=User::find($active_users_query[0]->user_id);
$active_user_2=User::find($active_users_query[1]->user_id);
$active_user_3=User::find($active_users_query[2]->user_id);
array_push($active_users,$active_user_1);
array_push($active_users,$active_user_2);
array_push($active_users,$active_user_3);
return $active_users;

        }
    }

}
