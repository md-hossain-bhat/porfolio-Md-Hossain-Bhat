<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
use Session;
use Image;

class LogoController extends Controller
{
    public function logo(){

    	Session::put('page','logo');
    	$logos = Logo::select('id','image','status')->orderBy('id', 'DESC')->get();

    	return view("admin.logo.logo")->with(compact('logos'));
    }


    public function addEdittesLogo(Request $request, $id=null){
    	if ($id=="") {
            Session::put('page','add_logo');
            $name ="Add Logo";
            $logo = new Logo;
            $logodata = array();
            $getlogos = array();
            $message ="Logo Add Successfully!";
        }else{
            $name ="Edit Logo";
            $logodata = Logo::where('id',$id)->first();
            $getlogos = Logo::get();

            $logo = Logo::find($id);
            $message ="Logo Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
			// echo "<pre>"; print_r($data); die;
            $rulse = [
                'image' => 'image',
            ];

            $customMessage = [
                'image.image' =>'Valid image is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'backEnd/images/logo/'.$imageName;
                    Image::make($image_temp)->save($imagePath);
                    $logo->image = $imageName;
               }
            }
            $logo->status = 1;
            $logo->save();

            Session::flash('success_message',$message);
            return redirect("admin/logo");
        }
        //404 page 
        /*$countLogo = Logo::where('id',$id)->count();
        if($countLogo == 0){
            return view('admin.404');
        }*/
        return view("admin.logo.add_edit_logo")->with(compact('name','logodata','getlogos'));
    }


    public function deleteLogoImage($id=null){

        $logoImage = Logo::select('image')->where('id',$id)->first();

        $logo_image_path = "backEnd/images/logo/";
        if (file_exists($logo_image_path.$logoImage->image)) {
            unlink($logo_image_path.$logoImage->image);
        }

        Logo::where('id',$id)->update(['image'=>'']);

        return redirect()->back()->with("success_message","Logo Image has been deleted Successfully!");
    }

    public function deleteLogo($id=null){

        $logoImage = Logo::select('image')->where('id',$id)->first();

        $logo_image_path = "backEnd/images/logo/";
        if (file_exists($logo_image_path.$logoImage->image)) {
            unlink($logo_image_path.$logoImage->image);
        }

        Logo::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Logo has been deleted Successfully!");
    }

    public function updateLogoStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if ($data['status']=="Active") {
                $status = 0;
            }else{
                $status = 1;
            }
            Logo::where('id',$data['logo_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'logo_id'=>$data['logo_id']]);
        }
    }
}
