<?php

namespace App\Http\Controllers;
use App\Category as Category;
use App\Advertisement as Adv;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index(){
   	$welcome="Добро пожаловать в панель админа!";
   	return view('admin.index',['welcome'=>$welcome]);
   }

   public function category(){
$category=Category::paginate(5);
return view('admin.category',['category'=>$category]);
   }
   public function categoryCreate(){
   	return view('admin.category.create');
   }
   public function categoryStore(Request $request){
   	  Category::create($request->all());
        return redirect()->route('admin.category');
   }
   public function categoryEdit($id){
   	 $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
   }
   public function categoryUpdate(Request $request, $id)
    {
        $author = Category::findOrFail($id);
        $author->update($request->all());
        return redirect()->route('admin.category');
    }  
     public function categoryDestroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category');
    }



      public function adv(){
$adv=Adv::paginate(5);
return view('admin.adv',['adv'=>$adv]);
   }
   public function advCreate(){
   	return view('admin.adv.create');
   }
   public function advStore(Request $request){
   	  Adv::create($request->all());
        return redirect()->route('admin.adv');
   }
   public function advEdit($id){
   	 $adv = Adv::findOrFail($id);
        return view('admin.adv.edit', compact('adv'));
   }
   public function advUpdate(Request $request, $id)
    {
        $adv = Adv::findOrFail($id);
        $adv->update($request->all());
        return redirect()->route('admin.adv');
    }  
     public function advDestroy($id)
    {
        $adv = Adv::findOrFail($id);
        $adv->delete();
        return redirect()->route('admin.adv');
    }




    

   }
