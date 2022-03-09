<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\section;
use App\Models\category;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Models\Brand;
class productCon extends Controller
{
    public function showProductPage(){
        $data = Product::all();
        return view('admin.product.product',compact('data'));
    }

    public function deleteProduct($product){
        Product::find($product)->delete();
        return back()->with('success','Category Deleted Successfully');
    }

    public function showAddProductPage(){
        //product filters
        $productFilters = Product::productFilters();
        //echo "<pre>";print_r($productFilters);die;
        $fabricArray =   $productFilters['fabricArray'];
        $sleeverArray =  $productFilters['sleeverArray'];
        $patternArray =   $productFilters['patternArray'];
        $fitArray =   $productFilters['fitArray'];
        $occassionArray =   $productFilters['occassionArray'];

        //relation between section,categories and product
        $categories = section::with('categories')->get();
        $brand = Brand::all();
        // $cata = json_decode(json_encode($cata),true);
        // echo "<pre>";print_r($cata);die;

        return view('admin.product.addproduct',compact('fabricArray','sleeverArray','patternArray','fitArray','occassionArray','categories','brand'));
    }

    public function SaveAddProductsForm(Request $req){
        $req->validate([
            'category_id'=>'required',
            'brand_id'=>'required',
            'product_name'=>'required',
            'product_code'=>'required',
            'product_color'=>'required',
            'product_price'=>'required',
            'description'=>'required',
            'main_image'=>'required',
        ]);

        $cateDetails = category::find($req->category_id);
        $imagePath = request('main_image')->store('product_image','public');
        if(request('product_video')){
            $videoPath = request('product_video')->store('product_video','public');
            $videoArray = ['product_video'=>$videoPath];
        }
        if(empty($req['is_featured'])){
            $is_featured = "NO";
        }else{
            $is_featured = "YES";
        }
        Product::create([
            'category_id'=>$req->category_id,
            'brand_id'=>$req->brand_id,
            'section_id'=>$cateDetails['section_id'],
            'product_name'=>$req->product_name,
            'product_code'=>$req->product_code,
            'product_color'=>$req->product_color,
            'product_price'=>$req->product_price,
            'product_discount'=>$req->product_discount,
            'product_weight'=>$req->product_weight,
            //'product_video'=>$req->product_video,
            'main_image'=>$imagePath,
            'description'=>$req->description,
            'fabric'=>$req->fabric,
            'pattern'=>$req->pattern,
            'sleeve'=>$req->sleeve,
            'fit'=>$req->fit,
            'occassion'=>$req->occassion,
            'meta_title'=>$req->meta_title,
            'meta_description'=>$req->meta_description,
            'meta_keywords'=>$req->meta_keywords,
            'is_featured'=>$is_featured,
            'status'=>$req->status,

        ],array_merge($videoArray??[]));
        return redirect('admin/products');
            
    }

    public function showEditProductPage($product){
        $productFilters = Product::productFilters();
        //echo "<pre>";print_r($productFilters);die;
        $fabricArray =   $productFilters['fabricArray'];
        $sleeverArray =  $productFilters['sleeverArray'];
        $patternArray =   $productFilters['patternArray'];
        $fitArray =   $productFilters['fitArray'];
        $occassionArray =   $productFilters['occassionArray'];

        $categories = section::with('categories')->get();

        $data = Product::find($product);
        $brand = Brand::all();
        return view('admin.product.editproduct',compact('data','fabricArray','sleeverArray','patternArray','fitArray','occassionArray','categories','brand'));
    }

    public function saveEditProductPage(Request $req,Product $product){
        $data = $req->validate([
            'category_id'=>'required',
            'product_name'=>'required',
            'brand_id'=>'required',
            'product_code'=>'required',
            'product_color'=>'required',
            'product_price'=>'required',
            'product_discount'=>'',
            'product_weight'=>'',
            'description'=>'required',
            'main_image'=>'',
            'product_video'=>'',
            'fabric'=>'',
            'pattern'=>'',
            'sleeve'=>'',
            'fit'=>'',           
            'occassion'=>'',
            'meta_title'=>'',
            'meta_description'=>'',
            'meta_keywords'=>'',
            'is_featured'=>'',
            'status'=>'',
        ]);
        
        if(request('main_image')){
            $imagePath = request('main_image')->store('product_image','public');
            $imageArray = ['main_image'=>$imagePath];
        }
       
        if(request('product_video')){
            $videoPath = request('product_video')->store('product_video','public');
            $videoArray = ['product_video'=>$videoPath];
        }
        if(empty($req['is_featured'])){
            $is_featured = "NO";
        }else{
            $is_featured = "YES";
        }
        $cateDetails = category::find($req->category_id);
        $section_id = ['section_id'=>$cateDetails['section_id']];
        Product::where(['id'=>$product['id']])->update(array_merge(
            $data,
            $section_id,
            $videoArray??[],
            $imageArray??[],
        ));
        return redirect('admin/products');

    }

    public function showAddProductAttributesPage($product){
        $data = Product::with('ProductAttribute')->find($product);
        return view('admin.product.addProductAttribute',compact('data'));
    }

    public function saveProductAttributes(Request $req,$product){
        $data = $req->all();
        foreach ($data['sku'] as $key => $value) {
            $sameAttributeSize = ProductAttribute::where(['product_id'=>$product,'size'=>$data['size'][$key]])->count();
            if($sameAttributeSize>0){
                $message = 'This size for the product has already exsist.You can not add the size';
                return back()->with('error',$message);
            }
            if(!empty($value)){
                ProductAttribute::create([
                    'product_id'=>$product,
                    'size'=>$data['size'][$key],
                    'price'=>$data['price'][$key],
                    'sku'=>$data['sku'][$key],
                    'stock'=>$data['stock'][$key],
                    'status'=>$data['status'][$key],
                ]);
               
            }
        }
    return back();
    }

    public function deleteProductAttribute($product){
        ProductAttribute::find($product)->delete();
         return back()->with('success','Category Deleted Successfully');
    }

    public function showAddProductImagesPage($product){
        $data = Product::with('ProductImage')->find($product);
        // $projson = json_decode(json_encode($productData),true);
        // echo "<pre>";print_r($projson);die;
        return view('admin.product.addProductImages',compact('data'));
    }

    public function saveProductImages(Request $req,$product){
        $images = $req->file('image');
        foreach ($images as $key => $image) {
            $mainImage = $image->store('product_image','public');
            ProductImage::create([
                'product_id'=>$product,
                'image'=>$mainImage,
            ]);
        }
        return back();
    }

    public function deleteProductImage($product){
        ProductImage::find($product)->delete();
         return back()->with('success','Category Deleted Successfully');
    }

}
