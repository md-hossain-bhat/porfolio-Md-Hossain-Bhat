<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Logo;
use App\Models\Testimonial;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Contact;
use App\Models\About;
use App\Models\Email;
use App\Models\Skill;
use Session;
class FrontEndController extends Controller
{
    public function index(){
        $logos = Logo::where('status',1)->get();
    	$testimonials = Testimonial::where('status',1)->get();
    	$services = Service::where('status',1)->get();
    	$contacts = Contact::get();
    	$about = About::first();
    	$portfolios = Portfolio::where('status',1)->get();
        $skills= Skill::where('status',1)->get();
        return view("front.index")->with(compact('logos','testimonials','services','portfolios','contacts','about','skills'));
    }

    public function sendEmail(Request $request){
        if($request ->isMethod('post')){
        $data = $request->all();
        //  echo "<pre>"; print_r($data); die;
        $rulse = [
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];

        $customMessage = [
            'name.required' =>'name is required',
            'subject.required' =>'subject is required',
            'email.required' =>'email is required',
            'email.email' =>'valid email is required',
            'message.required' =>'message is required',
        ];

        $this->validate($request,$rulse,$customMessage);

        $send = new Email;
        $send->name = $data['name'];
        $send->subject = $data['subject'];
        $send->email = $data['email'];
        $send->message = $data['message'];
        $send->save();

        // Send Contact Email
        $email = "hossainbhat25@gmail.com";
        $messageData = [
            'name'=>$data['name'],
            'subject'=>$data['subject'],
            'email'=>$data['email'],
            'comment'=>$data['message']
        ];
        Mail::send('emails.enquiry',$messageData,function($message)use($email){
            $message->to($email)->subject('Enquiry from My Portfolio');
        });
        return redirect()->back();
        
        
        }
    // return view('index');
    }
}
