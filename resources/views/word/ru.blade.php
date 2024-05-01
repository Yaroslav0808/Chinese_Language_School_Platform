@extends('layouts.base')

@section('content')
<div class="test-content d-flex align-items-center flex-column mt-4 col-10">
<div class="card verify-word">
   
@php
// dd(session()->get('words'));
    $words=session()->get('words');
    foreach($words as $i=>$word){
      if ($i == $str){
        // dd($words)
        $russia = $word['russia'];
        $china= $word['china'];
        $image = $word['image_path'];
      }

      
    }

@endphp

  <img class="card-img-top" src="{{url($image)}}" alt="Card image cap">

  <div class="card-body card-switch p-0 pt-4 text-center ">
    <h5 class="card-title border-top ">{{$russia}}</h5>
    <p class="border-top mb-0">
      <a class="" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        Показать перевод
      </a>
    </p>
    <div class="collapse pt-1 pb-2" id="collapseExample">
      <div class="d-flex justify-content-center">
      <div class="border-bottom">
      {{$china}}
    </div>
      </div>
    </div>
    {{-- <p class="card-text border-top pt-3 pb-3">{{$china}}</p> --}}
  </div>
  </div>
  

 

  {{-- <div class="buttons-switchs d-inline mt-3">
    <button type="" class="button-switch btn-block  btn btn-danger">Не знаю</button>
    <button type="" class="button-switch btn-block  btn btn-success">Знаю</button>
  </div> --}}

   

<div class="buttons-switchs d-flex column-gap-1 mt-3">
    
    <form action="{{route('word.ru.back',['number'=>$str])}}" method="GET">
      <button class="button-switch btn-block  btn btn-warning" type="submit">Back</button>
    </form>
    <form action="{{route('word.ru.next',['number'=>$str])}}" method="GET">
      <button class="button-switch btn-block  btn btn-warning" type="submit">Next</button>
    </form>
  </div>
</div>

@endsection