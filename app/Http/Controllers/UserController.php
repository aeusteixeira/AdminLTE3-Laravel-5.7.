<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Unit;
use App\Level;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function me()
    {
        $title = 'Meu perfil';
        $user = User::find(Auth::user()->id);
        return view('painel.users.me', compact('title', 'user'));
    }

    public function index()
    {
        $title = 'Usuários';
        $users = User::with('level', 'unit')->get();
        return view('painel.users.index', compact('users', 'title'));
    }

    public function create()
    {
        $title = 'Criar usuário';
        $units = Unit::all();
        $levels = Level::all();
        return view('painel.users.create', compact('units', 'levels', 'title'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->telephone = $request->input('telephone');
        $user->CPF = $request->input('CPF');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->unit_id = $request->input('unit_id');
        $user->level_id = $request->input('level_id');
        $user->slot = rand(1, 5);
        $user->save();

        //$user->create($request->except(['_token']));
        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $title = 'Editar usuário';
        $user = User::find($id);
        $units = Unit::all();
        $levels = Level::all();
        if (isset($user)) {
            return view('painel.users.edit', compact('user', 'units', 'levels', 'title'));
        } else {
            return redirect()->route('admin.user.index');
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(isset($user)){

            $user->name = $request->input('name');
            $user->telephone = $request->input('telephone');
            $user->CPF = $request->input('CPF');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->unit_id = $request->input('unit_id');
            $user->level_id = $request->input('level_id');
            $user->slot = rand(1, 5);
            $user->save();

            //$user->update($request->except(['_token']));
            return redirect()->route('admin.users.index');
        }else{
            return redirect()->route('admin.users.index');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if(isset($user)){
            $user = User::destroy($id);
            return redirect()->route('admin.users.index');
        }else{
            return redirect()->route('admin.users.index');
        }

    }
}
