<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Session;

class ServiceController extends Controller
{
    public function service(){
        Session::put('page','service');
        $services = Service::select('id','title','description','status')->orderBy('id', 'DESC')->get();
        return view('admin.service.service')->with(compact('services'));
    }

    public function addEditService(Request $request, $id=null){
        if ($id=="") {
            Session::put('page','add_service');
            $name ="Add Service";
            $Service = new Service;
            $servicedata = array();
            $getservices = array();
            $message ="Service Add Successfully!";
        }else{
            $name ="Edit Service";
            $servicedata = Service::where('id',$id)->first();
            $getservices = Service::get();

            $Service = Service::find($id);
            $message ="Service Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $rulse = [
                'title' => 'required',
                'description' => 'required',
            ];

            $customMessage = [
                'title.required' =>'title is required',
                'description.required' =>'description is required',
            ];

            $this->validate($request,$rulse,$customMessage);


            if (empty($data['description'])) {
                $data['description'] = "";
            }
            
            $Service->title = $data['title'];
            $Service->description = $data['description'];
            $Service->status = 1;
            $Service->save();

            Session::flash('success_message',$message);
            return redirect("admin/service");
        }
        
        //404 page 
        /*$countService = Service::where('id',$id)->count();
        if($countService == 0){
            return view('admin.404');
        }*/
        return view("admin.service.add_edit_service")->with(compact('name','servicedata','getservices'));
    }

    public function deleteService($id=null){

        Service::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Service has been deleted Successfully!");
    }

    public function updateServiceStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if ($data['status']=="Active") {
                $status = 0;
            }else{
                $status = 1;
            }
            Service::where('id',$data['service_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'service_id'=>$data['service_id']]);
        }
    }
}
