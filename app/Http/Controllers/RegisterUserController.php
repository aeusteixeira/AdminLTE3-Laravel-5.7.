<?php

namespace App\Http\Controllers;

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

public function myLeads(){
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
        $register->slot = rand(1, 5);

        if($register->save()){
            $campaignRegister->register_id = $register->id;
            $campaignRegister->campaign_id = $request->input('campaign_id');
            $campaignRegister->save();
        }

    }
    Mail::send(new newRegisterOnCampaign($register, $campaign));
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

public function sendEmail(){
    $register = Register::find(1005);
    $campaign = Campaign::find(1);
    Mail::send(new newRegisterOnCampaign($register, $campaign));
}

}
