@extends('layouts.base')

@section('content')

@php
    
@endphp


    

      
        <h1 class="tests-title">Тесты</h1>
        <div class="tests-cards d-flex gap-3"> 
            @foreach ($arr_titles as $title_item)
        <div class="card tests-card color-green" >
            <a href="{{route('test.get', ['category'=>(string) $title_item['category_id']])}}">
            <div class="card-body ">
                <h5 class="card-title-tests pt-3 text-center">{{$title_item['title']}}</h5>
                <h6 class="card-subtitle-tests pt-1 text-center">{{$title_item['subtitle']}}</h6>
            </div>
        </a>
        </div>
            @endforeach
        
    </div>

   
@endsection