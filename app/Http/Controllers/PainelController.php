<?php

namespace App\Http\Controllers;

use App\Divulgation;
use App\Message;
use App\Post;
use App\Register;
use App\Support;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    $update = Support::orderBy('id', 'desc')->first();

    if(
        Auth::user()->level->administrator == 1
        OR
        Auth::user()->level->marketing == 1
        OR
        Auth::user()->level->administrative == 1)
    {
        $admin = true;
        // Ultimos cadastros de Nova Iguaçu
        $registersLastNVG = Register::where('unit_id', '1')->where('created_at', '>=', Carbon::now()->subDay())->count();

        // Ultimos cadastros de Santa Cruz
        $registersLastSTC = Register::where('unit_id', '2')->where('created_at', '>=', Carbon::now()->subDay())->count();

        // Ultimos cadastros de Bonsucesso
        $registersLastBONS = Register::where('unit_id', '7')->where('created_at', '>=', Carbon::now()->subDay())->count();

        //========================================================================================================//

        // Cadastros de Nova Iguaçu
        $registerAllNVG = Register::where('unit_id', '1')->count();

        // Cadastros de Santa Cruz
        $registerAllSTC = Register::where('unit_id', '2')->count();

        // Cadastros de Bonsucesso
        $registerAllBONSS = Register::where('unit_id', '7')->count();


        return view('painel.index', compact('title','update', 'message', 'trainings', 'information', 'divulgation',
        'admin',
        'registersLastNVG', 'registersLastSTC', 'registersLastBONS',
        'registerAllNVG', 'registerAllSTC', 'registerAllBONSS'));
    }else{
        $admin = false;
        return view('painel.index', compact('title','update', 'message', 'trainings', 'information', 'divulgation', 'admin'));
    }
}
}
