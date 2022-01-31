<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminLoginCon;
use App\Http\Controllers\admin\adminCon;
use App\Http\Controllers\admin\sectionCon;
use App\Http\Controllers\admin\categoryCon;

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
Route::prefix('/admin')->group(function(){
    Route::get('login',[adminLoginCon::class,'index']);
    Route::post('login',[adminLoginCon::class,'login']);

    Route::group(['middleware'=>['admin']],function(){
        Route::get('/dashboard',[adminCon::class,'index']); 
        Route::get('/setting',[adminCon::class,'setting_index']); 
        Route::get('logout',[adminLoginCon::class,'logout']); 
       //Route::post('/check-current-password',[adminCon::class,'checkCurrentPassword']); //ajac check password
       Route::post('/updatePassword',[adminCon::class,'updateCurrentPassword']); 
       Route::get('/details',[adminCon::class,'showAdminDetailsPage']); 
       Route::post('/updateAdminDetails',[adminCon::class,'updateAdminDetailsPage']); 

       //SECTION
       Route::get('/section',[sectionCon::class,'showSectionPage']); 
       Route::post('/update_section_status',[sectionCon::class,'updateSectionStatus']); 
       //CATEGORIES
       Route::get('/categories',[categoryCon::class,'showCategoriesPage']); 
       Route::get('/addcategories',[categoryCon::class,'showAddCategoriesPage']); 
       Route::post('/saveAddCategory',[categoryCon::class,'saveAddCategory']);
       Route::post('/append-categories-level',[categoryCon::class,'appendCategoriesLevel']);  
       
       
    });
});
 
