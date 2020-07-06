<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Níveis de acesso';
        $levels = Level::simplePaginate(15);
        return view('painel.levels.index', compact('levels', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Criar nível';
        return view('painel.levels.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $level = new Level();
        if($request->input('administrator') == 1){
            $level->name = $request->input('name');
            $level->description = $request->input('description');
            $level->administrator = $request->input('administrator');
            $level->save();
        }else{
            $level->create($request->except(['_token']));
        }
        return redirect()->route('admin.levels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Editar nível';
        $level = Level::find($id);
        if (isset($level)) {
            return view('painel.levels.edit', compact('level', 'title'));
        } else {
            return redirect()->route('admin.levels.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $level = Level::find($id);
        if (isset($level)) {
            if($request->input('administrator') == 1){
                $level->name = $request->input('name');
                $level->description = $request->input('description');
                $level->administrator = $request->input('administrator');
                $level->save();
            }else{
                $level->name = $request->input('name');
                $level->description = $request->input('description');

                // User
                $level->marketing = $request->input('marketing');
                $level->sales = $request->input('sales');
                $level->sales_manager = $request->input('sales_manager');
                $level->administrative = $request->input('administrative');
                $level->units = $request->input('units');

                // User
                $level->create_user = $request->input('create_user');
                $level->update_user = $request->input('update_user');
                $level->delete_user = $request->input('delete_user');

                //Register
                $level->create_register = $request->input('create_register');
                $level->update_register = $request->input('update_register');
                $level->delete_register = $request->input('delete_register');

                //Level
                $level->create_level = $request->input('create_level');
                $level->update_level = $request->input('update_level');
                $level->delete_level = $request->input('delete_level');

                //Unit
                $level->create_unit = $request->input('create_unit');
                $level->update_unit = $request->input('update_unit');
                $level->delete_unit = $request->input('delete_unit');

                //Layouts
                $level->create_layout = $request->input('create_layout');
                $level->update_layout = $request->input('update_layout');
                $level->delete_layout = $request->input('delete_layout');

                //Campaign
                $level->create_campaign = $request->input('create_campaign');
                $level->update_campaign = $request->input('update_campaign');
                $level->delete_campaign = $request->input('delete_campaign');

                //Email
                $level->create_email = $request->input('create_email');
                $level->delete_email = $request->input('delete_email');

                //Post
                $level->create_post = $request->input('create_post');
                $level->update_post = $request->input('update_post');
                $level->delete_post = $request->input('delete_post');

                //Messages
                $level->create_message = $request->input('create_message');
                $level->update_message = $request->input('update_message');
                $level->delete_message = $request->input('delete_message');

                //Spreadsheet
                $level->spreadsheet_generate = $request->input('spreadsheet_generate');
                $level->spreadsheet_import = $request->input('spreadsheet_import');

                //PrintScreen and Printer
                $level->print_screen = $request->input('print_screen');
                $level->printer = $request->input('printer');

                //Administrator
                //$level->administrator = $request->input('administrator');
            }

            $level->save();
            return redirect()->route('admin.levels.index');
        } else {
            return redirect()->route('admin.levels.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
