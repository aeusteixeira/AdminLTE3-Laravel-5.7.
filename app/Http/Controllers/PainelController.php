<?php

namespace App\Http\Controllers;

use App\Divulgation;
use App\Message;
use App\Post;
use Illuminate\Http\Request;

class PainelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Dashboard';
        $divulgation = Divulgation::count();
        $trainings = Post::where('type', '0')->get()->count();
        $information = Post::where('type', '1')->get()->count();
        $message = Message::find(1)->first();
        return view('painel.index', compact('title', 'message', 'trainings', 'information', 'divulgation'));
    }
}
