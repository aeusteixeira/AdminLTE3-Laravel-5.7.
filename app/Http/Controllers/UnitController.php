<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitController extends Controller
{

    public function index()
    {
        $units = Unit::all();
        $title = 'Unidades';
        return view('painel.units.index', compact('admin.units', 'title'));
    }

    public function create()
    {
        $title = 'Criar unidade';
        return view('painel.units.create', compact('title'));
    }

    public function store(Request $request)
    {
        $unit = new Unit();
        $unit->name = $request->input('name');
        $unit->description = $request->input('description');
        $unit->save();
        return redirect()->route('admin.units.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        if (isset($unit)) {
            $title = 'Editar unidade';
            return view('painel.units.edit', compact('unit', 'title'));
        } else {
            return redirect()->route('admin.units.index');
        }
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::find($id);
        if (isset($unit)) {
            $unit->name = $request->input('name');
            $unit->description = $request->input('description');
            $unit->save();
            return redirect()->route('admin.units.index');
        }else{
            return redirect()->route('admin.units.index');
        }
    }

    public function destroy($id)
    {
        //
    }
}
