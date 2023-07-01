<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleController extends Controller
{
    public function googlepage(){
        return Socialite::driver('google')->redirect();
    }

    public function googleredirect(){
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id',$user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('/');
            }else{
                $newUser = User::updateOrCreate([
                    'email' => $user->email
                ],[
                    "name"      =>  $user->name,
                    "google_id" => $user->id,
                    "password" => encrypt('12345678')
                ]);
                Auth::login($newUser);
                return redirect()->intended('/');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
