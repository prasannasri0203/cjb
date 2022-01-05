<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Faq;
use App\Cms;
use Image;
use File;
use Illuminate\Support\Str;
use yajra\Datatables\Datatables;
use Illuminate\Database\Eloquent\Model;
use Unisharp\Ckeditor\ServiceProvider;

class InformationController extends Controller
{
	public function faqList(Request $request){
		// $list = Faq::get();
			if ($request->ajax()) {
				$data = Faq::get();
				return Datatables::of($data)
						->addIndexColumn()
						->addColumn('action', function($row){

							   $btn = '<a href="faq_edit/'.$row->id.'" class="edit btn btn-primary btn-sm">Edit</a>';
							   $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"  data-id="'.$row->id.'" onclick="setFaqId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
							//    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="setFaqId('{{$faq->id}}')">Delete</a>
							   return $btn;

						})
						->rawColumns(['action'])
						->make(true);
			}




		return view('portal/faq');
	}

	public function faq_datatable_status_update($id)
    {
        //dd($id);
        $update_product=Faq::where('id',$id)->update(['status' => '1','updated_at' =>   date('j F, Y')]);
        if($update_product)
        {
			return redirect()->route('admin.faq_list')->with('success','FAQ deleted successfully.');
        }
        else
        {
            return redirect()->route('admin.faq_list')->with('success','No deleted.');
        }
    }

	public function addFaq(){
		$user = Faq::all();
		$faq = [];
		$data = [];
		return view('portal/add_faq', compact('user','faq','data'));
	}

	public function saveFaq(Request $request){

		$validator = Validator::make($request->all(), [ // <---
			'question' => 'required',
			'answer' => 'required',
			'title' => 'required',
			// 'keyword' => 'required',
		]);
		if ($validator->fails())
		{
			return redirect()->back()->withInput()->withErrors($validator->errors());
		}
		else{
			if($request->has('id')){
				$newFaq = Faq::find(base64_decode($request->id));
				$newFaq->title = $request->title;
				$newFaq->question = $request->question;
				$newFaq->answer = $request->answer;
				// $newFaq->keywords = $request->keyword;
				$newFaq->save();

				return redirect()->route('admin.faq_list')->with('success','FAQ Details updated successfully.');
			}
			else{
				$newFaq = new Faq();
				$newFaq->question = $request->question;
				$newFaq->answer = $request->answer;
				$newFaq->title = $request->title;
				// $newFaq->keywords = $request->keyword;
				$newFaq->save();

				return redirect()->route('admin.faq_list')->with('success','FAQ Details saved successfully.');
			}
		}
	}
	public function editFaq(Request $request, $id){

			$faq = Faq::where('id', $id)->find($id);
			return view('portal/edit_faq', compact('faq'));
		}

	public function deleteFaq(Request $request){
		$id = $request->faqId;
    	Faq::find($id)->delete();
		// if($request->has('faqId')){
		// 	$faq = Faq::where('id', $request->faqId)->delete();
			return redirect()->route('admin.faq_list')->with('success','FAQ deleted successfully.');
		// }
	}

	public function cmsList(Request $request){
		// $list = Cms::paginate(10);
		if ($request->ajax()) {
			$data = Cms::get();
			return Datatables::of($data)
					->addIndexColumn()
					->addColumn('date', function($row){

						   $date = date('d-m-Y', strtotime($row->updated_at));

						   return $date;

					})
					->addColumn('action', function($row){

						   $btn = '<a href="cms_edit/'.$row->id.'" class="edit btn btn-primary btn-sm">Edit</a>';
						   if($row->type!='others'){
						   $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="'.$row->id.'" onclick="setCmsId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';}
						//    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="setCmsId('{{$cms->id}}')">Delete</a>

						   return $btn;

					})
					->rawColumns(['action'])
					->make(true);
		}



		return view('portal/cms');
	}

	public function cms_datatable_status_update($id)
    {
        //dd($id);
        $update_product=Cms::where('id',$id)->update(['status' => '1']);
        if($update_product)
        {
            return response()->json(['success'=>'Product deleted successfully.']);
        }
        else
        {
            return response()->json(['success'=>'No deleted.']);
        }
    }
	public function addCmsPage(){

		return view('portal/add_cms', array('cms' => []));
	}
	public function saveCmsPage(Request $request){

        
        $str = strtolower($request->slug);
        $request->slug = preg_replace('/\s+/', '-', $str);
        
		// $validator = Validator::make($request->all(), [
		// 	'files' => 'required',
		// ]);
    

		// $profileImages = $request->file('files');

		// if(!empty($profileImages)){

		// 	foreach($profileImages as $images)
		// 	{
		// 		if (!empty($images)) {
		// 		   $image=$images->getClientOriginalExtension();
		// 		   if($image =="jfif"){
		// 			    return redirect()->back()->with("error","This type of format is not supported jfif");
		// 		   }
		// 		}
		// 	}
	 //    }else{
	 //    	return redirect()->back()->with("error","Image field is required");
	 //    }

		$validator = Validator::make($request->all(), [ // <---
			'type' => 'required|in:help,ideas,others',
			'pagename' => 'required|unique:cms,name,'.base64_decode($request->id).',id,deleted_at,NULL',
			'slug'     => 'required|min:3|max:255|unique:cms,slug,'.base64_decode($request->id).',id,deleted_at,NULL',
			'content' => 'required',
			'files' => 'max:2048'
		]);

		if ($validator->fails())
		{

			return redirect()->back()->withInput()->withErrors($validator->errors());
		}
		else{
			if($request->has('id')){
				$data = array();

				if(!$request->hasfile('files')){
					$data = json_decode($request->images);
				}

				if($request->is_edit_image == 1){

					if($request->hasfile('files') && $request->files != "")
					{
						foreach($request->file('files') as $image)
						{
							$name=rand().'.'.$image->getClientOriginalExtension();
							$img = Image::make($image->getRealPath());
							$org_img = Image::make($image->getRealPath());
							$destinationPath = public_path('uploads');
							$thumbPath = public_path('uploads/thumbimages');
							if(!File::isDirectory($destinationPath)){
							File::makeDirectory($destinationPath, 0777, true, true);
							}
							if(!File::isDirectory($thumbPath)){
							File::makeDirectory($thumbPath, 0777, true, true);
							}

							//create small thumbnail
							$img->resize(150, 150, function ($constraint) {
							$constraint->aspectRatio();
							})->save($thumbPath.'/'.$name);
							$org_img->save($destinationPath.'/'. $name );

								// $name= time();
								// $image->move(public_path().'/uploads/', $name);
								// dd($name);
								array_push($data, $name);
						}
					}
					else{
						$input = [];
						$input['images'] = "";
					}
				}
				$newFaq = Cms::find(base64_decode($request->id));
				$newFaq->type = $request->type;
				$newFaq->name = $request->pagename;
				// $str = strtolower($request->pagename);
				$newFaq->slug = $request->slug;
				$newFaq->content = $request->content;
				$newFaq->images = json_encode($data);
				$newFaq->save();

				return redirect()->route('admin.cms_list')->with('success','CMS page details updated successfully.');
			}
			else{
				$data = array();
				if($request->hasfile('files'))
				{

					foreach($request->file('files') as $image)
					{
						$name=$image->getClientOriginalName();
						$img = Image::make($image->getRealPath());
						$org_img = Image::make($image->getRealPath());
						$destinationPath = public_path('uploads');
						$thumbPath = public_path('uploads/thumbimages');
						if(!File::isDirectory($destinationPath)){
						File::makeDirectory($destinationPath, 0777, true, true);
						}
						if(!File::isDirectory($thumbPath)){
						File::makeDirectory($thumbPath, 0777, true, true);
						}

						//create small thumbnail
						$img->resize(150, 150, function ($constraint) {
						$constraint->aspectRatio();
						})->save($thumbPath.'/'.$name);
						$org_img->save($destinationPath.'/'. $name );

						// $name=$image->getClientOriginalName();
						// $image->move(public_path().'/uploads/', $name);
						$data[] = $name;
					}
				}

				$newFaq = new Cms();
				$newFaq->type = $request->type;
				$newFaq->name = $request->pagename;
				$newFaq->slug = $request->slug;
				$newFaq->content = $request->content;
				$newFaq->images = json_encode($data);
				$newFaq->save();

				return redirect()->route('admin.cms_list')->with('success','CMS page details saved successfully.');
			}
		}
	}
	public function editCms(Request $request, $id){

			$cms = Cms::find($id);
			return view('portal/edit_cms', array('cms' => $cms));

	}
	public function deleteCms(Request $request){
		$id = $request->cmsId;
		// if($request->has('cmsId')){
			Cms::find($id)->delete();
			// $faq = Cms::where('id', $request->cmsId)->delete();
			return redirect()->route('admin.cms_list')->with('success','CMS Page deleted successfully.');
		// }
	}
}
