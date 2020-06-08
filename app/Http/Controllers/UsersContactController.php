<?php

namespace App\Http\Controllers;

use App\UsersContact;
use Illuminate\Http\Request;

class UsersContactController extends Controller
{
    public function index()
    {
        $users = UsersContact::with('unit')->get();
        return view('painel.contact.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(UsersContact $usersContact)
    {
        //
    }

    public function edit(UsersContact $usersContact)
    {
        //
    }

    public function update(Request $request, UsersContact $usersContact)
    {
        //
    }

    public function destroy(UsersContact $usersContact)
    {
        //
    }
}
