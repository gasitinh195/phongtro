<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Cate;
use Input,File;
use App\ProductImage;
use Auth;

class ProductController extends Controller {

    public function getAdd(){
        $cate=cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.product.add',compact('cate'));
    }
    public function postAdd(ProductRequest $proRequest){

        $file_name = $proRequest->file('fImages')->getClientOriginalName();
        $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0, 10);
        $newname = $randomString . '.' . pathinfo($file_name, PATHINFO_EXTENSION);

        $product = new Product();
        $product->name =  $proRequest->txtName;
        $product->alias =  vn_str_filter($proRequest->txtName);
        $product->price =  $proRequest->txtPrice;
        $product->intro =  $proRequest->txtIntro;
        $product->content =  $proRequest->txtContent;
        $product->image =  $newname;
        $product->description =  $proRequest->txtDescription;
        $product->user_id =  Auth::user()->id;
        $product->cate_id =  $proRequest->slcparent;
        $proRequest->file('fImages')->move('resources/upload/',$newname);
        $product->save();

        $product_id = $product->id;
        if (Input::hasFile('fImagesDetail')) {
            foreach (Input::file('fImagesDetail') as $file) {
                $proImg = new ProductImage();
                $proImg->image = $file ->getClientOriginalName();
                $proImg->product_id = $product_id;
                $file->move('resources/upload/detail/',$file ->getClientOriginalName());
                $proImg->save();
            }
        }

        return redirect()->route('admin.product.getList')->with(['flash_level'=>'success','flash_messages'=>'Add product successfull']);

    }
    public function getList(){
        $pro= Product::select('id','name','price','intro','content','description','cate_id')->get()->toArray();
        return view('admin.product.list',compact('pro'));
    }

    public function getDelete($id){
        
        $product_detail = Product::find($id)->proimage->toArray();
        foreach ($product_detail as $value) {
            File::delete('resources/upload/detail/'.$value['image']);
        }

        $product = Product::find($id);
        File::Delete('resources/upload/'.$product->image);
        $product->delete($id);

        return redirect()->route('admin.product.getList')->with(['flash_level'=>'success','flash_messages'=>'Delete product successfull']);
    }

    public function getEdit($id){
        $data = Product::findorFail($id);
        $parent=Cate::select('id','name','parent_id')->get()->toArray();
        return view('admin.product.edit',compact('parent','data','id'));
    }
    public function postEdit($id){
        $product = Product::find($id);
    }
}
