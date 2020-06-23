<?php

namespace App\Http\Controllers;

use App\Divulgation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DivulgationController extends Controller
{
    public function divulgations()
    {
        $title = 'Divulgação';
        $divulgations = Divulgation::all();
        return view('painel.divulgation.divulgations', compact('title', 'divulgations'));
    }

    public function index()
    {
        $title = 'Divulgação';
        $divulgations = Divulgation::all();
        return view('painel.divulgation.index', compact('title', 'divulgations'));
    }

    public function create()
    {
        $title = 'Criar divulgação';
        return view('painel.divulgation.create', compact('title'));
    }

    public function download($id){
        $divulgation = Divulgation::find($id);
        return Storage::download($divulgation->banner);
    }

    public function store(Request $request)
    {
        $divulgation = new Divulgation();
        $divulgation->name = $request->input('name');
        $divulgation->description = $request->input('description');
        $divulgation->banner = $request->file('banner')->store('public/divulgations');
        $divulgation->save();
        return redirect()->route('admin.divulgation.index');
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
