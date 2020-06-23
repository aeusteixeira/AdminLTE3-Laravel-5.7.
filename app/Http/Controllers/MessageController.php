<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{


    public function show(Message $message)
    {
        $title = 'Recado';
        return view('painel.message.edit', compact('message', 'title'));
    }

    public function update(Request $request, Message $message)
    {
        $message->title = $request->input('title');
        $message->user_id = Auth::user()->id;
        $message->description = $request->input('description');
        $message->save();
        return redirect()->route('dashboard.index');
    }

}
