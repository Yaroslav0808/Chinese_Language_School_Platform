@extends('layouts.base')

@section('content')

<h3 class="theory-view-title border-bottom">{{$arr_theory[0]['title']}}</h3>

<p class="theory-view-text">{!!$arr_theory[0]['text']!!}</p>

@endsection