<?php

namespace App\Http\Controllers;

use App\Divulgation;
use Illuminate\Http\Request;

class DivulgationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Divulgação';
        return view('painel.divulgation.index', compact('title'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Divulgation $divulgation)
    {
        //
    }

    public function edit(Divulgation $divulgation)
    {
        //
    }

    public function update(Request $request, Divulgation $divulgation)
    {
        //
    }

    public function destroy(Divulgation $divulgation)
    {
        //
    }
}
