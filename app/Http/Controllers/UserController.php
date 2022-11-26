<?php

namespace App\Http\Controllers;

use App\Models\Network;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Mail;

class UserController extends Controller
{
    public function loadRegister(){

        $data['1'] = '123';
        $data['123'] ='xcxc';

         return view('myAuth.register',['data'=> $data]);
    }

    public function registered(Request $request){
       //dd($request->all());
       $request->validate([
        'name' => 'required|string|min:3',
        'email' => 'required|email|unique:users',
         'password' => 'required|confirmed',
       ]);

       $referral_code = Str::random(10);
       $token = Str::random(50);

       if(isset($request->referral_code)){
           $userData = User::where('referral_code',$request->referral_code)->get();
           if(count($userData) > 0){
            $user_id = User::insertGetId([
                'name'=> $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'referral_code' =>  $referral_code,
                'remember_token' => $token
              ]);

              Network::insert([
                'referral_code' => $request->referral_code,
                'user_id' => $user_id,
                'parent_user_id' => $userData[0]['id']
              ]);
           }
           else{
            return back()->with('error','Your Referral code is wrong');
           }
       }
       else{
          User::insert([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'referral_code' =>  $referral_code,
             'remember_token' => $token
          ]);
          //success session
       }
        $domain = URL::to('/');
        $url = $domain.'/referral-register?ref='.$referral_code;
        $data['url'] = $url;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['title'] = "Registered";

        Mail::send('emails.registerMail',['data' => $data], function($msg) use ($data){
             $msg->to($data['email'])->subject($data['title']);
        });

        //for users email verifivcatino

        $url = $domain.'/email-verification/'.$token;
        $data['url'] = $url;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['title'] = "Referral Account Verification";

        Mail::send('emails.verifyMail',['data' => $data], function($msg) use ($data){
            $msg->to($data['email'])->subject($data['title']);
        });

       return back()->with('success','Your Registration has been added please verify acount account');

    }

    public function loadReferralRegister(Request $request){
         if(isset($request->ref)){
             $referral = $request->ref;
             $userData = User::where('referral_code',$request->ref)->get();
             if(count($userData)>0){
               return view('myAuth.loadReferralRegister',compact('referral'));
             }else{
                return view('404');
             }
         }else{
             return redirect('/');
         }
//        return view('myAuth.loadReferralRegister');
    }

    public function emailVerification($token){
        $userData = User::where('remember_token',$token)->get();
        if(count($userData)>0){
           if($userData[0]['is_verified'] == 1){
               return view('verified',['msg'=> 'your account is already verified']);
           }else{
               User::where('id',$userData[0]['id'])->update([
                  'is_verified' => 1,
                   'email_verified_at' => date('Y-m-d H:i:s')
               ]);
               return  view('verified',['msg'=> 'Your '.$userData[0]['email'].' has been verified']);
           }
        }
        else{
            return view('404');
        }
    }

    public function login(){
        return view('myAuth.login');
    }
    public function userLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $userData = User::where('email',$request->email)->first();
      //  dd($userData['is_verified']);
        if(!empty($userData)){
            if($userData['is_verified'] == 0){
                return back()->with('error','Your Account Is not Verified/Active');
            }else{

            }
        }

        $userCredential = $request->only('email','password');
        if(Auth::attempt($userCredential)){
            return redirect('dashboard');
        }else{
            return back()->with('error','email or password is incorrect');
        }

    }
    public function loadDashboard(){
        return view('Dashboard');
    }
}
