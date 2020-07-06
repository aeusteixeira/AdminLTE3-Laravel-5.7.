<?php

namespace App\Http\Controllers;

use App\Register;
use App\User;
use App\CommentsCampaignRegisters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccompanimentController extends Controller
{

    public function index()
    {
        if(
            Auth::user()->level->administrator == 1
            OR
            Auth::user()->level->marketing == 1
            OR
            Auth::user()->level->administrative == 1){
                $accompaniments = User::with('comments')->get();
            }elseif(Auth::user()->level->sales_manager == 1){
                $accompaniments = User::with('comments')->where('unit_id', Auth::user()->unit_id)->get();
            }

        $title = 'Acompanhamento';
        return view('painel.accompaniment.index', compact('title', 'accompaniments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
