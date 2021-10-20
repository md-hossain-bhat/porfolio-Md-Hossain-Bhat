<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Skill;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $emails = Email::select('id')->get();
        $portfolios = Portfolio::select('id')->get();
        $services = Service::select('id')->get();
        $skills = Skill::select('id')->get();
        return view('home')->with(compact('emails','portfolios','services','skills'));
    }
}
