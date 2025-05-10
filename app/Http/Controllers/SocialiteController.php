<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;


class SocialiteController extends Controller
{
      public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        
       
        $user = User::where('email', $socialUser->getEmail())->first();
        if ($user) {
            $user->provider = $provider;
            $user->provider_id = $socialUser->getId();
            $user->save();
        } else {
            $user = User::create([
                'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                'email' => $socialUser->getEmail(),
                'password' => bcrypt(Str::random(24)), 
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
            ]);
        }
    
        Auth::login($user);
        
    
        return redirect('/');
    }
}
