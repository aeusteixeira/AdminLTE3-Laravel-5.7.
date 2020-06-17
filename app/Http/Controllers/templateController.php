<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;

class templateController extends Controller
{

    public function index()
    {
        $templates = Template::all();
        $title = 'Templates';
        return view('painel.templates.index', compact('templates', 'title'));
    }

    public function create()
    {
        $title = 'Criar template';
        return view('painel.templates.create', compact('title'));
    }

    public function store(Request $request)
    {
        $template = new Template();
        $template->name = $request->input('name');
        $template->address = $request->input('address');
        $template->description = $request->input('description');
        $template->save();
        return redirect()->route('admin.templates.index');
    }

    public function show(Template $template)
    {
        //
    }

    public function edit($id)
    {
        $template = Template::find($id);
        if (isset($template)) {
            $title = 'Editar templates';
            return view('painel.templates.edit', compact('template', 'title'));
        } else {
            return redirect()->route('admin.templates.index');
        }
    }

    public function update(Request $request, $id)
    {
        $template = template::find($id);
        if (isset($template)) {
            $template->name = $request->input('name');
            $template->address = $request->input('address');
            $template->description = $request->input('description');
            $template->save();
            return redirect()->route('admin.templates.index');
        }else{
            return redirect()->route('admin.templates.index');
        }
    }

    public function destroy(Template $template)
    {
        //
    }
}
