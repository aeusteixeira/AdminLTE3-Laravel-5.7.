<?php

namespace App\Http\Controllers;
use App\Campaign;
use App\Register;
use App\Layout;
use App\Unit;
use App\Template;
use App\Questions;
use Illuminate\Http\Request;

class CampaignController extends Controller
{

    public function index()
    {
        $campaigns = Campaign::simplePaginate(15);
        return view('painel.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        $units = Unit::all();
        $layouts = Layout::all();
        $templates = Template::all();
        $questions = Questions::all();
        return view('painel.campaigns.create', compact('units', 'layouts', 'templates', 'questions'));
    }

    public function store(Request $request)
    {
        
        $campaign = new Campaign();
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
        $campaign->status = 'active';
        $campaign->save();
        return redirect()->route('campaigns.index');
    }

    public function show($id)
    {
        $campaign = Campaign::with('register')->find($id);
        $layouts = Layout::where('id', $campaign->layout_id)->get();
        return view('painel.campaigns.show', compact('campaign', 'layouts'));
    }

    public function edit($id)
    {
        $units = Unit::all();
        $campaign = Campaign::find($id);
        $layouts = Layout::all();
        $templates = Template::all();
        $questions = Questions::all();
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
