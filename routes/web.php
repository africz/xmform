<?php

use Illuminate\Support\Facades\Route;

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
    //$xmform_data = \App\XmForm::all();
    //return view('xmform', ['xmform' => $xmform_data]);
    return view('xmform');
});

Route::get('/submit', function () {
    return view('submit');
});