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

// Route::get('/', function () {
//     return view('home',HomeController@index);
// });
// Route::get('/',HomeController@index);

use Carbon\Carbon;

Route::get('/','HomeController@index');
Route::get('/invoice',function(){
    $pdf = PDF::loadView('invoice');
          return $pdf->stream('invoice.pdf');
});
Route::get('/country','MainController@index');
Route::get('/getStates/{id}','MainController@getStates');

Route::get('/time',function(){
    //For setting the current timezone to Asia Dhaka
    $dt=new Carbon;
    $current=Carbon::now()->timezone('Asia/Dhaka');
    echo $current;
    echo "<br>";
    //To now about yesterday,today and tomorrow dates
    echo $current->today();
    echo "<br>";
    echo $current->yesterday();
    echo "<br>";
    echo $current->tomorrow();
    echo "<br>";
    //To make it readable for humans
    echo $current->diffForHumans();
    echo "<br>";
    $newYear=new Carbon('First day of January');
    echo $newYear->diffForHumans();
    //control date
    echo "<br>";
    echo Carbon::createFromDate(2020,1,27,'Asia/Dhaka');
    echo "<br>";
    //if we want to write about year,days in month and second
 echo $dt->year;
 echo "<br>";
 $date = \Carbon\Carbon::now();
echo $date->format('F'); // July
echo "<br>";
echo $date->subMonth()->format('F'); // Ju
echo "<br>";
echo $dt->toDayDateTimeString();
echo "<br>";
echo $dt->toFormattedDateString();
//
echo "<br>";
//To know hour minutes and second
echo $dt->format('h:i:s A');
//To display previous month
echo Carbon::now()->subMonth()->diffForHumans();
//A month from now
echo "<br>";
echo $dt->toFormattedDateString();

});
Route::get('/imageupload','ImageUploadController@index');
Route::post('/imageupload/upload','ImageUploadController@uploadimage');
Route::get('/fileupload','FileUploadController@index');
Route::post('/fileupload/upload','FileUploadController@uploadfile');
 Route::get('/editimage/{id}','ImageUploadController@editimage');
 Route::put('/updateimage/{id}','ImageUploadController@updateimage');
