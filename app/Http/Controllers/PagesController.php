<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function index(){
        $postquestion = DB::table('post')->get();
        $data=array(
            'title'=>'Home-QuoRi',
            'question'=>$postquestion,
            'created_at'=>$postquestion
        );
        
        return view('src.home')->with($data);
    }

    public function show($id){
        $question=DB::table('post')->where('id',$id)->first();
        $title='Post-QuoRi';

        $answers=DB::table('answers')->get();
        return view('src.post', compact('title','question','answers'));
    }


    public function store(Request $request){
        $validateData=$request->validate([
            'question'=>'required'
        ]);

        $res = DB::table('post')->insert([
            "question"=>$request->question,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now()
        ]);

        return redirect('/home')->with('success','Your Question Successfully Inputed');
    }
}
