<?php

namespace App\Http\Controllers\front;
use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Product;

class frontProductCon extends Controller
{
    public function pageListing(Request $request){
        Paginator::useBootstrap();
        if($request->ajax()){
            $data = $request->all();
            $url = $data['url'];
           
           //echo"<pre>";print_r($data);die;
           $productListing = category::where('url',$url)->count();
            if($productListing>0){
                $categoryDetails =  category::categoryDetails($url);
                $cateProduct = Product::with('Brand')->whereIn('category_id',$categoryDetails['catIds']);
                //echo "<pre>";print_r($cateProduct);die();

                //fabric sort option
                if(isset($data['fabric']) && !empty($data['fabric'])){
                    $cateProduct->whereIn('products.fabric',$data['fabric']);
                }

                //sleeve sort option
                if(isset($data['sleeve']) && !empty($data['sleeve'])){
                    $cateProduct->whereIn('products.sleeve',$data['sleeve']);
                }

                //pattern sort option
                if(isset($data['pattern']) && !empty($data['pattern'])){
                    $cateProduct->whereIn('products.pattern',$data['pattern']);
                }

                //fit sort option
                if(isset($data['fit']) && !empty($data['fit'])){
                    $cateProduct->whereIn('products.fit',$data['fit']);
                }

                //occassion sort option
                if(isset($data['occassion']) && !empty($data['occassion'])){
                    $cateProduct->whereIn('products.occassion',$data['occassion']);
                }
                //Sort option
                if(isset($data['sort']) && !empty($data['sort'])){
                    if($data['sort'] == 'product_latest'){
                        $cateProduct->orderBy('id','Desc');
                    }
                    if($data['sort'] == 'product_a_z'){
                        $cateProduct->orderBy('product_name','Asc');
                    }
                    if($data['sort'] == 'product_z_a'){
                        $cateProduct->orderBy('product_name','Desc');
                    }
                    if($data['sort'] == 'product_price_highest_lowest'){
                        $cateProduct->orderBy('product_price','Desc');
                    }
                    if($data['sort'] == 'product_price_lowest_highest'){
                        $cateProduct->orderBy('product_price','Asc');
                    }
                }else{
                    $cateProduct->orderBy('id','Desc');
                }
                $cateProduct = $cateProduct->Paginate(3);
                return view('font_end.product_listing',compact('cateProduct','categoryDetails','url'));
            
            }else{
            abort(404);
            }
        }else{
            $url = Route::getFacadeRoot()->current()->uri();
            $productListing = category::where('url',$url)->count();
            if($productListing>0){
                $categoryDetails =  category::categoryDetails($url);
                $cateProduct = Product::with('Brand')->whereIn('category_id',$categoryDetails['catIds']);
                //echo "<pre>";print_r($cateProduct);die();
                $cateProduct = $cateProduct->Paginate(3);
                //product filters
                $productFilters = Product::productFilters();
                //echo "<pre>";print_r($productFilters);die;
                $fabricArray =   $productFilters['fabricArray'];
                $sleeverArray =  $productFilters['sleeverArray'];
                $patternArray =   $productFilters['patternArray'];
                $fitArray =   $productFilters['fitArray'];
                $occassionArray =   $productFilters['occassionArray'];
                $page_name = 'products';
                return view('font_end.products',compact('cateProduct','categoryDetails','url','fabricArray','sleeverArray','patternArray','fitArray','occassionArray','page_name'));
            
            }else{
            abort(404);
            }
        }
    }
}
