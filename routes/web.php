<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminLoginCon;
use App\Http\Controllers\admin\adminCon;
use App\Http\Controllers\admin\sectionCon;
use App\Http\Controllers\admin\categoryCon;
use App\Http\Controllers\admin\productCon;
use App\Http\Controllers\admin\brandCon;
use App\Http\Controllers\front\indexCon;
use App\Http\Controllers\front\frontProductCon;
use App\Http\Controllers\front\productDetailsCon;
use App\Models\category;


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
//     return view('welcome');
// });

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
       Route::get('/editcategories/{category}',[categoryCon::class,'showEditCategoriesPage']);  
       Route::patch('/saveeditcategories/{category}',[categoryCon::class,'saveEditCategoriesPage']); 
       Route::get('/deletecategories/{category}',[categoryCon::class,'deleteCategory']);   
       //Products
       Route::get('/products',[productCon::class,'showProductPage']);
       Route::get('/addproducts',[productCon::class,'showAddProductPage']);
       Route::post('/SaveAddProducts',[productCon::class,'SaveAddProductsForm']);
       Route::get('/editproduct/{product}',[productCon::class,'showEditProductPage']);
       Route::post('/saveeditproduct/{product}',[productCon::class,'saveEditProductPage']);
       Route::get('/deleteproduct/{product}',[productCon::class,'deleteProduct']);   
       Route::get('/addProductAttributes/{product}',[productCon::class,'showAddProductAttributesPage']);  
       Route::post('/saveProductAttributes/{product}',[productCon::class,'saveProductAttributes']); 
       Route::get('addProductAttributes/deleteproductAttributes/{product}',[productCon::class,'deleteProductAttribute']); 
       Route::get('/addProductimages/{product}',[productCon::class,'showAddProductImagesPage']);    
       Route::post('/saveProductimages/{product}',[productCon::class,'saveProductImages']);      
       Route::get('addProductimages/deleteproductImages/{product}',[productCon::class,'deleteProductImage']); 
       
       //Brand Part
       Route::get('/showbrand',[brandCon::class,'showBrandPage']);
       Route::get('/addbrand',[brandCon::class,'showAddBrandPage']);
       Route::post('/saveaBrand',[brandCon::class,'saveBrand']);
    });
});
//FRONT END ROUTE
Route::get('/',[indexCon::class,'index']);
Route::get('/product_details',[indexCon::class,'showProductDetails']);
Route::get('/compair',[indexCon::class,'showCompairPage']);


Route::get('product_details/{id}',[productDetailsCon::class,'index']);
Route::get('/ajaxProductDetails',[productDetailsCon::class,'ajaxProduct']);

$catUrls = category::select('url')->get()->pluck('url')->toArray();
foreach($catUrls as $url){
    Route::get('/'.$url,[frontProductCon::class,'pageListing']);
};

// CART ROUTE
Route::post('add-to-cart',[frontProductCon::class,'addcart']);
Route::get('/cart',[frontProductCon::class,'showCartPage']);

 
