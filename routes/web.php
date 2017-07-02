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


Route::get('/', 'siteController@homePage');


Route::group (['prefix'=>'admin'], function (){


    Route::get('/', 'homeController@show');


//Articles

    Route:: get('/newarticle', ['uses' => 'ArticleController@newArticle', 'as' => 'newarticle']);
    Route::post('/newarticle', ['uses' => 'ArticleController@saveArticle', 'as' => 'savearticle']);


    Route::get('/listarticles', ['uses' => 'ArticleController@listArticles', 'as' => 'listarticles']);


    Route::get('/editarticles/{id?}', ['uses' => 'ArticleController@editArticles', 'as' => 'editarticles']);
    Route::post('/editarticles/{id?}', ['uses' => 'ArticleController@saveEditArticle', 'as' => 'saveeditarticle']);

    Route::get('/delarticle/{id?}', ['uses' => 'ArticleController@deleteArticle', 'as' => 'delarticle']);



//Comments

    Route::get('/editcomentforarticles/{id?}', ['uses' => 'ArticleController@newComment', 'as' => 'newcomment']);
    Route::post('/editcomentforarticles/{id?}', ['uses' => 'ArticleController@saveComment', 'as' => 'savecomment']);

    Route::get('/delcoment/{id?}', ['uses' => 'ArticleController@deleteComment', 'as' => 'deletecomment']);





//Tags

    Route::get('/newtags', ['uses' => 'ArticleController@newTags', 'as' => 'newtags']);
    Route::post('/newtags', ['uses' => 'ArticleController@saveTags', 'as' => 'savetags']);


    Route::get('/edittags/{id?}', ['uses' => 'ArticleController@editTag', 'as' => 'edittags']);
    Route::post('/edittags/{id?}', ['uses' => 'ArticleController@saveEditTag', 'as' => 'saveedittag']);

    Route::get('/deltag/{id?}', ['uses' => 'ArticleController@deleteTag', 'as' => 'deltag']);



//Categories

    Route::get('/newcategories/{id?}', ['uses' => 'ArticleController@newCategories', 'as' => 'newcategories']);
    Route::post('/newcategories/{id?}', ['uses' => 'ArticleController@saveCategories', 'as' => 'savecategories']);

    Route::get('/delcategories/{id?}', ['uses' => 'ArticleController@deleteCategories', 'as' => 'delcategories']);


});