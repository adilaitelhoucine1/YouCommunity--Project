<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    $title="Adil";
    return view('test.test',["title"=> $title]);
});
