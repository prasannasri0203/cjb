<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\User;
use App\Http\Controllers\Controller;
// use App\Providers\SocialiteHandler;
use App\Services\SocialFacebookAccountService;
use Socialite;
use Exception;
use Auth;
use Hash;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        try {
            // $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
            // $create['name'] = $user->getName();
            // $create['email'] = $user->getEmail();
            // $create['facebook_id'] = $user->getId();
            // $create['password'] = Hash::make('cool_jelly_bean_user');

            // $userModel = new User;
            // $createdUser = $userModel->addNew($create);
            // Auth::loginUsingId($createdUser->id);
            $user = Socialite::driver('facebook')->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['password'] = '$2y$10$jqmGa605jLz0GHVtxcPHruZLFriskhdESzz1ZWMWdxeLOysjdSWHS'; // Hash::make('Password@1')
            $create['type'] = 2; // 2=Customer
            $create['status'] = 1;
            $create['facebook_id'] = $user->getId();


            $userModel = new User;
            $createdUser = $userModel->addNew($create);
            // echo '<pre>';print_r($createdUser['status']);exit;
            if($createdUser['status'] == 'success') {
                Auth::loginUsingId($createdUser['data']['id']);
                return redirect('dashboard');

            } else {
                 return redirect('/login')->withErrors(['email' => $createdUser['data']]);
            }

            //return redirect()->route('home');


        } catch (Exception $exception) {

            // dd($exception->getMessage());
            return redirect('/login')->withErrors(['email' => 'Invalid response.']);
            // return redirect('auth/facebook');


        }
    }

}
