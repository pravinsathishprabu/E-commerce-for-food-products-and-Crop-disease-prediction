<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Session;

class AuthController extends Controller
{
    /*Register Customer*/
    public function register(Request $request){
        //dd($request->name);
        $rules = [
            'name' => ['required','string','regex:/^[a-zA-Z]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','min:8'],
            'mobile'=> ['required','numeric','digits:10'],
            'latitude' => ['required'],
            'longitude' =>['required']
            ];

         $customMessages = [
             'required' => 'The :attribute field is required.',
             'name.regex:/^[a-zA-Z]+$/u' => "The :attribute field is invalid",
             'email.email'             =>    "The :attribute :input format should be example@example.com/.in/.edu/.org....",
             'email.unique'           =>   "The :attribute :input is taken. Please use another email address",
             'password.min:8'=> "The :attribute should be 8 characters long",
             'mobile.numeric'=>"The :attribute have only numbers",
             'latitude.required' => "Must give the loaction access",
             'longitude.required' => "Must give the loaction access"
        ];
        
        //$validate =  $this->validate($req, $rules, $customMessages);
        $validate =  Validator::make($request->all(),$rules,$customMessages);
        if($validate->fails()){
            return redirect('/error')->withInput()->withErrors($validate->messages());
        }
        else{
            $user = User::create([
            'name'=>$request->name,
            'email' => $request->email,
            'mobile'=>$request->mobile,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'password' => Hash::make($request->password)
        ]);
            Auth::login($user);
            return redirect('customer/home');
        }
    }

    /*Login Customer*/

    public function login(Request $request){
        $rules = [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required','min:8']
            ];

         $customMessages = [
            'required' => 'The :attribute field is required.',
            'email.email'             =>    "The :attribute :input format should be example@example.com/.in/.edu/.org....",
           'password.min:8'=> "The :attribute should be 8 characters long"
        ];
        
        //$validate =  $this->validate($req, $rules, $customMessages);
        $validate =  Validator::make($request->all(),$rules,$customMessages);
        if($validate->fails()){
            return redirect('/error')->withInput()->withErrors($validate->messages());
        }
        else{

        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email'=>$email,'password'=>$password])) {
            $user = User::where('email',$email)->first();
            Auth::login($user);
            return redirect('customer/home');
        }
        else{
            return back()->withErrors(['Invalid Credentials!']);
        }
    }
    }

    /*Logout*/
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/customer');
    }
}   

