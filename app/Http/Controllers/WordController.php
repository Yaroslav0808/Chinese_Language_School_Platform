<?php

namespace App\Http\Controllers;

use App\Models\Know_Word;
use App\Models\Word;
use App\Models\Word_Know;
use App\Models\Word_No_Know;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\ObjectReflector\ObjectReflector;

class WordController extends Controller
{

    public function index(Request $request){
        $request->session()->forget(['tests']);
    $request->session()->forget(['answers']);
    $request->session()->forget(['test_final']);
    $request->session()->forget(['words_control']);
        $request->session()->forget(['words']);
        return view('words.index');
    }

    
    public function word_ru(Request $request, $number){
        // dd( session()->all());
        $words=session()->get('words');
        $str = $number;
        return view('word.ru',compact('words','str'));

    }


    public function word_ch(Request $request, $number){
        // dd( session()->all());
        $words=session()->get('words');
        $str = $number;
        return view('word.ch',compact('words','str'));

    }


    public function word_control(Request $request, $number){
        // dd( session()->all());
        $words=session()->get('words_control');
        $str = $number;
        return view('word.control',compact('words','str'));

    }


    public function write_words(){

    }


    public function get_ru(Request $request){
        // session()->flush();
        // dd($request->input('models'));
        // dd($request->session()->all());
        $request->session()->forget(['words']);
        // $request->session()->forget(['words_control']);
        
        $arr_words=[];

        $user=session()->get('user');
        $id=$user['id'];
     

        $words=DB::table('word_no_knows')
        ->where('user_id','=',$id)
        ->join('words', 'word_no_knows.word_id','=','words.word_id')
        ->select('words.word_id', 'russia','china','image_path','words.know')
        ->get();


        

        foreach($words as $word){
            $arr= (array) $word;
            array_push($arr_words,$arr);
        }
        
        session()->put('words',$arr_words);
            // session()->put('words', [
            //     '0'=>['image'=>'/image/car.jpg',
            //     'word_id'=>'1',
            //     'russia'=>'Привет',
            //     'china'=>'嗨。'],
    
            //     '1'=>[
            //     'image'=>'/image/samolet.jpg',
            //     'word_id'=>'54',
            //     'russia'=>'Самолёт',
            //     'china'=>'飞机'],
    
            //     '2'=>[
            //     'image'=>'/image/car.jpg',
            //     'word_id'=>'100',
            //     'russia'=>'Машина',
            //     'china'=>'房子'],
            // ]);
           
            // dd( session()->all());
            // dd(session()->get('tests'));


            return redirect()->route('word.ru',['number'=>0]);

     
    }


    public function get_ch(Request $request){
        $request->session()->forget(['words']);
        // session()->flush();
        // dd($request->input('models'));
        // dd($request->session()->all());
        
        $arr_words=[];

        $user=session()->get('user');
        $id=$user['id'];
     

        $words=DB::table('word_no_knows')
        ->where('user_id','=',$id)
        ->join('words', 'word_no_knows.word_id','=','words.word_id')
        ->select('words.word_id', 'russia','china','image_path','words.know')
        ->get();

        

        foreach($words as $word){
            $arr= (array) $word;
            array_push($arr_words,$arr);
        }
        
        session()->put('words',$arr_words);
            // session()->put('words', [
            //     '0'=>['image'=>'/image/car.jpg',
            //     'word_id'=>'1',
            //     'russia'=>'Привет',
            //     'china'=>'嗨。'],
    
            //     '1'=>[
            //     'image'=>'/image/samolet.jpg',
            //     'word_id'=>'54',
            //     'russia'=>'Самолёт',
            //     'china'=>'飞机'],
    
            //     '2'=>[
            //     'image'=>'/image/car.jpg',
            //     'word_id'=>'100',
            //     'russia'=>'Машина',
            //     'china'=>'房子'],
            // ]);
           
            // dd( session()->all());
            // dd(session()->get('tests'));


            return redirect()->route('word.ch',['number'=>0]);

     
    }




    public function word_control_get(Request $request){
        // session()->flush();
        // dd($request->input('models'));
        // dd($request->session()->all());
        
        $request->session()->forget(['words_control']);
            // session()->put('words_control', [
            //     '0'=>['image'=>'/image/car.jpg',
            //     'word_id'=>'3',
            //     'russia'=>'Привет',
            //     'china'=>'嗨。',
            //     'know'=>false],
    
            //     '1'=>[
            //     'image'=>'/image/samolet.jpg',
            //     'word_id'=>'2',
            //     'russia'=>'Самолёт',
            //     'china'=>'飞机',
            //     'know'=>false],
    
            //     '2'=>[
            //     'image'=>'/image/car.jpg',
            //     'word_id'=>'1',
            //     'russia'=>'Машина',
            //     'china'=>'房子',
            //     'know'=>false],
            // ]);
                $arr_words=[];
            
                $user=session()->get('user');
                $id=$user['id'];
             
           $words=DB::table('word_no_knows')
           ->where('user_id','=',$id)
           ->join('words', 'word_no_knows.word_id','=','words.word_id')
           ->select('words.word_id', 'russia','china','image_path','words.know')
           ->get();
            // $words=Word_No_Know::query()->get(['word_id','russia','china','image_path','know']);
            // dd($words->all());
            foreach($words as $word){
                $arr= (array) $word;
                array_push($arr_words,$arr);
            }
            // dd($arr_words);

            session()->put('words_control',$arr_words);
            // dd( session()->all());
            // dd(session()->get('tests'));


            return redirect()->route('word_control',['number'=>0]);

     
    }


    public function next_ru(Request $request, $number){

      
        // $words=Word::query()->get(['word_id','russia','china','image_path']);

        // $words=$words->toArray();
            // dd($words);
        $words=session()->get('words');
            // dd(count($tests));
        $num=(count($words)<=$number+1)?$number:$number+1;
                
                        
        return redirect()->route('word.ru',['number'=>$num]);

      
}


public function next_ch(Request $request, $number){

      
    // $words=Word::query()->get(['word_id','russia','china','image_path']);

    // $words=$words->toArray();
        // dd($words);
    $words=session()->get('words');
        // dd(count($tests));
    $num=(count($words)<=$number+1)?$number:$number+1;
            
                    
    return redirect()->route('word.ch',['number'=>$num]);

  
}


public function word_control_next(Request $request, $number){

      
    // $words=Word::query()->get(['word_id','russia','china','image_path']);

    // $words=$words->toArray();
        // dd($words);
    $words=session()->get('words_control');
        // dd(count($tests));
    $num=(count($words)<=$number+1)?$number:$number+1;
            
                    
    return redirect()->route('word_control',['number'=>$num]);

  
}



public function back_ru(Request $request, $number){
 

    // $words=Word::query()->get(['word_id','russia','china','image_path']);
        


    $num= ($number-1<0)? 0:$number-1;
    // dd($number);
    

    
    return redirect()->route('word.ru',['number'=>$num]);
   
    }

    public function back_ch(Request $request, $number){
 

        // $words=Word::query()->get(['word_id','russia','china','image_path']);
            
    
    
        $num= ($number-1<0)? 0:$number-1;
        // dd($number);
        
    
        
        return redirect()->route('word.ch',['number'=>$num]);
       
        }

    

    
    public function word_control_back(Request $request, $number){
     

        $num= ($number-1<0)? 0:$number-1;
        // dd($number);
  
        return redirect()->route('word_control',['number'=>$num]);
       
        }

        public function word_control_know($word_id){
            // dd(session()->all());
            $str=0;
            $words=session()->get('words_control');
            $words_alter=session()->get('words_control');
            foreach ($words as $i=>$word){
                if($word['word_id']==$word_id){
                   
                    session()->forget(['words_control']);
                    $words_alter[$i]['know']=true;
                    $str=$i;
                    session()->put('words_control', $words_alter);
                    
                } 
            }
            // dd(session()->all());
            return redirect()->route('word_control',['number'=>$str]);
        }

        public function word_control_noknow($word_id){
            $str=0;
            $words=session()->get('words_control');
            $words_alter=session()->get('words_control');
            foreach ($words as $i=>$word){
                if($word['word_id']==$word_id){
                    // dd(session()->all());
                    session()->forget(['words_control']);
                    $words_alter[$i]['know']=false;
                    $str=$i;
                    session()->put('words_control', $words_alter);
                    
                }  
            }
            // dd(session()->all());
            return redirect()->route('word_control',['number'=>$str]);
        }

        public function check($str){
            $know_id=[];
            $no_know_id=[];
            $user=session()->get('user');
            $id=$user['id'];
            $user_id=$id;
            $words=session()->get('words_control');
            foreach ($words as $word){
                // dd(session()->all());
                if($word['know']==true){
                    // dd(session()->all());
                    array_push( $know_id,$word['word_id']);
                }else{
                    array_push($no_know_id,$word['word_id']);
                }
            }
            // dd($know_id);
            foreach ($know_id as $id){
                Word_Know::create([
                    "user_id" => $user_id,
                    "word_id" => $id,
                ]);

                DB::table('word_no_knows')->where('user_id','=', $user_id)
                ->where('word_id','=', $id)
                ->delete();
        
                    
            }
            return redirect()->route('word_control',['number'=>$str]);
        }
}
//  $user = User::create([
//             "name" =>$data["name"],
//             "email"=>$data["email"],
//             "password"=> bcrypt($data["password"]),
//         ]);