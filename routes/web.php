<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminLoginCon;
use App\Http\Controllers\adminCon;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/admin')->namespace('Admin')->group(function(){
    Route::get('login',[adminLoginCon::class,'index']);
    Route::post('login',[adminLoginCon::class,'login']);
    Route::group(['middleware'=>['admin']],function(){
        Route::get('/dashboard',[adminCon::class,'index']); 
        Route::get('/setting',[adminCon::class,'setting_index']); 
        Route::get('logout',[adminLoginCon::class,'logout']); 
       // Route::post('/check_current_password',[Admin::class,'checkCurrentPassword']); 
       Route::post('/updatePassword',[adminCon::class,'updateCurrentPassword']); 
    });
});
 
