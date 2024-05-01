<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){

        $user=session()->get('user');
                $id=$user['id'];

        $words=DB::table('word_knows')
        ->where('user_id','=',$id)
        ->join('words', 'word_knows.word_id','=','words.word_id')
        ->select('russia','china')
        ->get();

        $tests=DB::table('test_saves')
        ->where('user_id','=',$id)
        ->select('true_answers','quantity')
        ->get();
        // dd($words->toArray());
        return view('user.index',compact('words','tests'));
    }

    public function logout()
    {
        auth("web")->logout();
        session()->flush();

        return redirect(route("login"));
    }

   
}
