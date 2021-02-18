<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     //========login facebook========//
     public function redirectToFacebook()
     {
         return Socialite::driver('facebook')->redirect();
     }
 
     public function handleFacebookCallback()
     {
         $user = Socialite::driver('facebook')->user();
         $check = User::where('email',$user->id)->first();
 
         if($check){
             Auth::login($check);
             return redirect()->route('login');
         }else{
             $data = new User();
             $data->name = $user->name;
             $data->email= $user->id;
             $data->password = bcrypt('12345678');
             $data->save();
     
             Auth::login($user);
             return redirect()->route('home');
         }
        
     }
      //========login google========//
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $check = User::where('email',$user->id)->first();

        if($check){
            Auth::login($check);
            return redirect()->route('login');
        }else{
            $data = new User();
            $data->name = $user->name;
            $data->email= $user->id;
            $data->password = bcrypt('12345678');
            $data->save();
    
            Auth::login($user);
            return redirect()->route('home');
        }
       
    }
}
