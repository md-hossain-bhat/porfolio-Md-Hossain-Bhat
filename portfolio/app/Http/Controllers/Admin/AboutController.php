<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Image;
use Session;

class AboutController extends Controller
{
    public function abouts(){
        Session::put('page','about_us');
        $abouts = About::select('id','name','description','image')->get();
        return view('admin.about.about')->with(compact('abouts'));
    }

    public function addEditAbout(Request $request, $id=null){
        if ($id=="") {
            $name ="Add About";
            $about = new About;
            $aboutdata = array();
            $getAbouts = array();
            $message ="About Add Successfully!";
        }else{
            $name ="Edit About";
            $aboutdata = About::where('id',$id)->first();
            $getAbouts = About::get();

            $about = About::find($id);
            $message ="About Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $rulse = [
                'name' => 'required',
                'title' => 'required',
                'description' => 'required',
                'image' => 'image',
            ];

            $customMessage = [
                'name.required' =>'name is required',
                'title.required' =>'title is required',
                'description.required' =>'description is required',
                'image.image' =>'Valid image is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'backEnd/images/about/'.$imageName;
                    Image::make($image_temp)->save($imagePath);
                    $about->image = $imageName;
               }
            }

            if (empty($data['description'])) {
                $data['description'] = "";
            }
            $about->name = $data['name'];
            $about->title = $data['title'];
            $about->description = $data['description'];
            $about->save();

            Session::flash('success_message',$message);
            return redirect("admin/about");
        }
      
        return view("admin.about.add_edit_about")->with(compact('name','aboutdata','getAbouts'));
    }


    public function deleteAboutImage($id=null){

        $aboutImage = About::select('image')->where('id',$id)->first();

        $about_image_path = "backEnd/images/about/";
        if (file_exists($about_image_path.$aboutImage->image)) {
            unlink($about_image_path.$aboutImage->image);
        }

        About::where('id',$id)->update(['image'=>'']);

        return redirect()->back()->with("success_message","About Image has been deleted Successfully!");
    }
}
