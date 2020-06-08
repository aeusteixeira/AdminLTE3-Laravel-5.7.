<?php

namespace App\Http\Controllers;

use App\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{


    public function store(Request $request)
    {
        $note = new Notes();
        $note = Notes::updateOrCreate([
        'user_id' => $request->input('user_id')
    ],
    [
        'description' => $request->input('description')
    ]);

        return back()->withInput();
    }

}
