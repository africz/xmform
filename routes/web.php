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
use Illuminate\Http\Request;

Route::get('/', function () {
    //$xmform_data = \App\XmForm::all();
    //return view('xmform', ['xmform' => $xmform_data]);
    return view('xmform');
});

Route::post('/submit', ['as' => 'submit', 'uses' =>
    'XmFormController@store']);


// Route::post('/submit', function (Request $request) {
//     $data = $request->validate([
//         'company_symbol' => 'required|max:255',
//         'start_date' => 'required|date|max:255',
//         'end_date' => 'required|date|max:255',
//         'email' => 'required|date|max:255',
//     ]);

    //$link = tap(new App\Link($data))->save();

    //return redirect('/');
//});

