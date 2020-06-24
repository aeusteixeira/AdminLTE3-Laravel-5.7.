<?php

namespace App\Http\Controllers;

use App\CommentsCampaignRegisters;
use App\Register;
use Illuminate\Http\Request;

class CommentsCampaignRegistersController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $comment = new CommentsCampaignRegisters;
        $comment->register_id = $request->input('register_id');
        $comment->user_id = $request->input('user_id');
        $comment->description = $request->input('description');

        $register = Register::find($request->input('register_id'));
        $register->user_id = $request->input('user_id');
        $register->save();
        $comment->save();

        return back();
    }

    public function show(CommentsCampaignRegisters $commentsCampaignRegisters)
    {
        //
    }

    public function edit(CommentsCampaignRegisters $commentsCampaignRegisters)
    {
        //
    }

    public function update(Request $request, CommentsCampaignRegisters $commentsCampaignRegisters)
    {
        //
    }

    public function destroy(CommentsCampaignRegisters $commentsCampaignRegisters)
    {
        //
    }
}
