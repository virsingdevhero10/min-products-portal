<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
        $productArr = Product::with('category', 'subCate', 'product_images')->get()->toArray();
        return view('admin.product.index', compact('productArr'));
    }

    public function create()
    {
        $categoryArr = Category::where('status', '=', TRUE)->get();
        $subCateArr = SubCategory::where('status', '=', TRUE)->get();
        $productArr = Product::where('status', '=', TRUE)->get();
        return view('admin.product.create', compact('productArr','categoryArr', 'subCateArr'));
    }

    public function store(Request $request)
    {
        /*
        $validatedRequestData = $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'status' => 'required',
        ], [
            'product_name.required' => 'Please enter the Product Name',
            'category_id.required' => 'Please select status',
            'sub_category_id.required' => 'Please select status',
            'price.required' => 'Please enter Price',
            'description.required' => 'Please write the Description Of Product',
            'image.required' => 'Please choose Product Image',
            'status.required' => 'Please select status',
        ]);
        */

        $product_create = new Product;
        $product_create->product_name = $request->product_name;
        $product_create->category_id = $request->category_id;
        $product_create->sub_category_id = $request->sub_category_id;
        $product_create->price = $request->price;
        $product_create->description = $request->description;

        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/product_images');
            
            if (!file_exists($destinationPath)) {
               File::makeDirectory($destinationPath, 0755, true, true);
            }
            $image->move($destinationPath, $name);
            $product_create->image = $name;
        }
        $product_create->status = $request->status;
        $product_create->save();


        if($request->hasfile('imageFile')) {
            foreach($request->file('imageFile') as $file)
            {
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/product_images/', $name);  
                $imgData[] = $name;  
            }

            foreach($imgData as $k)
            {
                $images_insert = new ProductImage();
                $images_insert->product_id = $product_create->id;
                $images_insert->name = $k;
                $images_insert->image_path =$k;
                $images_insert->save();
            }
        }
        return redirect()->route('admin.product.index')->with('success','Product added successfully');
    }

    public function view($id)
    {
        $product_view = Product::where('id',$id)->first();
        return view('admin.product.view',compact('product_view'));
    }

    public function edit($id)
    {

        $categoryArr = Category::where('status', '=', TRUE)->get();
        $subCategoryArr = SubCategory::where('status', '=', TRUE)->get();
        $productArr = Product::where('id',$id)->first();

        $imges = ProductImage::where('product_id',$id)->get();

        return view('admin.product.edit', compact('productArr','categoryArr', 'subCategoryArr', 'imges'));
    }

    public function update(Request $request)
    {
        /*
        $validatedRequestData = $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'status' => 'required',
        ], [
            'product_name.required' => 'Please enter the Product Name',
            'category_id.required' => 'Please select status',
            'sub_category_id.required' => 'Please select status',
            'price.required' => 'Please enter Price',
            'description.required' => 'Please write the Description Of Product',
            'image.required' => 'Please choose Product Image',
            'status.required' => 'Please select status',
        ]);
        */

        $product_update = Product::where('id',$request->id)->first();
        $product_update->product_name = $request->product_name;
        $product_update->category_id = $request->category_id;
        $product_update->sub_category_id = $request->sub_category_id;
        $product_update->price = $request->price;
        $product_update->description = $request->description;
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/product_images');

            if (!file_exists($destinationPath)) {
               File::makeDirectory($destinationPath, 0755, true, true);
            }
            $image->move($destinationPath, $name);
            $company_update->image = $name;
        }
        $product_update->status = $request->status;
        $product_update->save();

        return redirect()->route('admin.product.index')->with('success','Product updated successfully');
    }
    
    public function delete(Request $request)
    {
        $id = $request->id;
        Product::where('id',$id)->delete();
        return redirect()->route('admin.product.index')->with('success','Product deleted successfully');
    }

    public function product_status_update(Request $request)
    {
        $status_update = Product::where('id',$request->product_id)->first();
        $status_update->status = $request->status;
        $status_update->save();
        return redirect()->route('admin.product.index')->with('success','Status update successfully');
    }
    
    public function get_sub_category(Request $reques){
        
        $subCategory = SubCategory::where("category_id",$reques->category_id)->pluck("sub_cate_name","id");   
        return $subCategory;

    }
}



