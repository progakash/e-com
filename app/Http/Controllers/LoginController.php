<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Auth; 

class LoginController extends Controller
{

    /**
     * function userLoginCustom
     * this function written as procedural way
     */
    public function userLoginCustom(Request $req)
    {
        //  dd( $req->input('username'));

        //validate
        $req->validate([
            'username' => ['required','email'],
            'userpass' => ['required','size:5']
        ]);

        //from user input
         $username = $req->input('username');
         $password = $req->input('userpass');

        //display query using toSql()
        // $data = Register::where('email','=', $username)
        //                     ->Where('password', $password)
        //                     ->toSql();

        //get data From register table
        $data = Register::where('email','=', $username)
                            ->Where('password', $password)
                            ->get();
        //result check
        if($data->isEmpty()){
            //if empty :: redirect with failed message
           return redirect(route('login'))->with('status', 'Login failed, please filled out properly');
        }
        
        //when succes run below code 
        $req->session()->put('user', $username);
        //echo $req->session()->get('user');exit; 
        
        return redirect(route('admin'));
    }

    /**
     * \\custom authentication for register table\\
     * usnig auth facades
     * Model: Register; extends hoyeche Authenticatable theke not model
     * and also core user ke Authenticatable banano hoyece.
     * auth:: defaults, guards and providers setting kora hoyeche by register table 
     * Table: registers
     * 
     * //authentication default for user table\\\\\
     * user table use korle kichu kora lagbe na just auth facades use korlei hobe.
     * 
     * //another way authentication for package \\\\ 
     * breeze
     */

    public function userLogin(Request $request)
    {
        // dd(print_r($request));
        $credential = $request->validate([
                'username' => ['required', 'email'],
                'userpass' => ['required']
        ]);

        // dd($request->username);

        //authentication using auth::attempt()
        if (Auth::attempt(['email'=>$request->username, 'password'=>$request->userpass]))
        {
            $request->session()->regenerate();

            $request->session()->put('user', $request->username);
            $request->session()->put('status_flag', 'session generate and you are loged in now');

            return redirect()->intended('admin');
            // return redirect(route('admin'));
        }
        
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');

    }

    public function userLogout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
       

        return redirect(route('login'));
    }
}
