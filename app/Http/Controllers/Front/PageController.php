<?php

namespace App\Http\Controllers\Front;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Featured_video;
use App\enquiry;
use Auth;
use App\OrderItem;
use App\OrderDetails;
use App\MerchandiseProduct;
use App\MerchandiseProductImages;
use App\Cms;
use App\Notification;
use App\Notifications\MyEnquiryNotification;
use Mail;
use App\Banner;
use App\Faq;

class PageController extends Controller
{
     
    public function productdetail()
    {
    	$data = DB::table("products")->whereNull('deleted_at')->orderBy('id', 'asc')->get();

        return view('front/productdetail', compact('data'));
    }
 
    public function faq(Request $request)
    {
        //dd($request->search_text);

        if($request->search_text)
        {
            $data = DB::table("faqs")
            ->whereNull('deleted_at')
            ->orderBy('id', 'asc')
            ->where(function($query) use ($request) {
                $query->where('title', 'LIKE', '%'.$request->search_text.'%');
                $query->orwhere('question', 'LIKE', '%'.$request->search_text.'%');
                $query->orwhere('answer', 'LIKE', '%'.$request->search_text.'%');
            })
            ->get();

        }
        else
        {
            $data = DB::table("faqs")->whereNull('deleted_at')->orderBy('id', 'asc')->get();
        }
        $title = [];
        foreach ($data as $key => $value) {
            if (!in_array($value->title, $title))
            {
                $title[] = $value->title;
            }
        }
        $data=array_filter($title);
        //dd($title);
        // dd($data);
        return view('front/faq', compact('data'));
    }

    
    public function help()
    {
    	$data = DB::table("cms")->whereNull('deleted_at')->where('type', 'help')->orderBy('id', 'asc')->get();
        $banner = Banner::all()->where('status','2')->sortBy('id');
        $bannerCounter=$banner->count();
        $featured_video = Featured_video::where('type','Help')->get();

        return view('front/help', compact('data','featured_video','banner','bannerCounter'));
    }

    public function currencySwitcher(Request $request){
        session()->put('my_currency', $request->id);
        return response()->json(['status' => 'success','message'=>'Currency Switched']);

    }

    public function saveEnquiryDetails(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|max:255',
            'subject'       => 'required',
            'description'   => 'required',
        ]);

        $content = [];

        $enquiry_details=new enquiry;
        $enquiry_details->name        =   $request->name;
        $enquiry_details->email       =   $request->email;
        $enquiry_details->subject     =   $request->subject;
        $enquiry_details->description =   $request->description;
        $enquiry_details->save();

        $user = User::where('type', '0')->get();
        if($user){
            $details =[
                'id'  => $enquiry_details->id,
                'url' => 'admin/enquiry_edit/'.$enquiry_details->id,
            ];
            \Notification::send($user, new MyEnquiryNotification($details));
        }


        $content['name']  = $request->name;
        $content['email'] = $request->email;
        $content['url']   = url("/admin/enquiry_edit/{$enquiry_details->id}");
		// dd($content);
        try{
            Mail::send('mails/enquiry_details', $content, function($message) use ($content) {
                $message->to($content['email'])->subject('Cool Jelly Bean : Enquiry ');
                $message->from('admin@yopmail.com');
                // $message->setBody('test');
            });

        } catch(\Exception $e){
            return $e;
        }
        return redirect('help')->with('success', 'Kindly check your mail. We Will reach out to you soon.');
    }


     
    public function ideas(Request $request)
    {
        $data=[];
        $ideas = DB::table("cms")->whereNull('deleted_at')
                                ->where('type','ideas')
                                ->first();
                                // dd($ideas);
        if($ideas){
        $data = DB::table("cms")->whereNull('deleted_at')
                                 ->where('type', 'ideas')
                                 ->where('id','!=',$ideas->id)
                                 ->orderBy('id', 'asc')
                                 ->paginate(6);
        }
        return view('front/ideas', compact('data','ideas'));
    }

    
    public function wishlist()
    {
        if(Auth::check()){
            
            $data = DB::table("wishlist")->whereNull('deleted_at')
                                         ->where('user_id', Auth::user()->id)
                                         ->where('like',1)
                                         ->orderBy('id', 'asc')
                                         ->paginate(6);
            
            return view('front/wishlist', compact('data'));
        }else{
            return redirect('login')->with('failure', 'Invalid request..!!');
        }
    }

    public function wishlistadd(Request $request)
    {
        if(Auth::check()){

            $product_details =  DB::table("merchandise_products")
                                     ->where('id',$request->merch_product_id)
                                     ->get();
            if(isset($product_details[0]->product_variant_id) && $product_details[0]->product_variant_id != ''){
               
                $product_variants =  DB::table("product_variants") 
                                     ->where('id',$product_details[0]->product_variant_id)
                                     ->get();   
            }
            
            $data = DB::table("wishlist")->where('user_id', Auth::user()->id)
                                     ->whereNull('deleted_at')
                                     ->where('merch_product_id',$request->merch_product_id)
                                     ->get();
            if( count($data) > "0"){

                $like = "0";
                DB::table('wishlist')->delete($data[0]->id);
                return response()->json($like);
            } else {
                $like = "1";
                DB::table('wishlist')->insert([
                ['merch_product_id' =>$request->merch_product_id, 'user_id' =>Auth::user()->id,'like'=>$like],
                ]);
            }
                return response()->json($like);
        }else{
            
            $like = array('error');
            return response()->json($like);
        }
    }

    

    public function others(Request $request,$slug)
    {
        $data = DB::table("cms")->whereNull('deleted_at')->where('type', 'others')->where('slug',$slug)->orderBy('id', 'asc')->first();
        return view('front/others',compact('data'));
    }
     
    public function detailpage($id)
    {

    	$data = DB::table("cms")->whereNull('deleted_at')->where('id', $id)->first();
        $banner = Banner::all()->where('status','3')->sortBy('id');

        return view('front/detailpage', compact('data','banner'));
    }
   
    public function aboutMe($uname)
    {
        $userinfo = User::where("name",$uname)->first();
        // dd($userinfo);
        $id = $userinfo['id'];
        $user = User::whereIn('status', array(1))->whereNull('deleted_at')->find($id);
        // dd($user);
        if($user) {

            $data = DB::table("artist_gallery")->where('user_id', $id)->where('status', 1)->whereNull('deleted_at')->orderBy('id', 'asc')->limit(8)->get();
            $theme = DB:: table("artist_themes")->where('user_id',$id)->where('status',1)->first();
        	if(!$theme)
            {
            	$theme = DB:: table("artist_themes")->where('user_id',2)->where('status',1)->first();
            }
             

            $product_data = OrderDetails::select(DB::raw('order_management.id,b.order_id,b.merchandise_product_id as groupby,d.image,c.artist_id,c.product_id,c.merchandise_product_name,c.product_price'))
                            ->join('order_item as b','b.order_id', '=','order_management.id')
                            ->join('merchandise_products as c','b.merchandise_product_id', '=','c.id')
                            ->join('merchandise_product_images as d','c.id', '=','d.merch_product_id')
                            ->where('c.artist_id', $userinfo['id'])
                            //->limit(1)
                            ->get();


            return view('front/about-me', compact('data', 'user','theme','product_data'));

        }

        return redirect('login')->with('failure', 'Invalid request..!!');
    }

	 public function createMerchendise(Request $request)
    {
		$products = Product::with('product_category')->get();
        $tab = 'customise';


        return view('front/design-tool/marchandise-tab', compact('products', 'tab'));
    }



    public function customiseMerchendise(Request $request)
    {
        $prod = Product::where('id', $id)->first();
		$tab = 'customise';

		return view('front/design-tool/customise-tab', compact('prod', 'tab'));
    }

    public function search(){
        $q = Input::get ( 'q' );
        $user = Product::where('product_name','LIKE','%'.$q.'%')->first();

        if(count($user) > 0)
            return view('welcome')->withDetails($user)->withQuery ( $q );
            else return view ('welcome')->withMessage('No Details found. Try to search again !');
    }

}
