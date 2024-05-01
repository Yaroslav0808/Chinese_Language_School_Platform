<?php

namespace App\Http\Controllers;

use App\Models\Test_Save;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as Session;

class TestController extends Controller
{

public function index(Request $request){

    $arr_titles=[];

    $request->session()->forget(['tests']);
    $request->session()->forget(['answers']);
    $request->session()->forget(['test_final']);
    $request->session()->forget(['words_control']);
    $request->session()->forget(['words']);

    $test_titles=DB::table('test_title')
    ->select('title', 'subtitle','category_id')
    ->get();



    $test_titles=$test_titles->toArray();
       foreach($test_titles as $title){
        $arr= (array) $title;
        array_push($arr_titles,$arr);
    }

    // dd($arr_titles);

    // dd( $test_titles);

    return view('tests.index',compact('arr_titles'));
}

    public function next(Request $request, $number){

        // dd(session()->get('answers'));
        
        //  dd($request->session()->all());
        // session()->flush();

        // $tests = [
        //     '0' => [
        //         'question'=>['собака','кот','осёл'],
        //         'answer'=>'собака',
        //     ],
        //     '1' => [
        //         'question'=>['собака','автобус','осёл'],
        //         'answer'=>'автобус',
        //     ]
        //     ];

        // dd(session()->all());
        // dd($number);
            

        $tests=session()->get('tests');
// dd(count($tests));
        $num=(count($tests)<=$number+1)?$number:$number+1;
        
            // foreach($tests as $i=>$test){
                
            //     if($i==$num){
            //         $id=$i;
            //     }
            // }

            
            return redirect()->route('test',['number'=>$num]);
            // return view('test.index',compact('tests','id'));
            // return route('test.coming',compact('count'));
    }

    public function back (Request $request, $number){
        $tests=session()->get('tests');

        $num= ($number-1<0)? 0:$number-1;
        // dd($number);
        foreach($tests as $i=>$test){

            if($i==$num){
                $id=$i;
            }
        }

        
        return redirect()->route('test',['number'=>$num]);

        // return view('test.index',compact('tests','id'));
    }

    public function test(Request $request, $number){
        // dd(1);
            $tests=session()->get('tests');
            $str = $number;
            // dd($tests);
            return view('test.index',compact('tests','str'));
    }

   
    public function get(Request $request, $category){
        $arr_tests=[];
        // session()->flush();
        // dd($request->input('models'));
        // dd($request->session()->all());
        $category_id=$category;
        

        $request->session()->forget(['tests']);
        $request->session()->forget(['answers']);
        $request->session()->forget(['test_final']);
        // dd(session()->all());

        $tests=DB::table('tests')
        
            ->where('category_id','=',$category_id)
           ->select('task', 'description','variants','answer','id')
           ->get();
         $tests=$tests->toArray();
        //  dd($tests);
           foreach($tests as $test){
            // dd($test);
            $arr= (array) $test;
            // dd($arr);
            array_push($arr_tests,$arr);
        }


        // dd($arr_tests);

        //    $tests=$tests->toArray();
        //    dd($tests);

        //    dd(explode(',',$tests[0]->variants));
       
        //     session()->put('tests', ['0' => [
        //         'id'=>'0',
        //         'task'=>['Лучшая машина?'],
        //         'description'=>['По твоему мнению'],
        //         'variants'=>['BMW','AUDI','Chevrole'],
        //         'answer'=>'AUDI',
        //     ],
        //     '1' => [
        //         'id'=>'1',
        //         'task'=>['Лучший самолёт?'],
        //         'description'=>['По мнению друзей'],
        //         'variants'=>['YAMAHA','Airbus','Ferrari'],
        //         'answer'=>'Ferrari',
        //     ],

        // ]);

   

        session()->put('tests',$arr_tests);
           
            // dd(route('test',['number'=>0]));
            
            // dd(session()->get('tests'));

            // dd(session()->all());
           
            // return redirect()->route('tests');

            return redirect()->route('test',['number'=>0]);
        // return view('test.index',compact('tests'));
    }



    public function post(Request $request,$str){

       

        
        // $answers_arr=[];

        // Session::set('test',[$request->input('id'),$request->input('question')]);


        // $request->session()->forget(['food']);
        
// dd();
        // session()->put('food', array('cheese', 'bread'));
        // $value = session()->push('food', 'm11ilk');
        // $value = $request->session()->push('food', ['2'=>0]);
        // $request->session()->push('food1', ['3'=>0]);
        // $value = $request->session()->put('food111', 'm11ileeeeek');

        $answ1 = session()->get('answers');
        $answ2 = session()->get('answers');
        // session()->forget('answers');
        // session()->put('answers',$answ1);
        // dd($request->input('variant'));
        // dd(session()->all());

       
        // dd($answ2);
        // dd(session()->get('answers'));

        
        $count_noverify=0;

    //    dd($answ1);


            // $a=['id'=>'1'];
            // $id=1;
            // dd($id==$a['id']);

    //Проверка на присутствие id данного теста с сессии
        if (!empty($answ1)){
            // dd(111);
        foreach ($answ1 as $a) {
            // if ($a['id']!==$request->input('id')){
                if($a['id']== $request->input('id')){
                $count_noverify++;
                // dd($count_noverify);
            }
        }
    }

       

        // dd($answ1);  
        // dd($count_noverify);
       
        // dd($count_verify);
        if ( $count_noverify==0){
            $request->session()->push('answers', ['id'=>$request->input('id'), 'answer'=>$request->input('variant')]);
        } else {
            //Обновление данных в сессии
            foreach ($answ1 as $i=>$a) {
                if ($a['id']==$request->input('id'))
                {
                    $request->session()->forget(['answers']);
                    $answ2[$i]['answer']=$request->input('variant');
                    $answ2[$i]['id']=$request->input('id');
                    // dd($answ2);
                    session()->put('answers',$answ2);
                }
            }

        }
        //   dd(session()->get('answers'));
        

       



        // dd($request->session()->all());

        // dd($request->all());
        $id=$request->input('id');
       

            // if (session()->get('answers[id]') ==$request->input('id'))


        // $obj=new answers($id,$answer);
        // $answer=['id'=>$request->input('id'), 'answer'=>$request->input('question')];
        // session()->put('test121',$answer);
        // array_push($answers_arr,$obj);
        // dd($request->session()->all());
       
        // $answers_arr=session('test');
    
//У юзера в сессиии должны сохраняться список ответов на тест.
//После прохождения теста результат сохраняется в бд, а сессия очищается
        
        // $value = session('key');
        // dd($value);
// dd($answers_arr);



        
        // dd($count);
    //    return route('')

    return redirect()->route('test',['number'=>$str]);
        
    }

    public function check_get(Request $request,$str){
        // dd($request->session()->all());
        // dd($str);
        return view('test.check',compact('str'));
    }

    public function check_post(Request $request){
        // dd($request->session()->all());
        $tests=session()->get('tests');
        $answers=session()->get('answers');
        $count=0;
        // dd($answers);
        $str_array=[];
        $id_array=[];
        $true=[];

    foreach($answers as $answer){

        array_push($id_array,$answer['id']);
    }

        foreach($tests as $i=>$test){
  

            foreach($answers as $ob){
                // dd($ob['answer']);
                // dd($test['answer']);
                if($test['id']==$ob['id'] && $test['answer']==$ob['answer']){
                    $count++;
                    // dd($count);
                    array_push($true, $test['id']);
                    // dd($request->session()->all());
                }
            
            }
            
        }

        $t=12;
        // $request->session()->push('answers', ['id'=>$request->input('id'), 'answer'=>$request->input('variant')]);
        session()->push('test_final',['id_array'=>$id_array,'true'=>$true]);

        $user=session()->get('user');
        $id=$user['id'];
        
        Test_Save::create([
            'user_id'=>$id,
            'true_answers'=> count($true),
            'quantity'=> 5,
        ]);

        

        // dd(session()->all());
        return view('test.final',compact('id_array','true'));
        // dd($request->session()->all());
        
    }
    public function test_final(){
        // dd(session()->all());
        $id_array=session()->get('test_final')[0]['id_array'];
        $true=session()->get('test_final')[0]['true'];
        return view('test.final',compact('id_array','true'));
    }
 
    public function view_answer(Request $request,$id){

        // dd(1);
        $answers=session()->get('answers');
        $tests=session()->get('tests');
        // dd($answers);
       
        foreach($tests as $test){
            if($test['id']==$id){
                $view_test=$test;
                // dd($view_test);
            }
        }
        
        foreach($answers as $ans){
            if ($ans['id']==$id){
                $answer = $ans['answer'];
            }
        }


        return view('test.view',compact('answer','view_test'));

    }
    
}

class answer{
    public $id;
    public $answer;

    public function __construct($id, $answer) {
                $this->id = $id;
                $this->answer = $answer;
                // echo "Был создан объект с параметрами: $x и $y";
              }

}



// class test{
//     public $answer;
//     public $question;

//     public function __construct($question, $answer) {
//         $this->question = $question;
//         $this->answer = $answer;
//         // echo "Был создан объект с параметрами: $x и $y";
//       }
// };
