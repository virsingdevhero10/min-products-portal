<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function submit(Request $request)
    {
        
        $email = $request->email;

        $password = $request->password;

        $user = User::where('email',$email)->first();
      
        if(!empty($user)){

            $check_password = Hash::check($password, $user->password);
            
            if($check_password){
                if($user->role == 2){
                    
                    Auth::attempt(array('email' => $email, 'password' => $password));
                    return redirect()->route('frontend.home.index');

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
