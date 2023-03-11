<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('auth.admin_login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function admin_login(Request $request)
    {
        $email = $request->email;

        $password = $request->password;

        $user = User::where('email',$email)->first();
      
        if(!empty($user)){

            $check_password = Hash::check($password, $user->password);
            
            if($check_password){
                
                if($user->role == 1){

                    Auth::attempt(array('email' => $email, 'password' => $password));
                    return redirect()->route('admin.dashboard');

                }else {

                    return redirect()->back()->with('danger','Please enter valid credentials');
                }
            } else {

                return redirect()->back()->with('danger','Please enter valid credentials');
            }
        } else {

            return redirect()->back()->with('danger','Entered details not found');
        }
    }

}

?>