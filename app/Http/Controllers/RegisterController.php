<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Word_No_Know;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index(){

        return view('register.index');
    }

    public function store(Request $request){

        $data = $request->validate([
            "name" => ["required", "string"],
            "email"=>["required","email","string","unique:users"],
            "password"=>["required","confirmed"]
        ]);
        // $validated = $request->validated();
        // dd( $validated);
        $user = User::create([
            "name" =>$data["name"],
            "email"=>$data["email"],
            "password"=> bcrypt($data["password"]),
        ]);
        // $user = User::create([
        //     "name" =>request()->input('name'),
        //     "email"=>request()->input('email'),
        //     "password"=> request()->input('password'),
        // ]);
        // dd($user);

        if($user){
            Auth::guard("web")->login($user);
        }

        $user = Auth::user()->toArray();
        // dd($user);
        
       
        $name=$user['name'];
        $email=$user['email'];
        $id=$user['id'];
        session()->put('user',['name'=>$name,'email'=>$email,'id'=>$id]);
        // dd(session()->all());

        $words_id = DB::table('words')
            ->select('word_id')
            ->get();

            // dd($words_id);


        foreach($words_id as $word_id)
        Word_No_Know::create([
            'user_id'=> $id,
            'word_id'=> $word_id->word_id,
        ]);


        return redirect(route("user"));
    }
}
