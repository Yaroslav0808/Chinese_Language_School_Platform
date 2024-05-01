<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TheoryController extends Controller
{
    public function index(Request $request){

        $request->session()->forget(['tests']);
        $request->session()->forget(['answers']);
        $request->session()->forget(['test_final']);
        $request->session()->forget(['words_control']);
            $request->session()->forget(['words']);

            $theories=DB::table('theories')
            ->select('id','title','subtitle')
            ->get();

            
            $arr_theories=[];

            foreach($theories as $th_item){
                // dd($test);
                $arr= (array) $th_item;
                // dd($arr);
                array_push($arr_theories,$arr);
            }

            // dd($arr_theories);
        // $theories=[
        //     0=>[
        //     'id'=>1,
        //     'title'=>'Что такое пиньинь?',
        //     'subtitle'=>'aaaaaaa',
        //     'text'=>'Вы знаете, что означает слово «пиньинь»? Если вы решили изучать китайский язык, без «пиньинь»
        //     вам не обойтись. Само слово «пиньинь», или «ханьюй пиньинь», переводится как «запись звуков ки-
        //     тайского языка». Ханьюй пиньинь – фонетическая система, благодаря которой стало возможным пере-
        //     вести китайские иероглифы в латинские буквы. С её помощью мы с вами займёмся освоением звуковой
        //     системы китайского языка. <br>
        //     Современный китайский язык существует в двух формах: письменной и устной. Про письменную
        //     иероглифическую форму наслышаны все. Про неё даже есть выражение – «китайская грамота», озна-
        //     чающее что-то невообразимо трудное. Действительно, иероглифический барьер – сложная психологи-
        //     ческая проблема, возникающая у людей, изучающих китайский язык. Но, невзирая на трудности, при
        //     желании все препятствия можно преодолеть.',
        //     ],
        //     1=>[
        //     'id'=>1,
        //     'title'=>'Что такое',
        //     'subtitle'=>'bbbbbb',
        //     'text'=>'Вы знаете, что означает слово «пиньинь»? Если вы решили изучать китайский язык, без «пиньинь»
        //     вам не обойтись. Само слово «пиньинь», или «ханьюй пиньинь», переводится как «запись звуков ки-
        //     тайского языка». Ханьюй пиньинь – фонетическая система, благодаря которой стало возможным пере-
        //     вести китайские иероглифы в латинские буквы.',
        //     ]
        // ];

        return view('theory.index',compact('arr_theories'));
    }

    public function view($theory){

        $theory_item=DB::table('theories')
        ->where('id','=',$theory)
        ->select('id','title','text')
        ->get();

        $arr_theory=[];
      
        $theory_item=$theory_item->toArray();
       
            // dd($test);
            $theory= (array) $theory_item;
       
            foreach($theory as $item){
                
                $arr= (array) $item;
                // dd($arr);
                array_push($arr_theory,$arr);
            }

            // dd($arr_theory[0]);
       


        return view('theory.view',compact('arr_theory'));
    }
}
