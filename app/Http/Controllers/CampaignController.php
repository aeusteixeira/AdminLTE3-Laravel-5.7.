<?php

namespace App\Http\Controllers;
use App\Campaign;
use App\Layout;
use App\Template;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{

    public function index()
    {
        $campaigns = Campaign::simplePaginate(15);
        $title = 'Camapanhas';
        return view('painel.campaigns.index', compact('campaigns', 'title'));
    }

    public function create()
    {
        $title = 'Criar campanha';
        $layouts = Layout::all();
        $templates = Template::all();
        $units = Unit::all();
        return view('painel.campaigns.create', compact('title', 'layouts', 'templates', 'units'));
    }

    public function store(Request $request)
    {
        $campaign = new Campaign();

        $slug = strtolower($request->input('name_public'));
        $slug = str_replace(' ', '-', $slug);
        $default_whatsapp_message = str_replace(' ', '%20', $request->input('default_whatsapp_message'));

        $campaign->name_private = $request->input('name_private');
        $campaign->description_private = $request->input('description_private');

        $campaign->name_public = $request->input('name_public');
        $campaign->information_public = $request->input('information_public');

        $campaign->slug = $slug;
        $campaign->default_whatsapp_message = $default_whatsapp_message;
        $campaign->unit_id = $request->input('unit_id');
        $campaign->layout_id = $request->input('layout_id');
        $campaign->user_id = $request->input('user_id');
        $campaign->template_id = $request->input('template_id');
        $campaign->status = 'active';
        $campaign->save();
        return redirect()->route('mkt.campaigns.index');
    }

    public function show($id)
    {
        $campaign = Campaign::find($id);
        if(
            Auth::user()->level->administrator == 1
            OR
            Auth::user()->level->marketing == 1
            OR
            Auth::user()->level->administrative == 1){
            $campaign->setRelation('register', $campaign->register()->paginate(20));
        }elseif(Auth::user()->level->sales == 1){
            $campaign->setRelation('register', $campaign->register()->where('slot', Auth::user()->slot )->paginate(20));
        }

        $title = 'Detalhes da campanha';
        //dd($campaign);
        //$layouts = Layout::where('id', $campaign->layout_id)->get();
        return view('painel.campaigns.show', compact('campaign', 'title'));
    }

    public function edit($id)
    {
        $title = 'Editar campanha';
        $units = Unit::all();
        $campaign = Campaign::find($id);
        $layouts = Layout::all();
        $templates = Template::all();
        if (isset($campaign)) {
            return view('painel.campaigns.edit', compact('campaign', 'units', 'layouts', 'templates','title'));
        } else {
            return redirect()->route('campaigns.index');
        }
    }

    public function update(Request $request, $id)
    {
        $campaign = Campaign::find($id);
        if (isset($campaign)) {
            $slug = str_slug($request->input('name_public'));
            $slug = $slug;
            $default_whatsapp_message = str_replace(' ', '%20', $request->input('default_whatsapp_message'));

            $campaign->name_private = $request->input('name_private');
            $campaign->description_private = $request->input('description_private');

            $campaign->name_public = $request->input('name_public');
            $campaign->information_public = $request->input('information_public');

            $campaign->slug = $slug;
            $campaign->default_whatsapp_message = $default_whatsapp_message;
            $campaign->default_email_message = $request->input('default_email_message');
            $campaign->unit_id = $request->input('unit_id');
            $campaign->layout_id = $request->input('layout_id');
            $campaign->template_id = $request->input('template_id');
            $campaign->status = $request->input('status');
            $campaign->save();
            return redirect()->route('mkt.campaigns.index');
        }else{
            return redirect()->route('units.index');
        }
    }

    public function destroy($id)
    {
        //
    }

    // Esta função retorna a visualização de forma pública de uma campanha
    public function view($slug)
    {
        $campaign = Campaign::where('slug', $slug)->first();
        $views = $campaign->views;
        $campaign->views = $views + 1;
        $campaign->save();
        $units = Unit::all();
        return view('painel.templates.public.'.$campaign->template->address, compact('campaign', 'units'));
        //return $layout->name;
    }

}
