<?php

namespace App\Http\Controllers;

use App\Attributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AttributesController extends Controller
{

    public function update(Request $request)
    {

        if($attr = Attributes::where('user_id', Auth::user()->id)->first()){

            if($attr->photo != null){
                $attr->about = $request->input('about');
                $attr->experience = $request->input('experience');
                $attr->education = $request->input('education');
                $attr->local = $request->input('local');
                $attr->skills = $request->input('skills');
                $attr->save();
                return redirect()->route('perfil');
            }else{

                $attr->photo = $request->file('photo')->store('public/users_profile');
                $attr->about = $request->input('about');
                $attr->experience = $request->input('experience');
                $attr->education = $request->input('education');
                $attr->local = $request->input('local');
                $attr->skills = $request->input('skills');
                $attr->save();
                return redirect()->route('perfil');
            }

        }else{
            $attr = new Attributes();
            $attr->user_id = Auth::user()->id;
            $attr->photo = $request->file('photo')->store('public/users_profile');
            $attr->about = $request->input('about');
            $attr->experience = $request->input('experience');
            $attr->education = $request->input('education');
            $attr->local = $request->input('local');
            $attr->skills = $request->input('skills');
            $attr->save();
            return redirect()->route('perfil');
        }


    }

}
