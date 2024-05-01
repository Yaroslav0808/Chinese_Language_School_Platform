
@extends('layouts.base')

@section('content')
<div class="test d-flex align-items-center justify-content-center flex-column">

<h4 class="mt-5">{{$tests[$str]['task']}}</h4>

<p class="mt-2">{{$tests[$str]['description']}}</p>

<div class="">
<form class="d-flex flex-column" action="{{route('test.post',['str'=>$str])}}" method="POST">
@csrf



    {{-- {{dd($test);}} --}}
{{-- @php
     if(isset(session()->get('answers')[$str]['answer'])){
        $answer=session()->get('answers')[$str]['answer'];
    }else{
        $answer=null;
    }
@endphp --}}

{{-- @php
    $answers=session()->get('answers');
    dd($answers);
@endphp --}}

@php
$answer1='';
    if(null!==session()->get('answers'))
{
    $answers=session()->get('answers');
    // dd( $answers);
    // $answers=(count($answers)==1)?1:count($answers)-1;
    foreach($answers as $answer){
        if($answer['id']==$tests[$str]['id']){
            $answer1=$answer['answer'];
        }

    }
    
}


$variants=explode(',',$tests[$str]['variants']);
// dd($variants);
@endphp

@foreach($variants as $test)
<div>
<input type="radio" name="variant" value="{{$test}}" {{($test==$answer1)? 'checked':''}}/>
<label for="variant">{{$test}}</label>
</div>
@endforeach
<input type="hidden" name="str" value="{{$str}}">
<input type="hidden" name="id" value="{{$tests[$str]['id']}}">
<button class="save-answer mt-3 button-switch btn-block  btn btn-success" type="submit" >Сохранить ответ</button>
</form>
</div>


<div class="d-flex mt-3 column-gap-4 mb-5">
    <form action="{{route('test.back',['number'=>$str])}}" method="GET">
        <input type="hidden" name="str" value="{{$str}}">
        <button class="button-switch btn-block  btn btn-warning" type="submit">Back</button>
    </form>
    <form action="{{route('test.next',['number'=>$str])}}" method="GET">
        <input type="hidden" name="str" value="{{$str}}">
        <button class="button-switch btn-block  btn btn-warning" type="submit">Next</button>
    </form>
</div>
<form action="{{route('check',['str'=>$str])}}" method="GET">
    {{-- <input type="hidden" name="str" value="{{$str}}"> --}}
    <button class="button-switch btn-block  btn btn-info " type="submit">Завершить тест?</button>
</form>
</div>
@endsection