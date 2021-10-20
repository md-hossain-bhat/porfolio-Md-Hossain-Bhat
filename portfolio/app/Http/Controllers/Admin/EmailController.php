<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Email;
use Session;

class EmailController extends Controller
{
    public function email(){

    	Session::put('page','email');

    	$emails = Email::select('id','name','subject','email')->orderBy('id', 'DESC')->get();
    	return view('admin.email.email')->with(compact('emails'));
    }
    public function emailView($id=null){
    
    	$email = Email::where('id',$id)->first();
    	return view('admin.email.email_view')->with(compact('email'));
    }

    public function deleteEmail($id=null){

        Email::where('id',$id)->delete();
      return redirect()->back()->with("success_message","Email has been deleted Successfully!");
    }

}
