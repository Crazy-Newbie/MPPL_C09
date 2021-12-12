<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function signuppage()
    {
        // dd('a');
        return view('signup');
    }  
    public function signinpage()
    {   
        $test = ['a','b'];
        $test2 = 'dwada';
        return view('signin', ['tas'=>$test, 'tos'=>$test2]);
    }
    public function adminpage()
    {
        // dd('a');
        return view('admin_landing');
    }
    
    public function editprofilepage(){
        return view('editprofile');
    }

    public function profilepage()
    {   
        // dd($user);
        if(Auth::user()){
            $user = User::where('id', Auth::user()->id)->get()->first();
            return view('profile', compact('user'));
        }
        else{
            return view('signin');
        }       
    }
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',

        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
        Auth::loginUsingId($user);
        return redirect()->route('signin');

    }

    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);
        
        $cridentials = $request->only('email','password');
        if(Auth::attempt($cridentials)){
            $user = Auth::user();
            if($user->isadmin == 1){
                return redirect('/admin');
            }
            else return redirect()->route('editprofile');

        }
        // $user = $request->all();
        // $email = $request->email;
        // $password = $request->password;
        // if (Auth::attempt(['email' => $email, 'password' => $password, 'isadmin' => 1])) {
        //     return redirect('/admin');
        // }
        // else if(Auth::attempt(['email' => $email, 'password' => $password, 'isadmin' => 0])) {
        //     return redirect('/');

        // }
        return redirect('/signup');

    }

    public function editprofile(Request $request)
    {

        $userid = Auth::id();
        // dd($userid);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'postalcode' => 'required',
        ]);

        User::where('id',$userid)->update([
			'name' => $request->name,
			'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'postalcode' => $request->postalcode,
		]);
        return redirect()->route('profile');

    }

    public function signout(Request $request)
    {
        //dd(Auth::user()->name);
        Auth::logout();
        return redirect('/signin');
    }
}
