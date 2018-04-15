<?php

namespace App\Http\Controllers;
use App\News as News;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    public function index(Request $request){
$type= $request->input('typeOfData');
if($type==='tag'){
	return $this->tagsSearch($request);
}
else if($type==='article_name'){
	return $this->ArticleNameSearch($request);
}
else{
 return $this->DateSearch($request);
}

}

private function tagsSearch($request){
	$query=$request->input('query');
$error=null;
$articles=News::where('tags',$query)->orderBy('date','desc')->paginate(5);
if($articles->isEmpty()){
$error='Вы ввели неправильный тег!';
}
return view('categories.allArticles',['articles'=>$articles,'error'=>$error]);
    }

private function ArticleNameSearch($request){
	$query=$request->input('query');
$error=null;
$articles=News::where('title',$query)->orderBy('date','desc')->paginate(5);
if($articles->isEmpty()){
$error='Вы ввели неправильное название статьи!';
}
return view('categories.allArticles',['articles'=>$articles,'error'=>$error]);
    }

private function DateSearch($request){
	$query=$request->input('query');
$error=null;
$articles=News::where('date',$query)->orderBy('date','desc')->paginate(5);
if($articles->isEmpty()){
$error='По этой дате нет статей!';
}
return view('categories.allArticles',['articles'=>$articles,'error'=>$error]);
    }





}
