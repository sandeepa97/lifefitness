<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
 
class LoginController extends Controller
{
 
    public function index()
    {
        return view('home.index');
    }  
 
     
    public function postLogin(Request $request)
    {
        request()->validate([
        'email' => 'required',
        'password' => 'required',
        ]);
 
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('admin-dashboard');
        }
        
        return Redirect::to("login")->withSuccess('Invalid Email or Password');
        // echo '<script type="text/javascript">';
        // echo ' alert("Invalid Email or Password")';
        // echo '</script>';
    }
 
     
    public function dashboard()
    {
 
      if(Auth::check()){
        return view('admin.dashboard.index');
      }
       return Redirect::to("login")->withSuccess('Please Login first');
    }
 
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');

        
    }
}