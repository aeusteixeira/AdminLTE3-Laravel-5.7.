<?php

namespace App\Http\Controllers;
use App\Campaign;
use App\Layout;
use App\Template;
use App\Unit;
use Illuminate\Http\Request;

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
        $campaign->setRelation('register', $campaign->register()->paginate(10));

        $title = 'Detalhes da campanha';
        //dd($campaign);
        //$layouts = Layout::where('id', $campaign->layout_id)->get();
        return view('painel.campaigns.show', compact('campaign', 'title'));
    }

    public function edit($id)
    {
        $units = Unit::all();
        $campaign = Campaign::find($id);
        $layouts = Layout::all();
        $templates = Template::all();
        if (isset($campaign)) {
            return view('painel.campaigns.edit', compact('campaign', 'units', 'layouts', 'templates','questions'));
        } else {
            return redirect()->route('campaigns.index');
        }
    }

    public function update(Request $request, $id)
    {
        $campaign = Campaign::find($id);
        if (isset($campaign)) {
            $campaign->name = $request->input('name');
            $campaign->information = $request->input('information');
            $campaign->description = $request->input('description');
            $campaign->namePublic = $request->input('namePublic');
                $url = strtolower($request->input('namePublic'));
                $url = str_replace(' ', '-', $url);
                $default_message = str_replace(' ', '%20', $request->input('default_message'));
            $campaign->url = $url;
            $campaign->default_message = $default_message;
            $campaign->unit_id = $request->input('unit_id');
            $campaign->layout_id = $request->input('layout_id');
            $campaign->template_id = $request->input('template_id');
            $campaign->question_id = $request->input('question_id');
            $campaign->img1 = $request->input('img1');
            $campaign->img2 = $request->input('img2');
            $campaign->img3 = $request->input('img3');
            $campaign->img4 = $request->input('img4');
            $campaign->img5 = $request->input('img5');
            $campaign->status = $request->input('status');
            $campaign->save();
            return redirect()->route('campaigns.index');
        }else{
            return redirect()->route('units.index');
        }
    }

    public function destroy($id)
    {
        //
    }

    // Esta fun��o retorna a visualiza��o de forma p�blica de uma campanha
    public function view($url)
    {
        $campaign = Campaign::where('url', $url)->first();
        $layout = Layout::where('id', $campaign->layout_id)->first();
        $template = Template::where('id', $campaign->template_id)->first();
        return view($template->address, compact('campaign', 'layout'));
        //return $layout->name;
    }

}
