
@extends('layouts.base')

@section('content')
<div class="test d-flex align-items-center justify-content-center flex-column">

    {{-- {{dd($view_test);}} --}}
{{-- <p class="mt-5">{{$view_test['question'][0]}}</p> --}}

<h4 class="mt-5">{{$view_test['task']}}</h4>

<p class="mt-2">{{$view_test['description']}}</p>

<div class="">


{{-- {{dd($answer)}} --}}

@php
    $variants=explode(',',$view_test['variants']);
@endphp

@foreach($variants as $test)
<div>
<input type="radio" name="variant" value="{{$test}}" {{($test==$answer)? 'checked':''}}/>
<label for="variant"{{($test==$view_test['answer'])? 'class=true_answer':''}} >{{$test}}</label>
</div>
@endforeach


</div>




<form action="{{ route('test.final')}}" method="GET" class="mt-3">
    <button class="button-switch btn-block  btn btn-info " type="submit">Назад</button>
</form> 

</div>
@endsection