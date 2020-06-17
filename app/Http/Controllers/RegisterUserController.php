<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\Campaign;
use App\CampaignRegister;
use App\Unit;
use Illuminate\Support\Facades\Mail;
use App\Mail\newMailPainel;
use App\CommentsCampaignRegisters;

class RegisterUserController extends Controller
{

public function index()
{
    //
}

public function create()
{
    //
}

public function store(Request $request)
{

    $register = new Register;
    $campaignRegister = new CampaignRegister;

    if ($id = $register->where('email', $request->input('email'))->first('id')) {
        if($data = $campaignRegister->where('register_id', $id->id)->get()){

        foreach ($data as $key => $value) {
            if ($value->campaign_id == $request->input('campaign_id')) {
                return redirect()->back()->with('status', 'Ops! Parece que você já se cadastrou!');
            }
        }

        }
        $campaignRegister->register_id = $id->id;
        $campaignRegister->campaign_id = $request->input('campaign_id');
        $campaignRegister->save();

    }else{
        $register->name = $request->input('name');
        $register->email = $request->input('email');
        $register->age = $request->input('age');
        $register->telephone = $request->input('telephone');
        $register->telephone2 = $request->input('telephone2');
        $register->unit_id = $request->input('unit_id');
        $register->status_workshop_payment = $request->input('status_workshop_payment');
        $register->date_workshop_payment = $request->input('date_workshop_payment');
        $register->personal_interests = $request->input('personal_interests');
        $register->description = $request->input('description');

        if($register->save()){
            $campaignRegister->register_id = $register->id;
            $campaignRegister->campaign_id = $request->input('campaign_id');
            $campaignRegister->save();
        }

    }

    Mail::send('Html.view', $data, function ($message) {
        $message->from('john@johndoe.com', 'John Doe');
        $message->sender('john@johndoe.com', 'John Doe');
        $message->to('john@johndoe.com', 'John Doe');
        $message->cc('john@johndoe.com', 'John Doe');
        $message->bcc('john@johndoe.com', 'John Doe');
        $message->replyTo('john@johndoe.com', 'John Doe');
        $message->subject('Subject');
        $message->priority(3);
        $message->attach('pathToFile');
    });

    return redirect()->back()->with('status', 'Recebemos o seu cadastro! Em breve entraremos em contato');

}



public function show($id)
{
    $register = Register::with('campaign', 'unit', 'comments')->find($id);
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
    $register->status_workshop_payment = $request->input('status_workshop_payment');
    $register->date_workshop_payment = $request->input('date_workshop_payment');
    $register->unit_id = $request->input('unit_id');
    $register->email = $request->input('email');
    $register->telephone = $request->input('telephone');
    if($register->save()){
        return back()->withInput();
    }

}

public function destroy($id)
{
    //
}

}
