<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\AuthController;
/*
|--------------------------------------------------------------------------
| Backed Routes
|--------------------------------------------------------------------------
*/
Route::get('aktif-degil',function(){
    return view('front.offline');
});


Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function(){
    Route::get('giris','App\Http\Controllers\Back\AuthController@login')->name('login');
    Route::post('giris','App\Http\Controllers\Back\AuthController@loginPost')->name('login.post');
});
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function(){
    Route::get('panel','App\Http\Controllers\Back\Dashboard@index')->name('dashboard');
    // Makale Route's
    Route::get('makaleler/silinenler','App\Http\Controllers\Back\ArticleController@trashed')->name('trashed.article');
    Route::resource('makaleler','App\Http\Controllers\Back\ArticleController');  
    Route::get('/switch','App\Http\Controllers\Back\ArticleController@switch')->name('switch');
    Route::get('/deletearticle/{id}','App\Http\Controllers\Back\ArticleController@delete')->name('delete.article');
    Route::get('/harddeletearticle/{id}','App\Http\Controllers\Back\ArticleController@hardDelete')->name('hard.delete.article');
    Route::get('/recoverarticle/{id}','App\Http\Controllers\Back\ArticleController@recover')->name('recover.article');
    //Category Route's
    Route::get('/kategoriler','App\Http\Controllers\Back\CategoryController@index')->name('category.index');
    Route::post('/kategoriler/create','App\Http\Controllers\Back\CategoryController@create')->name('category.create');
    Route::post('/kategoriler/update','App\Http\Controllers\Back\CategoryController@update')->name('category.update');
    Route::post('/kategoriler/delete','App\Http\Controllers\Back\CategoryController@delete')->name('category.delete');
    Route::get('/kategori/status','App\Http\Controllers\Back\CategoryController@switch')->name('category.switch');
    Route::get('/kategori/getData','App\Http\Controllers\Back\CategoryController@getData')->name('category.getData');
    //Page's Route
    Route::get('/sayfalar','App\Http\Controllers\Back\PageController@index')->name('page.index');
    Route::get('/sayfalar/olustur','App\Http\Controllers\Back\PageController@create')->name('page.create');
    Route::get('/sayfalar/guncelle/{id}','App\Http\Controllers\Back\PageController@update')->name('page.edit');
    Route::post('/sayfalar/guncelle/{id}','App\Http\Controllers\Back\PageController@updatePost')->name('page.edit.post');
    Route::post('/sayfalar/olustur','App\Http\Controllers\Back\PageController@post')->name('page.create.post');
    Route::get('/sayfa/switch','App\Http\Controllers\Back\PageController@switch')->name('page.switch');
    Route::get('/sayfa/sil/{id}','App\Http\Controllers\Back\PageController@delete')->name('page.delete');
    Route::get('/sayfa/siralama','App\Http\Controllers\Back\PageController@orders')->name('page.orders');
    // Config's route
    Route::get('/ayarlar','App\Http\Controllers\Back\ConfigController@index')->name('config.index');
    Route::post('/ayarlar/update','App\Http\Controllers\Back\ConfigController@update')->name('config.update');
    //
    Route::get('cikis','App\Http\Controllers\Back\AuthController@logout')->name('logout');    
});


/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/
Route::get('/','App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('sayfa','App\Http\Controllers\Front\Homepage@index');
Route::get('/iletişim','App\Http\Controllers\Front\Homepage@contact')->name('contact');
Route::post('/iletişim','App\Http\Controllers\Front\Homepage@contactpost')->name('contact.post');
Route::get('/kategori/{category}','App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('/blog/{slug}','App\Http\Controllers\Front\Homepage@single')->name('single');
Route::get('/{sayfa}','App\Http\Controllers\Front\Homepage@page')->name('page');
