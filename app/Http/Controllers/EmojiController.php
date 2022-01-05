<?php

namespace App\Http\Controllers;

use App\Emoji;
use App\Http\Requests\ArtistEmoji;
use App\Http\Requests\Emoji as RequestsEmoji;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Image;
use Illuminate\Support\Facades\Storage;
use Redirect;

class EmojiController extends Controller
{
    public function emoji_list(Request $request)
    {
        $count=1;
        $emojis= Emoji::latest()->get();
        return view('portal.emoji.index',compact('emojis','count'));
    }

    public function artist_emoji_list(Request $request)
    {
        $id=Auth::user()->id;
        $count=1;
        $emojis= Emoji::where('user_id',$id)->where('user_type',1)->latest()->get();
        return view('front.artist_emoji_list',compact('emojis','count'));
    }

    public function emoji_list_create(Request $request)
    {
        return view('portal.emoji.create');
    }

    public function artist_emoji_list_create(Request $request)
    {
        return view('front.artist_emoji_create');
    }

    public function emoji_list_store(RequestsEmoji $request)
    {
        $extension = $request->file('image')->getClientOriginalExtension();
      
        if($extension == 'jfif'){

             return redirect()->back()->with("error","This type of format is not supported jfif");
        }else{

       
            $user_id= Auth::user()->id;
            $user= User::where('id',$user_id)->first();
            $name = null;

            if ($request->hasFile('image')) {

                if($request->file('image')->isValid()){
                    $image = $request->file('image');
                    $name = 'IMG_'.time().'.'.$image->getClientOriginalExtension();

                    $name1 = 'dup'.time().'.'.$image->getClientOriginalExtension();

                    $destinationPath = public_path('/uploads/emoji/');
                    if(!is_dir($destinationPath))
                    {
                        mkdir($destinationPath, 0755, true);
                    }

                    $image->move(public_path().'/folder/',$name);
                    $image_resize = Image::make(public_path().'/folder/'.$name);
                    $image_resize->fit(100, 100);
                    $image_resize->save(public_path('/uploads/emoji/' .$name));
                    // $image->move($destinationPath, $name);
                } 
            }

            $emoji= Emoji::create([
                'user_id' => $user_id,
                'user_type' => $user->type,
                'image_name' => $request->name,
                'file' => $name,
                'status' => $user->type =='0' ? '1' : '0',
            ]);
            return redirect('admin/emoji_list');
        }
    }

    public function artist_emoji_list_store(ArtistEmoji $request)
    {
        $extension = $request->file('image')->getClientOriginalExtension();
      
        if($extension == 'jfif'){
             return redirect()->back()->with("err","This type of format is not supported jfif");
        }else{

                $this->validate($request,[
                    'commision' => 'numeric',
                    'image.*' => 'image|mimes:jpeg,png,jpg,gif',
                    'name'=>'required',
                    ]);
                    
                    $user_id= Auth::user()->id;
                    // dd($user_id);
                $user= User::where('id',$user_id)->first();

                $name = null;
            if ($request->hasFile('image')) {
                 if($request->file('image')->isValid())
                 {
                $image = $request->file('image');
                $name = 'IMG_'.time().'.'.$image->getClientOriginalExtension();

                $destinationPath = public_path('/uploads/emoji/');
               
                if(!is_dir($destinationPath))
                {
                    mkdir($destinationPath, 0755, true);
                }

                // $image->move($destinationPath, $name);
                $image->move(public_path().'/folder/',$name);

                $image_resize = Image::make(public_path().'/folder/'.$name);
                $image_resize->fit(100, 100);
                $image_resize->save(public_path('/uploads/emoji/' .$name));

                 }
            }

                $emoji= Emoji::create([
                    'user_id' => $user_id,
                    'user_type' => $user->type,
                    'image_name' => $request->name,
                    'file' => $name,
                    'commision' => $request->commision,
                    'status' => '1',
                ]);
                return redirect('/emoji_list');
       }
    }

    public function emoji_list_status(Request $request)
    {
        $emojis= Emoji::where('id',$request->id)->first();
         $city = Emoji::where('id', $request->id)->update([
            'status' => $request->value,
        ]);
    	$status= Emoji::where('id',$request->id)->first();

        return response()->json($status);
    }
}
