<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravelista\Comments\Commenter;
// use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;
    use Commenter;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','first_name','last_name','contact_number','gender','dob','address_1','city','state','status','country', 'type', 'profile_image', 'facebook_id', 'twitter_id','is_own_shop','account_mail','marketing_mail','bank_name','sort_code','account_number','google2fa_secret','fa_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function setGoogle2faSecretAttribute($value)
    {
         $this->attributes['google2fa_secret'] = encrypt($value);
    }

    /**
     * Decrypt the user's google_2fa secret.
     *
     * @param  string  $value
     * @return string
     */
    public function getGoogle2faSecretAttribute($value)
    {
        return Decrypt($value);
    }
    
    public function addNew($input)
    {
        // $check = static::where('facebook_id',$input['facebook_id'])->first();

        $user = static::where('email', $input['email'])->get();

        if($user->count() > 1) {
            $data = array('status' => 'error', 'data' => 'Invalid account..!!');
            return $data;
            // return response()->json(['status'=> 'errors', 'data'=> 'Illegal account..!!'], 422);
        }

        if(@$user[0]->facebook_id == $input['facebook_id'] && @$user[0]->facebook_id != null && @$user[0]->facebook_id != '') {
            $data = array('status' => 'success', 'data' => @$user[0]);
            return $data;
            // return response()->json(['status'=> 'success', 'data'=> @$user[0]], 422);
        }

        if(@$user[0]->twitter_id != null && @$user[0]->twitter_id != '') {
            // return response()->json(['status'=> 'errors', 'data'=> 'Account already exist, Kindly use appropriate social media login..!!'], 422);
            $update_user = static::where('id', @$user[0]->id)->update(['facebook_id' => $input['facebook_id']]);
            $data = array('status' => 'success', 'data' => @$user[0]);
            return $data;
            // return response()->json(['status'=> 'success', 'data'=> @$user[0]], 422);
        }

        if( !$user->count() ) {
            $data = array('status' => 'success', 'data' => static::create($input));
            return $data;
            // return response()->json(['status'=> 'success', 'data'=> static::create($input)], 422);
        }

        $data = array('status' => 'error', 'data' => 'Kindly contact admin team..!!');
        return $data;

        // return response()->json(['status'=> 'errors', 'data'=> 'Kindly contact admin team..!!'], 422);


        // return $check;
    }

    public function addNewUser($input)
    {
        // $check = static::where('twitter_id',$input['twitter_id'])->first();

        $user = static::where('email', $input['email'])->get();

        if($user->count() > 1) {
            $data = array('status' => 'error', 'data' => 'Invalid account..!!');
            return $data;
            // return response()->json(['status'=> 'errors', 'data'=> 'Illegal account..!!'], 422);
        }

        if(@$user[0]->twitter_id == $input['twitter_id'] && @$user[0]->twitter_id != null && @$user[0]->twitter_id != '') {
            $data = array('status' => 'success', 'data' => @$user[0]);
            return $data;
            // return response()->json(['status'=> 'success', 'data'=> @$user[0]], 200);
        }

        if(@$user[0]->facebook_id != null && @$user[0]->facebook_id != '') {
            $update_user = static::where('id', @$user[0]->id)->update(['twitter_id' => $input['twitter_id']]);
            $data = array('status' => 'success', 'data' => @$user[0]);
            return $data;
            // return response()->json(['status'=> 'success', 'data'=> @$user[0]], 200);
        }

        if( !$user->count() ) {
            $data = array('status' => 'success', 'data' => static::create($input));
            return $data;
            // return response()->json(['status'=> 'success', 'data'=> static::create($input)], 200);
        }


        $data = array('status' => 'error', 'data' => 'Kindly contact admin team..!!');
        return $data;

        // return response()->json(['status'=> 'errors', 'data'=> 'Kindly contact admin team..!!'], 422);
        // return $check;
    }

}
