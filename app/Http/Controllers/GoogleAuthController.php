<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public  function  redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public  function  callbackgoogle()
    {

        try {
            $google_user=Socialite::driver('google')->user();
            $user=User::where('email',$google_user->getEmail())->first();
            if($user){
                Auth::login($user);
                return redirect()->route('home');

            }else{
                $new_user=User::create([
                    'name'=>$google_user->getName(),
                    "email"=>$google_user->getEmail(),
                    "google_id"=>$google_user->getId()
                ]);
                $new_user->addRole('user');
                Auth::login($new_user);
                return redirect()->route('home');
            }
        } catch (\Throwable $th){
            dd("SOMETHING went wrong ".$th->getMessage());

        }
    }
}
