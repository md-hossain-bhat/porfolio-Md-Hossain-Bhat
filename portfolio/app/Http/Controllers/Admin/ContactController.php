<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Session;

class ContactController extends Controller
{
    public function contact(){
    	Session::put('page','contact');
    	$contacts = Contact::get();
    	return view('admin.contact.contact')->with(compact('contacts'));
    }

    public function addEditContact(Request $request, $id=null){
    	if ($id=="") {
            $name ="Add Contact";
            $contact = new Logo;
            $contactdata = array();
            $getcontacts = array();
            $message ="Contact Add Successfully!";
        }else{
            $name ="Edit Contact";
            $contactdata = Contact::where('id',$id)->first();
            $getcontacts = Contact::get();

            $contact = Contact::find($id);
            $message ="Contact Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
			// echo "<pre>"; print_r($data); die;
            $rulse = [
                'location' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'fb' => 'required',
                'li' => 'required',
                'tw' => 'required',
                'git' => 'required',
            ];

            $customMessage = [
                'location.required' =>'location is required',
                'phone.required' =>'phone is required',
                'email.required' =>'email is required',
                'fb.required' =>'Facebook is required',
                'li.required' =>'linkdin is required',
                'tw.required' =>'twitter is required',
                'git.required' =>'git is required',
            ];

            $contact->location = $data['location'];
            $contact->phone = $data['phone'];
            $contact->email = $data['email'];
            $contact->fb = $data['fb'];
            $contact->li = $data['li'];
            $contact->tw = $data['tw'];
            $contact->git = $data['git'];
            $contact->save();

            Session::flash('success_message',$message);
            return redirect("admin/contact");
        }
        //404 page 
        // $countContact = Contact::where('id',$id)->count();
        // if($countContact == 0){
        //     return view('admin.404');
        // }
        return view("admin.contact.add_edit_contact")->with(compact('name','contactdata','getcontacts'));
    }
}
