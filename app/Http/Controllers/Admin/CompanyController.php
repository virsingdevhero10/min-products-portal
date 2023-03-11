<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Str;
use File;
use Illuminate\Support\Facades\Auth;


class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        
        $companyArr = company::get();
        return view('admin.company.index', compact('companyArr'));
    }

    public function create()
    {
        return view('admin.company.create');
    }

    public function store(Request $request)
    {
        /*
        $validatedRequestData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies',
            'logo' => 'required',
            'website' => 'required',
            'status' => 'required',

        ], [
            'name.required' => 'Please enter the name',
            'email.required' => 'Please enter email address',
            'logo.required' => 'Please choose logo picture',
            'website.required' => 'Please enter website url',
            'status.required' => 'Please select status',
        ]);
        */
        $company_create = new Company;
        $company_create->name = $request->name;
        $company_create->email = $request->email;
        $company_create->website = $request->website;

        if ($request->hasFile('logo_picture')) 
        {
            $logo_picture = $request->file('logo_picture');
            $name = time().'.'.$logo_picture->getClientOriginalExtension();
            $destinationPath = public_path('/company_logo');

            if (!file_exists($destinationPath)) {
               File::makeDirectory($destinationPath, 0755, true, true);
            }
            $logo_picture->move($destinationPath, $name);
            $company_create->logo_picture = $name;
        }
        $company_create->status = $request->status;
        $company_create->save();

        return redirect()->route('admin.company.index')->with('success','Company added successfully');
    }

    public function view($id)
    {
        $company_view = Company::where('id',$id)->first();
        return view('admin.company.view',compact('company_view'));
    }

    public function edit($id)
    {
        $company_edit = Company::where('id',$id)->first();
        return view('admin.company.edit',compact('company_edit'));
    }

    public function update(Request $request)
    {
        /*
        $validatedRequestData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:companies',
            'logo' => 'required',
            'website' => 'required',
            'status' => 'required',

        ], [
            'name.required' => 'Please enter the name',
            'email.required' => 'Please enter email address',
            'logo.required' => 'Please choose logo picture',
            'website.required' => 'Please enter website url',
            'status.required' => 'Please select status',
        ]);
        */
        $company_update = Company::where('id',$request->id)->first();
        $company_update->name = $request->name;
        $company_update->email = $request->email;
        $company_update->website = $request->website;
        
        if ($request->hasFile('logo_picture')) 
        {
            $logo_picture = $request->file('logo_picture');
            $name = time().'.'.$logo_picture->getClientOriginalExtension();
            $destinationPath = public_path('/company_logo');

            if (!file_exists($destinationPath)) {
               File::makeDirectory($destinationPath, 0755, true, true);
            }
            $logo_picture->move($destinationPath, $name);
            $company_update->logo_picture = $name;
        }
        $company_update->status = $request->status;
        $company_update->save();

        return redirect()->route('admin.company.index')->with('success','Company updated successfully');
    }
    
    public function delete(Request $request)
    {
        $id = $request->id;
        Company::where('id',$id)->delete();
        return redirect()->route('admin.company.index')->with('success','Company deleted successfully');
    }

    public function company_status_update(Request $request)
    {
        $status_update = Company::where('id',$request->company_id)->first();
        $status_update->status = $request->status;
        $status_update->save();
        return redirect()->route('admin.company.index')->with('success','Status update successfully');
    }

}
