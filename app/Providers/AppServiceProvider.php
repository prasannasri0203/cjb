<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //NEW: Import Schema
use Illuminate\Support\Facades\View;
use Auth;
use App\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

     
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('portal/app', function ($view) {
            $user = Auth::User();
            // dd($user);
            $view->with('data',count($user->unreadNotifications))
            ->with('unread_enquiry_count',  count($user->unreadNotifications()->where('type','App\Notifications\MyEnquiryNotification')->get()))
            ->with('unread_enquiry_notifications', $user->unreadNotifications()->where('type','App\Notifications\MyEnquiryNotification')->limit(5)->get())
            ->with( 'unread_order_count', count($user->unreadNotifications()->where('type','App\Notifications\MyOrderNotification')->get()))
            ->with('unread_order_notifications', $user->unreadNotifications()->where('type','App\Notifications\MyOrderNotification')->limit(5)->get())
            ->with('unread_fault_count', count($user->unreadNotifications()->where('type','App\Notifications\MyFaultAndReturnsNotification')->get()))
            ->with('unread_fault_notifications', $user->unreadNotifications()->where('type','App\Notifications\MyFaultAndReturnsNotification')->limit(5)->get());
        });

        // view::composer('front/app',function($uname){

        //     $userinfo = User::where("name",$uname)->first();
        //     $id = $userinfo['id'];
        //     $user = User::whereIn('status', array(1))->whereNull('deleted_at')->find($id);
        //     $user = User::whereIn('status', array(1))->where('id',$id)->whereNull('deleted_at')->first();
        //     $theme->with('themes',(DB:: table("artist_themes")->where('user_id',$id)->where('status',1)->first()));
        // });
     	date_default_timezone_set('Asia/Kolkata');
    }
}
