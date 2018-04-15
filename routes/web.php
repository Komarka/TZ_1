<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','MainPageController@index');
Route::get('/policy','CategoryController@getPolicyArticles')->name('policy');
Route::get('/economic','CategoryController@getEconomicArticles')->name('economic');
Route::get('/culture','CategoryController@getCultureArticles')->name('culture');
Route::get('/analityk','CategoryController@getAnalitykArticles')->name('analityk');
Route::get('/sport','CategoryController@getSportArticles')->name('sport');
Route::get('/article/{id}','CategoryController@getArticle')->name('article');
Route::get('/tag/{tag}','CategoryController@getArticlesByTag')->name('tag');
Route::post('/search','SearchController@index');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/comments','CommentsController@index')->name('comments');
//route for comment respond
Route::post('/respond','CommentsController@index')->name('respond');

//route for separate user's statistics
Route::get('/commentator/{commentator_id}','CommentatorController@index')->name('commentator');

//routes for moderator
Route::group(['middleware' => ['auth','moderator'], 'prefix' => 'moderator'], function () {
  Route::post('/checkout','ModerController@index')->name('checkout');
Route::get('/nonchecked','ModerController@showPolyticalComments')->name('nonChecked');
Route::post('/publish/{publish_id}','ModerController@publish')->name('publish');
Route::post('/notpublish/{notpublish_id}','ModerController@notpublish')->name('notpublish');
});

// routes for admin panel
Route::group(['middleware' => ['auth','admin'], 'prefix' => 'admin'], function () {
  Route::get('/','AdminController@index')->name('admin.index');

  Route::get('/category','AdminController@category')->name('admin.category');
   Route::get('/category/edit{id}','AdminController@categoryEdit')->name('category.edit');
   Route::put('/category/update{id}','AdminController@categoryUpdate')->name('category.update');
    Route::get('/category/create','AdminController@categoryCreate')->name('category.create');
     Route::post('/category/create','AdminController@categoryStore')->name('category.store');
   Route::delete('/category/destroy{id}','AdminController@categoryDestroy')->name('category.destroy');

  Route::get('/adv','AdminController@adv')->name('admin.adv');
   Route::get('/adv/edit{id}','AdminController@advEdit')->name('adv.edit');
   Route::put('/adv/update{id}','AdminController@advUpdate')->name('adv.update');
    Route::get('/adv/create','AdminController@advCreate')->name('adv.create');
     Route::post('/adv/create','AdminController@advStore')->name('adv.store');
   Route::delete('/adv/destroy{id}','AdminController@advDestroy')->name('adv.destroy');


  
});



