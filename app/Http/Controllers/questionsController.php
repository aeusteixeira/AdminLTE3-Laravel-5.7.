<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;

class questionsController extends Controller
{

    public function index()
    {
        $questions = Questions::all();
        return view('painel.questions.index', compact('questions'));
    }

    public function create()
    {
        return view('painel.questions.create');
    }

    public function store(Request $request)
    {
        $questions = new Questions();
        $questions->name = $request->input('name');
        $questions->description = $request->input('description');
        $questions->question1 = $request->input('question1');
        $questions->question2 = $request->input('question2');
        $questions->question3 = $request->input('question3');
        $questions->question4 = $request->input('question4');
        $questions->question5 = $request->input('question5');
        $questions->question6 = $request->input('question6');
        $questions->question7 = $request->input('question7');
        $questions->question8 = $request->input('question8');
        $questions->question9 = $request->input('question9');
        $questions->question10 = $request->input('question10');
        $questions->save();
        return redirect()->route('questions.index');
    }

    public function show(questions $questions)
    {
        //
    }

    public function edit(questions $questions)
    {
        //
    }

    public function update(Request $request, questions $questions)
    {
        //
    }

    public function destroy(questions $questions)
    {
        //
    }
}
