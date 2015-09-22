<?php

namespace milimetrica\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use milimetrica\Category;
use milimetrica\Http\Requests;
use milimetrica\Http\Controllers\Controller;
use milimetrica\Product;
use milimetrica\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ProductsController extends Controller{
    private $productModel;
    private $category;


    public function __construct(Product $productModel){


        $this->productModel = $productModel;
    }

    public function index(){

        $products = $this->productModel->orderBy('id','desc')->paginate(30);

        return view('products.index',compact('products'));

    }



    public function create(Category $category){

        $categories = $category->lists('name','id');
        return view('products.create',compact('categories'));

    }

    public function edit($id, Category $category){
        $categories = $category->lists('name','id');
        $product = $this->productModel->find($id);
        return view('products.edit',compact('product','categories'));

    }

    public function update(Requests\ProductRequest $request, $id){
        $this->productModel->find($id)->update($request->all());
        return redirect()->route('products');

    }

    public function store(Requests\ProductRequest $request){

        $product = $this->productModel->fill($request->all());
        $product->save();
        return redirect()->route('products');

    }

    public function destroy($id){
        $product = $this->productModel->find($id);
        if($product)
        {
            if($product->images)
            {
                foreach($product->images as $image){
                    if(file_exists(base_path().'/public_html/uploads'.$image->id.'.'.$image->extension))
                    {
                        Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
                    }
                    $image->delete();
                }
            }
            $product->delete();
            return redirect()->route('products')->with('product_destroy', 'Product Deletado!');
        }
        return redirect()->route('products')->with('product_exist', 'Produto não existe!');

    }

    public function images($id){
        $product = $this->productModel->find($id);
        return view('products.images',compact('product'));

    }

    public function createImage($id){
        $product = $this->productModel->find($id);
        return view('products.create_image',compact('product'));

    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage){

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $image = $productImage::create(['product_id'=>$id,'extension' =>$extension]);
        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));
        return redirect()->route('products.images',['id'=>$id]);
    }

    public function destroyImage(ProductImage $productImage, $id){
        $image = $productImage->find($id);
        if(file_exists(public_path().'/uploads'.$image->id.'.'.$image->extension)){
            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);

        }

        $product = $image->product;
        $image->delete();
        return redirect()->route('products.images',['id'=>$product->id]);
    }



}
