<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
    public function redirect($service)
    {

        return Socialite::driver($service)->redirect();
        
    }

    public function callback($service)
    {

        return $user= Socialite::with($service)->user();
        
    }

}
