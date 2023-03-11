<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
        $categoryArr = Category::get();
        return view('admin.category.index', compact('categoryArr'));
    }

    public function create()
    {
        $categoryArr = Category::where('status', '=', TRUE)->get();
        return view('admin.category.create', compact('categoryArr'));
    }

    public function store(Request $request)
    {
        /*
        $validatedRequestData = $request->validate([
            'category_name' => 'required',
            'slug' => 'required',
            'cate_picture' => 'required',
            'status' => 'required',
        ], [
            'category_id.required' => 'Please select Catgory',
            'category_name.required' => 'Please enter the  Category Name',
            'slug.required' => 'Please enter Slug',
            'cate_picture.required' => 'Please choose Category Image',
            'status.required' => 'Please select status',
        ]);
        */        
        $cate_create = new Category;
        $cate_create->category_name = $request->category_name;
        $cate_create->slug = NULL;

        if ($request->hasFile('cate_picture')) 
        {
            $cate_picture = $request->file('cate_picture');
            $name = time().'.'.$cate_picture->getClientOriginalExtension();
            $destinationPath = public_path('/categories_images');

            if (!file_exists($destinationPath)) {
               File::makeDirectory($destinationPath, 0755, true, true);
            }
            $cate_picture->move($destinationPath, $name);
            $cate_create->cate_picture = $name;
        }
        $cate_create->status = $request->status;
        $cate_create->save();

        return redirect()->route('admin.category.index')->with('success','Category added successfully');
    }

    public function view($id)
    {
        $sub_category_view = Category::where('id',$id)->first();
        return view('admin.category.view',compact('sub_category_view'));
    }

    public function edit($id)
    {
        $categoryArr = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('categoryArr'));
    }

    public function update(Request $request)
    {
        /*
        $validatedRequestData = $request->validate([
            'category_name' => 'required',
            'slug' => 'required',
            'cate_picture' => 'required',
            'status' => 'required',
        ], [
            'category_id.required' => 'Please select Catgory',
            'category_name.required' => 'Please enter the  Category Name',
            'slug.required' => 'Please enter Slug',
            'cate_picture.required' => 'Please choose Category Image',
            'status.required' => 'Please select status',
        ]);
        */
        $update = Category::where('id',$request->id)->first();
        $update->category_name = $request->category_name;
        $update->slug = NULL;
        if ($request->hasFile('cate_picture')) 
        {
            $image = $request->file('cate_picture');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/categories_images');

            if (!file_exists($destinationPath)) {
               File::makeDirectory($destinationPath, 0755, true, true);
            }
            $image->move($destinationPath, $name);
            $update->cate_picture = $name;
        }

        $update->status = $request->status;
        $update->save();

        return redirect()->route('admin.category.index')->with('success','Category updated successfully');
    }
    
    public function delete(Request $request)
    {
        $id = $request->id;
        Category::where('id',$id)->delete();
        return redirect()->route('admin.category.index')->with('success','Category deleted successfully');
    }

    public function category_status_update(Request $request)
    {
        $status_update = Category::where('id',$request->category_id)->first();
        $status_update->status = $request->status;
        $status_update->save();
        return redirect()->route('admin.category.index')->with('success','Status update successfully');
    }
}
