<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;
use App\Models\Contact;
use App\Models\About;
use Auth;
use Image;

class UserController extends Controller
{

    public function profile(Request $request){
        Session::put('page','profile');
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rulse = [
                'name' => 'required',
                'mobile' => 'required|numeric',
                'image' => 'image',
            ];

            $customMessage = [
                'name.required' =>'name is required',
                'mobile.required' =>'mobile is required',
                'mobile.numeric' =>'Valid mobile is required',
                'image.image' =>'Valid image is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'backEnd/images/profile/'.$imageName;
                    Image::make($image_temp)->resize(150,150)->save($imagePath);
                }else if (!empty($data['image'])){
                    $imageName = $data['image'];
                }else{
                    $imageName = "";
                }
            }

            User::where('email',Auth::user()->email)->update(['name'=>$data['name'],'mobile'=>$data['mobile'],'image'=>$imageName]);
            Session::flash('success_message','Admin Details has been updated Successfully!');
            
            return redirect()->back();
        }
        $user = User::where('email',Auth::user()->email)->first();
        $contact = Contact::first();
        $about = About::first();
        return view('admin.profile.profile')->with(compact('user','contact','about'));
    }

    public function deleteProfileImage($id=null){

        $porfileImage = User::select('image')->where('id',$id)->first();

        $portfolio_image_path = "backEnd/images/profile/";
        if (file_exists($portfolio_image_path.$porfileImage->image)) {
            unlink($portfolio_image_path.$porfileImage->image);
        }

        User::where('id',$id)->update(['image'=>'']);

        return redirect()->back()->with("success_message","Portfolio Image has been deleted Successfully!");
    }

    public function chkPassword(Request $request){

        $data = $request->all();

        // echo "<pre>"; print_r($data);

        $current_password = $data['current_pwd'];
        // echo "<pre>"; print_r(Auth::guard('admin')->user()->password);die;
        // $check_password = Auth::guard('admin')User::where(['admin'=>'1'])->first();
        if(Hash::check($current_password,Auth::user()->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();

            if(Hash::check($data['current_pwd'],Auth::user()->password)){

                if ($data['new_pwd']==$data['confirm_pwd']) {
                    User::where('id',Auth::user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                    Session::flash('success_message','Password has been updated Successfully!');
                }else{
                   Session::flash('error_message','new Password & confirm password not match!');
                }

            }else {

                Session::flash('error_message','Incorrect Current Password!');
            }
           return redirect()->back();
      }
    }
}
