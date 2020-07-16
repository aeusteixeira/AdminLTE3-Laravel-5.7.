<?php

namespace App\Http\Controllers;

use App\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function index()
    {
        $title = 'Suporte/Contato';
        $updates = Support::orderBy('created_at', 'DESC')->get();
        return view('painel.support.index', compact('title', 'updates'));
    }

    public function create()
    {
        $title = 'Adicionar atualização';
        return view('painel.support.create', compact('title'));
    }

    public function store(Request $request)
    {
        $update = new Support();
        $update->version = $request->input('version');
        $update->content = $request->input('content');
        $update->save();
        return redirect()->route('dashboard.support.index');
    }

    public function show(Support $suport)
    {

    }

    public function edit(Support $suport)
    {
        //
    }

    public function update(Request $request, Support $suport)
    {
        //
    }


    public function destroy(Support $suport)
    {
        //
    }
}
