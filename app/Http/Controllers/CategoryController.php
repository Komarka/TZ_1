<?php

namespace App\Http\Controllers;
use App\News as News;
use App\Comment as Comments;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function getPolicyArticles(){
    	 return $this->getAllArticlesForCategory(1);
    	
    	    }
    	    public function getEconomicArticles(){

    	return $this->getAllArticlesForCategory(2);
    	    }
    	  public function   getCultureArticles (){

    	return $this->getAllArticlesForCategory(3);
    	  }
    	 public function  getAnalitykArticles (){

    	return $this->getAllArticlesForCategory(6);
    	 }
    	public function  getSportArticles (){

    	return $this->getAllArticlesForCategory(4);
    	}


    	private function getAllArticlesForCategory($el){
    		if(is_int($el)){
$articles=News::where('categories_id',$el)->orderBy('date','desc')->paginate(5);
return view('categories.allArticles',['articles'=>$articles]);
    	}else if (is_string($el)){
$articles=News::where('tags',$el)->orderBy('date','desc')->paginate(5);
return view('categories.allArticles',['articles'=>$articles]);
    	}
    }

    	public function getArticle($id){
    		$article=News::find($id);
            $comments=Comments::where('news_id',$id)->get();
            $analytical=$article->categories_id===6 ? true:false;
            $is_polytical=$article->categories_id===1 ? true:false;
    		 $article->increment('views', 1);
    		return view('categories.separateArticle',['article'=>$article,'analytical'=>$analytical,'comments'=>$comments,'is_polytical'=>$is_polytical]);
    	}
    	public function getArticlesByTag($tag){
return $this->getAllArticlesForCategory($tag);
    	}
    	

}

