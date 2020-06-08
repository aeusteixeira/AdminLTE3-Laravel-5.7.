<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\Notes;
use App\Campaign;
use App\CommentsCampaignRegisters;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $registers = Register::count();
        $campaign = Campaign::count();
        $followups = CommentsCampaignRegisters::count();
        //$notes = Notes::where('user_id', Auth::user()->id)->first();
        //$newRegisters = DB::table('registers')->where('unit_id', Auth::user()->unit_id)->count();

        //Quantidade de registros por unidade
        $registersNVG = DB::table('registers')->where('unit_id', 1)->count();
        $registersSTC = DB::table('registers')->where('unit_id', 2)->count();
        $registersSJM = DB::table('registers')->where('unit_id', 3)->count();
        $registersVIT = DB::table('registers')->where('unit_id', 4)->count();

        return view('home', compact('registers', 'followups', 'campaign', 
        'registersNVG', 
        'registersSTC',
        'registersSJM',
        'registersVIT'));
        //return $notes;
    }
}
