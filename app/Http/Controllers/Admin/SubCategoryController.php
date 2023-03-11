<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
        $subCategoryArr = SubCategory::get();
        return view('admin.sub_category.index', compact('subCategoryArr'));
    }

    public function create()
    {
        $categoryArr = Category::where('status', '=', TRUE)->get();
        return view('admin.sub_category.create', compact('categoryArr'));
    }

    public function store(Request $request)
    {
        /*
        $validatedRequestData = $request->validate([
            'category_id' => 'required',
            'sub_cate_name' => 'required',
            'sub_cate_picture' => 'required',
            'status' => 'required',
        ], [
            'category_id.required' => 'Please select Catgory',
            'sub_cate_name.required' => 'Please enter the Sub Category Name',
            'sub_cate_picture.required' => 'Please choose Sub Category Image',
            'status.required' => 'Please select status',
        ]);
        */
        $sub_cate_create = new SubCategory;
        $sub_cate_create->category_id = $request->category_id;
        $sub_cate_create->sub_cate_name = $request->sub_cate_name;
        $sub_cate_create->slug = null;

        if ($request->hasFile('sub_cate_picture')) 
        {
            $sub_cate_picture = $request->file('sub_cate_picture');
            $name = time().'.'.$sub_cate_picture->getClientOriginalExtension();
            $destinationPath = public_path('/sub_categories_images');

            if (!file_exists($destinationPath)) {
               File::makeDirectory($destinationPath, 0755, true, true);
            }
            $sub_cate_picture->move($destinationPath, $name);
            $sub_cate_create->sub_cate_picture = $name;
        }
        $sub_cate_create->status = $request->status;
        $sub_cate_create->save();

        return redirect()->route('admin.sub_category.index')->with('success','Sub Category added successfully');
    }

    public function view($id)
    {
        $sub_category_view = SubCategory::where('id',$id)->first();
        return view('admin.sub_category.view',compact('sub_category_view'));
    }

    public function edit($id)
    {
        $categoryArr = Category::where('status', '=', TRUE)->get();
        $sub_category_edit = SubCategory::where('id',$id)->first();
        return view('admin.sub_category.edit',compact('sub_category_edit', 'categoryArr'));
    }

    public function update(Request $request)
    {
        /*
        $validatedRequestData = $request->validate([
            'category_id' => 'required',
            'sub_cate_name' => 'required',
            'sub_cate_picture' => 'required',
            'status' => 'required',
        ], [
            'category_id.required' => 'Please select Catgory',
            'sub_cate_name.required' => 'Please enter the Sub Category Name',
            'sub_cate_picture.required' => 'Please choose Sub Category Image',
            'status.required' => 'Please select status',
        ]);
        */
        $sub_cate_update = SubCategory::where('id',$request->id)->first();
        $sub_cate_update->category_id = $request->category_id;
        $sub_cate_update->sub_cate_name = $request->sub_cate_name;
        $sub_cate_update->slug = null;

        if ($request->hasFile('sub_cate_picture')) 
        {
            $sub_cate_picture = $request->file('sub_cate_picture');
            $name = time().'.'.$sub_cate_picture->getClientOriginalExtension();
            $destinationPath = public_path('/sub_categories_images');

            if (!file_exists($destinationPath)) {
               File::makeDirectory($destinationPath, 0755, true, true);
            }
            $sub_cate_picture->move($destinationPath, $name);
            $sub_cate_update->sub_cate_picture = $name;
        }
        $sub_cate_update->status = $request->status;
        $sub_cate_update->save();

        return redirect()->route('admin.sub_category.index')->with('success','Sub Category updated successfully');
    }
    
    public function delete(Request $request)
    {
        $id = $request->id;
        SubCategory::where('id',$id)->delete();
        return redirect()->route('admin.sub_category.index')->with('success','Sub Category deleted successfully');
    }

    public function sub_cate_states(Request $request)
    {
        $status_update = SubCategory::where('id',$request->sub_cate_id)->first();
        $status_update->status = $request->status;
        $status_update->save();
        return redirect()->route('admin.sub_category.index')->with('success','Status update successfully');
    }
}
