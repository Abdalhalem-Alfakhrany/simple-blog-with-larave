<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'categoriesController@index')->name('index');
Route::get('category/{id}', 'categoriesController@show')->name('category');

Route::get('posts/{id}', 'postsController@index')->name('post');
Route::get('createpost', 'postsController@create')->name('createnewpost');
Route::post('storepost', 'postsController@store')->name('storepost');

Route::get('setlocal/{local}', function ($local) {
    $url = str_replace(url('/'), '', url()->previous());
    $langs = ['ar', 'en'];
    foreach ($langs as $lang) {
        $url = str_replace('/' . $lang, '', $url);
    }
    // return redirect($lang . $url);
    return redirect($local . $url);
})->name('local');
