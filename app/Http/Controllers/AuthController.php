<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{User};

class AuthController extends Controller
{
    function __construct()
	{
		
	}

    /**
     * Handling User Login
     */
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $req)
    {

    	$req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($req->only(['email', 'password']), $req->rem))
        {
            return back()->withErrors('Email or Password is incorrect');
        }

    	return $this->redir();
    }

    /**
     * Handling User Registration
     */
    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $req)
    {
    	$req->validate([
    		'email' => 'bail|required|email|unique:users',
    		'password' => 'bail|required|same:cpassword',
    		'name' => 'bail|required',
            'mobile' => 'bail|required',
            'address' => 'bail|required',
    	]);

    	$user = new User();
    	$user->fill($req->only(['email','name','address','mobile','address']));
    	$user->password = bcrypt($req->password);

    	if($user->save())
    	{
    		auth()->login($user);
    		return $this->redir();
    	}
    	else
    	{
    		return back()->withErrors('Something wrong here...');
    	}
    }

    /**
     * Handling User Lost Pass
     */
    public function lostpass()
    {
        return view('auth.lostpass');
    }

    public function lostpassPost(Request $req)
    {
        $req->validate([
        	'email' => 'required|email'
        ]);

        return redirect()->route('auth.login')->with('success',"Check your email for validation link");
    }

    /**
     * Handling User Logout
     */
    public function logout()
    {
        $this->middleware(['auth']);

        auth()->logout();

        return redirect()->route('auth.login')->with('success','You have been logged out successfully');
    }

    /**
     * Looged In Redirection
     */
    public function redir()
    {
    	if( request()->has('redir') )
        {
            return redirect( request('redir') );
        }
        else if(auth()->user()->isAdmin())
        {
            return redirect(url('/admin'));
        }
        return redirect()->intended('/');
    }
}
