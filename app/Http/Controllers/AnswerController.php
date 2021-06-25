<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnswerController extends Controller
{
    public function store(Request $request){
        $validateData=$request->validate([
            'answer'=>'required',
            'question_id'=>'required'
        ]);
        
        // $answere=$request->answer;
        $res = DB::table('answers')->insert([
            "answers"=>$request->answer,
            "question_id"=>$request->question_id,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);

        $title='Post-QuoRi';
        $question=DB::table('post')->where('id',$request->question_id)->first();
        $answers=DB::table('answers')->get();
        
        // return redirect('PagesController@show')->with('question_id');
        return view('src.post', compact('title', 'question','answers'));
        // return $request->question;
        // return $request->question_id;
        // return $request->answer;
    }
}
