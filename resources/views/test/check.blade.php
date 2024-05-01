@extends('layouts.base')
@section('content')

<div class="test d-flex flex-column align-items-center justify-content-center">
<h1>Завершить тест?</h1>

<form class="mt-3" action="{{route('check.post')}}" method="POST">
    @csrf
    <button class="btn btn-info" type="submit">Конечно :)</button>
</form>

<form class="mt-3" action="{{route('test',['number'=>$str])}}" method="GET">
    <button class="btn btn-info" type="submit">Неа, назад!</button>
</form>
    
</div>
@endsection