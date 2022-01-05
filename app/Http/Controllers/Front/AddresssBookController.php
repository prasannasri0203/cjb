<?php

namespace App\Http\Controllers\Front;

use Auth;
use App\User;
use App\address_book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\OrderCustomerAddressDetails;
class AddresssBookController extends Controller
{
    public function addressBook()
    {
        $country = DB::table('country')
        ->orderByRaw("(CASE WHEN code = 'GB' THEN '1' else '2' END) ASC, countryname ASC")
        ->get();
        return view('front/address_book',compact('country'));
    }

    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, [
            'delivery_name' => 'required',
            'no' => 'required',
            'address1'  => 'required',
            // 'address2'  => 'required',
            'city_name' => 'required',
            'pscode'    => 'required|digits_between:1,6',
            'country'   => 'required',
            // 'phone'     => 'required|numeric|digits:10'
        ],
        [ 
            'pscode.required' => 'The postcode field is required.',  
            'pscode.digits_between' => 'he postcode must be between 1 and 6 digits.',  
        ]);

        if($request->primary == '1'){
            OrderCustomerAddressDetails::where('customer_id', Auth::user()->id)->update([
                'is_primary' => '0',
            ]);
            $primary = 1;
        }else{
            $primary = 0;
        }

        $customerAddress = new OrderCustomerAddressDetails;
        $customerAddress->customer_id = Auth::user()->id;
        $customerAddress->delivery_name  = $request->delivery_name;
        $customerAddress->no          =  $request->no;
        $customerAddress->street_1    =  $request->address1;
        $customerAddress->street_2    =  $request->address2;
        $customerAddress->region      =  $request->city_name;
        $customerAddress->country     =  $request->country;
        $customerAddress->zipcode     =  $request->pscode;
        $customerAddress->is_primary  =  $primary;
        $customerAddress->contact_no  =  $request->phone;

        $customerAddress->save();

        return redirect('address_book/list')->with('success',' Added successfully..!!');
    }

    public function edit($id)
    {
        $data = OrderCustomerAddressDetails::where('id',$id)->first();
        $country = DB::table('country')
        ->orderByRaw("(CASE WHEN code = 'GB' THEN '1' else '2' END) ASC, countryname ASC")
        ->get();
    //    echo "<pre>"; print_r($data);exit;
        return view('front/address_book_edit',compact('data','country'));
    }

    function __unshift(&$array, $value){
        $key = array_search($value, $array->code);
        if($key) unset($array[$key]);
        array_unshift($array, $value);  
        return $array;
    }

    public function update(Request $request)
    {

        $this->validate($request,[
            'delivery_name' => 'required',
            'no' => 'required',
            'address1'  => 'required',
            // 'address2'  => 'required',
            'city_name' => 'required',
            'pscode'    => 'required|digits_between:1,6',
            'country'   => 'required',
            // 'phone'     => 'numeric|digits:10'
        ],
        [ 
            'pscode.required' => 'The postcode field is required.',  
            'pscode.digits_between' => 'he postcode must be between 1 and 6 digits.',  
        ]);
        

        
        if($request->primary == '1'){
            OrderCustomerAddressDetails::where('customer_id', Auth::user()->id)->update([
                'is_primary' => '0',
            ]);
            $primary = 1;
        }else{
            $primary = 0;
        }
        $customerAddress = OrderCustomerAddressDetails::find($request->id);
        $customerAddress->customer_id = Auth::user()->id;
        $customerAddress->delivery_name = $request->delivery_name;
        $customerAddress->no          =  $request->no;
        $customerAddress->street_1    =  $request->address1;
        $customerAddress->street_2    =  $request->address2;
        $customerAddress->region      =  $request->city_name;
        $customerAddress->country     =  $request->country;
        $customerAddress->zipcode     =  $request->pscode;
        $customerAddress->is_primary  =  $primary;
        $customerAddress->contact_no  =  $request->phone;

        $customerAddress->save();


        return redirect('address_book/list')->with('success','Updated successfully..!!');
        // }

        // return redirect('address_book')->with('failure', 'Invalid request..!!');
    }

    public function list()
    {
    	$user_id= Auth::user()->id;
        $data = OrderCustomerAddressDetails::where('customer_id',$user_id)->where('deleted_at',NULL)->get();
        return view('front/address_book_list',compact('data'));
    }

    public function delete(Request $request)
    {
        $applicant_id=$request->input('applicant_id');

        $data = OrderCustomerAddressDetails::where('id',$applicant_id)->first();
        $user = $data->delete();
        return redirect('address_book/list');
    }
}
