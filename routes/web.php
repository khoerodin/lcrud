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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('role:superadministrator|administrator')->group(function () {
    Route::get(
        '/permissions', 
        ['middleware' => ['permission:read-permission'],
        'uses' => 'PermissionController@index']
    )->name('permissions.index');

    Route::post(
        '/permissions', 
        ['middleware' => ['permission:create-permission'],
        'uses' => 'PermissionController@store']
    )->name('permissions.store');

    Route::get(
        '/permissions/create', 
        ['middleware' => ['permission:create-permission'],
        'uses' => 'PermissionController@create']
    )->name('permissions.create');

    Route::put(
        '/permissions/{role}', 
        ['middleware' => ['permission:update-permission'],
        'uses' => 'PermissionController@update']
    )->name('permissions.update');
    
    Route::get(
        '/permissions/{role}', 
        ['middleware' => ['permission:read-permission'],
        'uses' => 'PermissionController@show']
    )->name('permissions.show');
    // 
    Route::get(
        '/roles', 
        ['middleware' => ['permission:read-role'],
        'uses' => 'RoleController@index']
    )->name('roles.index');

    Route::post(
        '/roles', 
        ['middleware' => ['permission:create-role'],
        'uses' => 'RoleController@store']
    )->name('roles.store');

    Route::get(
        '/roles/create', 
        ['middleware' => ['permission:create-role'],
        'uses' => 'RoleController@create']
    )->name('roles.create');

    Route::put(
        '/roles/{role}', 
        ['middleware' => ['permission:update-role'],
        'uses' => 'RoleController@update']
    )->name('roles.update');
    
    Route::get(
        '/roles/{role}', 
        ['middleware' => ['permission:read-role'],
        'uses' => 'RoleController@show']
    )->name('roles.show');
    
    Route::resource('/users', 'UserController', ['except' => ['edit','destroy']]);
});

Route::middleware('role:superadministrator|administrator|user')->group(function () {
    Route::get(
        '/articles', 
        ['middleware' => ['permission:read-article'],
        'uses' => 'ArticleController@index']
    )->name('article');

    Route::get(
        '/articles/create', 
        ['middleware' => ['permission:create-article'],
        'uses' => 'ArticleController@create']
    )->name('article.create');

    Route::post(
        '/articles/store', 
        ['middleware' => ['permission:create-article'],
        'uses' => 'ArticleController@store']
    )->name('article.store');

    Route::get(
        '/articles/show/{id}', 
        ['middleware' => ['permission:read-article'],
        'uses' => 'ArticleController@show']
    )->name('article.show');
    
    Route::post(
        '/articles/show/{id}', 
        ['middleware' => ['permission:update-article'],
        'uses' => 'ArticleController@update']
    )->name('article.update');

    Route::get(
        '/articles/destroy/{id}', 
        ['middleware' => ['permission:delete-article'],
        'uses' => 'ArticleController@destroy']
    )->name('article.destroy');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/assets/img/{w}/{img?}', function($w, $img=null){
    
    if (!$img) {
        $img = 'default.jpg';
    }

    $image = public_path("/images/$img");

    return \Image::make($image)
        ->resize($w, null, function ($constraint) {
            $constraint->aspectRatio();
        })
        ->response('jpg');
});
