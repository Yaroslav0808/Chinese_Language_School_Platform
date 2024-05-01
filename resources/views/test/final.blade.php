@extends('layouts.base')

@section('content')

<div class="view-final d-flex align-items-center justify-content-center flex-column">
  
<h3>Выполнено правильно {{count($true)}} из {{count($id_array)}}</h3>
<h4>Выполненные задания:</h4>
{{-- {{dd($id_array)}} --}}
<table>
        <tr class="table-head">
          <td>№</td>
          <td>Статус</td>
        </tr>
    @foreach ($id_array as $i=>$id)
    {{-- {{dd(route('view.answer',['obj'=>$obj]));}} --}}
{{-- {{route('view.answer',['obj'=>$obj])}} --}}

    <tr>
      {{-- http://school.test/test/view/id=$obj->id --}}
      <td> <a href="test/view/id={{$id}}"> {{++$i}} </a></td>
        {{-- <td> <a href="{{route('view.answer',['id'=>$obj->id])}}"> {{++$i}} </a></td> --}}
        <td><img src="{{in_array($id,$true)? url('image/icon/check.svg'):url('image/icon/cross.svg')}}"></td>
    </tr>
 
    {{-- <img src="{{url('image/icon/check.png')}}"> --}}

    @endforeach
</table>

</div>
@endsection

