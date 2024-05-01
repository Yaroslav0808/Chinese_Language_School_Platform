<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){

        

        return view('login.index');
    }

    public function store(Request $request){

        $data = $request->validate([
            "email"=>["required","email","string"],
            "password"=>["required"]
        ]);
        
        if (auth("web")->attempt($data)) 
        {
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
    // return view('user.index',compact('words','tests'));


            return redirect(route("user",['words'=>$words,'tests'=>$tests]));
        }



        
        return redirect(route("login"))->withErrors(["email"=> "Пользователь не найден"]);

    }
}

