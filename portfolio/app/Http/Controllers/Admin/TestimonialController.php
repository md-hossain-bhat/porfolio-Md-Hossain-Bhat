<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Session;
use Image;

class TestimonialController extends Controller
{
    public function testimonial(){

    	Session::put('page','testimonial');
    	$testimonials = Testimonial::select('id','name','title','company','image','status')->orderBy('id', 'DESC')->get();

    	return view("admin.testimonial.testimonial")->with(compact('testimonials'));
    }


    public function addEdittesTestimonial(Request $request, $id=null){
    	if ($id=="") {
            Session::put('page','add_testimonial');
            $name ="Add Testimonial";
            $testimonial = new Testimonial;
            $testimonialdata = array();
            $gettestimonials = array();
            $message ="Testimonial Add Successfully!";
        }else{
            $name ="Edit Testimonial";
            $testimonialdata = Testimonial::where('id',$id)->first();
            $gettestimonials = Testimonial::get();

            $testimonial = Testimonial::find($id);
            $message ="Testimonial Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
			// echo "<pre>"; print_r($data); die;
            $rulse = [
                'name' => 'required',
                'title' => 'required',
                'company' => 'required',
                'description' => 'required',
                'image' => 'image',
            ];

            $customMessage = [
            	'name.required' =>'name is required',
            	'title.required' =>'title is required',
                'company.required' =>'company is required',
                'description.required' =>'description is required',
                'image.image' =>'Valid image is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'backEnd/images/testimonial/'.$imageName;
                    Image::make($image_temp)->save($imagePath);
                    $testimonial->image = $imageName;
               }
            }

            if (empty($data['description'])) {
                $data['description'] = "";
            }

            $testimonial->name = $data['name'];
            $testimonial->title = $data['title'];
            $testimonial->company = $data['company'];
            $testimonial->description = $data['description'];
            $testimonial->status = 1;
            $testimonial->save();

            Session::flash('success_message',$message);
            return redirect("admin/testimonial");
        }
        //404 page 
        /*$countTestimonial = Testimonial::where('id',$id)->count();
        if($countTestimonial == 0){
            return view('admin.404');
        }*/

        return view("admin.testimonial.add_edit_testimonial")->with(compact('name','testimonialdata','gettestimonials'));
    }


    public function deleteTestimonialImage($id=null){

        $testimonialImage = Testimonial::select('image')->where('id',$id)->first();

        $testimonial_image_path = "backEnd/images/testimonial/";
        if (file_exists($testimonial_image_path.$testimonialImage->image)) {
            unlink($testimonial_image_path.$testimonialImage->image);
        }

        Testimonial::where('id',$id)->update(['image'=>'']);

        return redirect()->back()->with("success_message","Testimonial Image has been deleted Successfully!");
    }

    public function deleteTestimonial($id=null){

        $testimonialImage = Testimonial::select('image')->where('id',$id)->first();

        $testimonial_image_path = "backEnd/images/testimonial/";
        if (file_exists($testimonial_image_path.$testimonialImage->image)) {
            unlink($testimonial_image_path.$testimonialImage->image);
        }

        Testimonial::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Testimonial has been deleted Successfully!");
    }

    public function updateTestimonialStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if ($data['status']=="Active") {
                $status = 0;
            }else{
                $status = 1;
            }
            Testimonial::where('id',$data['testimonial_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'testimonial_id'=>$data['testimonial_id']]);
        }
    }
}
