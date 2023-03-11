<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Str;
use File;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
        $usersArr = User::get();
        return view('admin.users.index', compact('usersArr'));
    }

    public function create()
    {
        $usersArr = User::where('status', '=', TRUE)->get();
        return view('admin.users.create', compact('usersArr'));
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
        $cate_create = new User;
        $cate_create->category_name = $request->category_name;
        $cate_create->slug = NULL;
        $cate_create->status = $request->status;
        $cate_create->save();

        return redirect()->route('admin.users.index')->with('success','User added successfully');
    }

    public function view($id)
    {
        $user_view = User::where('id',$id)->first();
        return view('admin.users.view',compact('user_view'));
    }

    public function edit($id)
    {
        $usersArr = User::where('id',$id)->first();
        return view('admin.users.edit',compact('usersArr'));
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
        $update = User::where('id',$request->id)->first();
        $update->category_name = $request->category_name;
        $update->slug = NULL;
        $update->status = $request->status;
        $update->save();

        return redirect()->route('admin.users.index')->with('success','User updated successfully');
    }
    
    public function delete(Request $request)
    {
        $id = $request->id;
        User::where('id',$id)->delete();
        return redirect()->route('admin.users.index')->with('success','User deleted successfully');
    }

    public function category_status_update(Request $request)
    {
        $status_update = User::where('id',$request->category_id)->first();
        $status_update->status = $request->status;
        $status_update->save();
        return redirect()->route('admin.users.index')->with('success','Status update successfully');
    }
}
?>