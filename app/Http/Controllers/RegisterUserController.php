<?php

namespace App\Http\Controllers;

use App\Exports\RegistersExport;
use App\Imports\RegistersImport;
use App\Mail\EmailByUserFromRegister;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Register;
use App\Campaign;
use App\CampaignRegister;
use App\Unit;
use Illuminate\Support\Facades\Mail;
use App\Mail\newRegisterOnCampaign;
use App\CommentsCampaignRegisters;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{

public function index()
{
    //
}

public function myCalls(){
    $title = 'Meus leads';
    return view('painel.users.my-leads', compact('title'));
}

public function create()
{
    //
}

public function store(Request $request)
{

    $register = new Register;
    $campaignRegister = new CampaignRegister;
    $campaign = Campaign::find($request->input('campaign_id'));

    /**/
    if ($id = $register->where('email', $request->input('email'))->first()) {
        if($data = $campaignRegister->where('register_id', $id->id)->get()){

        $id->view = 0;
        $id->save();

        foreach ($data as $key => $value) {
            if ($value->campaign_id == $request->input('campaign_id')) {
                return redirect()->back()->with('status', 'Ops! Parece que você já se cadastrou!');
            }
        }

        }

        $campaignRegister->register_id = $id->id;
        $campaignRegister->campaign_id = $request->input('campaign_id');
        $campaignRegister->save();

        $register = Register::find($id->id);

        Mail::send(new newRegisterOnCampaign($register, $campaign));

    }else{
        $register->name = $request->input('name');
        $register->email = $request->input('email');
        $register->telephone = $request->input('telephone');
        $register->city = $request->input('city');
        $register->district = $request->input('district');
        $register->unit_id = $request->input('unit_id');
        $register->courses = implode(', ', $request->input('course'));
        $register->slot = rand(1, 5);
        $register->view = 0;

        if($register->save()){
            $campaignRegister->register_id = $register->id;
            $campaignRegister->campaign_id = $request->input('campaign_id');
            $campaignRegister->save();
        }

    }

    Mail::send(new newRegisterOnCampaign($register, $campaign));

    if($campaign->redirect == 1){
        return redirect($campaign->redirectTo);
    }

    return redirect()->back()->with('status', 'Recebemos o seu cadastro! Em breve entraremos em contato');

}



public function show($id)
{
    $register = Register::with('campaign', 'unit', 'comments')->find($id);
    if($register->view == 0){
        $register->view = 1;
        $register->save();
    }
    //$comments = CommentsCampaignRegisters::where('register_id', $id)->get();
    $units = Unit::all();
    $title = 'Detalhes';
    return view('painel.registers.show', compact('register', 'title'));
}

public function edit($id)
{
    //
}

public function update(Request $request, $id)
{
    $register = Register::find($id);
    $register->name = $request->input('name');
    $register->unit_id = $request->input('unit_id');
    $register->email = $request->input('email');
    //$register->telephone = $request->input('telephone');
    if($register->save()){
        return back()->withInput();
    }

}

public function destroy($id)
{
    //
}

public function exportAll(Request $request)
{
    $campaign_id = $request->input('campaign_id');
    $unit_id = $request->input('unit_id');

    $campaign_name = $request->input('campaign_name');
    $unit_name = Unit::select('name')->where('id', $request->input('unit_id'))->first();
    $name_return = $campaign_name.' - '.$unit_name->name.'.xlsx';
    return Excel::download(new RegistersExport($campaign_id, $unit_id), $name_return);
}

public function importAll(Request $request){
    $campaign_id = $request->input('campaign_id');
    $unit_id = $request->input('unit_id');

    $import = Excel::import(new RegistersImport($campaign_id, $unit_id), $request->file('file_excel'));
    return redirect()->back()->with('status', 'Dados importados com sucesso.');
}

public function notifications(){
    $notifications = Register::where('view', '0')->paginate(10);
    $title = $notifications->count().' notificações em cada página';
    return view('painel.registers.notifications', compact('title', 'notifications'));
}

public function sendEmail(Request $request){
    $title = $request->input('title');
    $message = $request->input('message');
    $register = Register::find($request->input('register_id'));

    Mail::send(new EmailByUserFromRegister($title, $message, $register));

    $comment = new CommentsCampaignRegisters();
    $comment->register_id = $request->input('register_id');
    $comment->user_id = Auth::user()->id;
    $comment->description = '[E-MAIL] '.$message;
    $comment->save();

    return redirect()->back()->with('status', 'E-mail enviado com sucesso.');
}

}
