<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Session;
use Image;

class PortfolioController extends Controller
{
    public function portfolio(){
        Session::put('page','portfolio');
    	$portfolios = Portfolio::select('id','title','link','description','image','status')->orderBy('id', 'DESC')->get();
        return view("admin.portfolio.portfolio_list")->with(compact('portfolios'));
    }

    public function addEditPortfolio(Request $request, $id=null){
        if ($id=="") {
            Session::put('page','add_portfolio');
            $name ="Add Portfolio";
            $portfolio = new Portfolio;
            $portfoliodata = array();
            $getPortfolios = array();
            $message ="Portfolio Add Successfully!";
        }else{
            $name ="Edit Portfolio";
            $portfoliodata = Portfolio::where('id',$id)->first();
            $getPortfolios = Portfolio::get();

            $portfolio = Portfolio::find($id);
            $message ="Portfolio Update Successfully!";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
			// echo "<pre>"; print_r($data); die;
            $rulse = [
                'title' => 'required',
                'link' => 'required',
                'image' => 'image',
            ];

            $customMessage = [
                'title.required' =>'title is required',
                'link.required' =>'url is required',
                'image.image' =>'Valid image is required',
            ];

            $this->validate($request,$rulse,$customMessage);

            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'backEnd/images/portfolio/'.$imageName;
                    Image::make($image_temp)->save($imagePath);
                    $portfolio->image = $imageName;
               }
            }

            if (empty($data['description'])) {
                $data['description'] = "";
            }

            $portfolio->title = $data['title'];
            $portfolio->description = $data['description'];
            $portfolio->link = $data['link'];
            $portfolio->status = 1;
            $portfolio->save();

            Session::flash('success_message',$message);
            return redirect("admin/portfolios");
        }
        return view("admin.portfolio.add_edit_portfolio")->with(compact('name','portfoliodata','getPortfolios'));
    }


    public function updatePortfolioStatus(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if ($data['status']=="Active") {
                $status = 0;
            }else{
                $status = 1;
            }
            Portfolio::where('id',$data['porfolio_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'porfolio_id'=>$data['porfolio_id']]);
        }
    }

    public function deletePortfolioImage($id=null){

        $portfolioImage = Portfolio::select('image')->where('id',$id)->first();

        $portfolio_image_path = "backEnd/images/portfolio/";
        if (file_exists($portfolio_image_path.$portfolioImage->image)) {
            unlink($portfolio_image_path.$portfolioImage->image);
        }

        Portfolio::where('id',$id)->update(['image'=>'']);

        return redirect()->back()->with("success_message","Portfolio Image has been deleted Successfully!");
    }

    public function deletePortfolio($id=null){

        $portfolioImage = Portfolio::select('image')->where('id',$id)->first();

        $portfolio_image_path = "backEnd/images/portfolio/";
        if (file_exists($portfolio_image_path.$portfolioImage->image)) {
            unlink($portfolio_image_path.$portfolioImage->image);
        }

        Portfolio::where('id',$id)->delete();

        return redirect()->back()->with("success_message","Portfolio has been deleted Successfully!");
    }
}
