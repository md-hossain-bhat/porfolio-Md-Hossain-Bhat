<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use Session;

class SkillController extends Controller
{
    public function skill(){
        Session::put('page','skill');
       $skills = Skill::select('id','name','persent','status')->orderBy('id', 'DESC')->get();
       return view('admin.skill.skill')->with(compact('skills'));
   }

   

   public function addEditSkill(Request $request, $id=null){
       if ($id=="") {
        Session::put('page','add_skill');
           $name ="Add Skill";
           $skill = new Skill;
           $skilldata = array();
           $getskills = array();
           $message ="Skill Add Successfully!";
       }else{
           $name ="Edit Skill";
           $skilldata = Skill::where('id',$id)->first();
           $getskills = Skill::get();

           $skill = Skill::find($id);
           $message ="Skill Update Successfully!";
       }
       if ($request->isMethod('post')) {
           $data = $request->all();
           // echo "<pre>"; print_r($data); die;
           $rulse = [
               'name' => 'required',
               'persent' => 'required',
           ];

           $customMessage = [
               'name.required' =>'name is required',
               'persent.required' =>'persent is required',
           ];

           $this->validate($request,$rulse,$customMessage);


           $skill->name = $data['name'];
           $skill->persent = $data['persent'];
           $skill->status = 1;
           $skill->save();

           Session::flash('success_message',$message);
           return redirect("admin/skill");
       }

       //404 page 
       /*$countSkill = Skill::where('id',$id)->count();
       if($countSkill == 0){
           return view('admin.404');
       }*/

       return view("admin.skill.add_edit_skill")->with(compact('name','skilldata','getskills'));
   }

   
   public function updateSkillStatus(Request $request){
       if ($request->ajax()) {
           $data = $request->all();
           // echo "<pre>"; print_r($data); die;
           if ($data['status']=="Active") {
               $status = 0;
           }else{
               $status = 1;
           }
           Skill::where('id',$data['skill_id'])->update(['status'=>$status]);
           return response()->json(['status'=>$status,'skill_id'=>$data['skill_id']]);
       }
   }

   
   public function deleteSkill($id=null){
     Skill::where('id',$id)->delete();
     return redirect()->back()->with("success_message","Skill has been deleted Successfully!");
   }
}
