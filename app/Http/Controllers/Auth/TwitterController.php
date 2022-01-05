<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use Auth;
use Exception;

class TwitterController extends Controller
{
    



    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleTwitterCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
            $create['name'] = $user->name;
            $create['email'] = $user->email;
            $create['password'] = '$2y$10$jqmGa605jLz0GHVtxcPHruZLFriskhdESzz1ZWMWdxeLOysjdSWHS'; // Hash::make('Password@1')
            $create['type'] = 2; // 2=Customer
            $create['status'] = 1;
            $create['twitter_id'] = $user->id;
            
            $userModel = new User;
            $createdUser = $userModel->addNewUser($create);
            // echo '<pre>';print_r($createdUser['status']);exit;
            if($createdUser['status'] == 'success') {
                Auth::loginUsingId($createdUser['data']['id']);
                return redirect('dashboard');

            } else {
                 return redirect('/login')->withErrors(['email' => $createdUser['data']]);
            }
        } catch (Exception $e) {
            return redirect('/login')->withErrors(['email' => 'Invalid response.']);
            // return redirect('auth/twitter');
        }
    }
}

