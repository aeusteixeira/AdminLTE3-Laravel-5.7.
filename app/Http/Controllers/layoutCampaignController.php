<?php

namespace App\Http\Controllers;

use App\Layout;
use App\Template;
use Illuminate\Http\Request;

class layoutCampaignController extends Controller
{

    public function index()
    {
        $layouts = Layout::simplePaginate(15);
        $title = 'Layouts';
        return view('painel.layouts.index', compact('layouts', 'title'));
    }

    public function create()
    {
        $templates = Template::all();
        $title = 'Criar layout';
        return view('painel.layouts.create', compact('templates', 'title'));
    }

    public function store(Request $request)
    {
        $layout = new Layout();

        $layout->name = $request->input('name');

        //Public
        $layout->name_input = $request->input('name_input');
        $layout->email_input = $request->input('email_input');
        $layout->telephone_input = $request->input('telephone_input');
        $layout->unit_input = $request->input('unit_input');
        $layout->city_input = $request->input('city_input');
        $layout->courses_input = $request->input('courses_input');
        $layout->district_input = $request->input('district_input');

        $layout->save();
        return redirect()->route('admin.layouts.index');
    }

    public function show(Layout $layout)
    {
        //
    }

    public function edit($id)
    {
        $layout = Layout::find($id);
        if (isset($layout)) {
            $title = 'Editar layout';
            return view('painel.layouts.edit', compact('layout', 'title'));
        } else {
            return redirect()->route('admin.layouts.index');
        }
    }

    public function update(Request $request, $id)
    {
        $layout = layout::find($id);
        if (isset($layout)) {
            $layout->name = $request->input('name');

            //Public
            $layout->name_input = $request->input('name_input');
            $layout->email_input = $request->input('email_input');
            $layout->telephone_input = $request->input('telephone_input');
            $layout->unit_input = $request->input('unit_input');
            $layout->city_input = $request->input('city_input');
            $layout->courses_input = $request->input('courses_input');
            $layout->district_input = $request->input('district_input');
            $layout->save();
            return redirect()->route('admin.layouts.index');
        }else{
            return redirect()->route('admin.layouts.index');
        }
    }

    public function destroy(Layout $layout)
    {
        //
    }
}
