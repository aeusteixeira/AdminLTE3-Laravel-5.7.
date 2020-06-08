<?php

namespace App\Http\Controllers;

use App\CommentsCampaignRegisters;
use Illuminate\Http\Request;

class CommentsCampaignRegistersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new CommentsCampaignRegisters;
        $comment->register_id = $request->input('register_id');
        $comment->name = $request->input('name');
        $comment->description = $request->input('description');
        $comment->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommentsCampaignRegisters  $commentsCampaignRegisters
     * @return \Illuminate\Http\Response
     */
    public function show(CommentsCampaignRegisters $commentsCampaignRegisters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommentsCampaignRegisters  $commentsCampaignRegisters
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentsCampaignRegisters $commentsCampaignRegisters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommentsCampaignRegisters  $commentsCampaignRegisters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommentsCampaignRegisters $commentsCampaignRegisters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommentsCampaignRegisters  $commentsCampaignRegisters
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentsCampaignRegisters $commentsCampaignRegisters)
    {
        //
    }
}
