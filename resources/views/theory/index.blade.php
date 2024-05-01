@extends('layouts.base')

@section('content')


    <h1 class="theory-title">Теория</h1>
    <div class="theory-cards d-flex gap-3"> 
    @foreach($arr_theories as $theory)
   
    <div class="card theory-card color-orange mt-4" >
        <a href={{route('view.theory',['id'=>$theory['id']])}}>
        <div class="card-body ">
            <h5 class="card-title-theory pt-3 text-center">{{$theory['title']}}</h5>
            {{-- <h6 class="card-subtitle-theory pt-1 text-center">{{$theory['subtitle']}} </h6> --}}
        </div>
    </a>
    </div>
    
    @endforeach
    {{-- <div class="card process-card color-orange   mt-4" >
        <div class="card-body">
            <h5 class="card-title-theory pt-3 text-center">Грамматика</h5>
            <h6 class="card-subtitle-theory pt-1 text-center">Числительные</h6>
        </div>
    </div>
    <div class="card process-card color-orange   mt-4" >
        <div class="card-body">
            <h5 class="card-title-theory pt-3 text-center">Грамматика</h5>
            <h6 class="card-subtitle-theory pt-1 text-center">Союзы</h6>
        </div>
    </div>
    <div class="card process-card color-orange   mt-4" >
        <div class="card-body">
            <h5 class="card-title-theory pt-3 text-center">Грамматика</h5>
            <h6 class="card-subtitle-theory pt-1 text-center">Модальные глаголы</h6>
        </div>
    </div> --}}
</div>

@endsection