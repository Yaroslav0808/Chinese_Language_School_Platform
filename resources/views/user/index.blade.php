@extends('layouts.base')

@section('content')
<div class="d-flex align-items-center justify-content-center flex-column">
<div class="card user-card mt-4 d-flex align-items-center justify-content-center " >
    <img class="user-image pb-2" src="{{url('image/icon/profile.svg')}}" alt="">
    <div class="user-card-body border-top">

      @php
      $user=session()->get('user');
      $name=$user['name'];
      $email=$user['email'];
      $id=$user['id'];
      @endphp

    <div class="d-flex user_item ps-2">
      <p>Name: </p>
      <p> &nbsp {{ $name}}</p>
    </div>
    <div class="d-flex user_item border-top ps-2">
        <p>Email: </p>
        <p> &nbsp {{$email}}</p>
      </div>
    </div>
  </div>
  <div class="user-checks d-flex justify-content-between w-100">
    <div>
  <div class="card user-test-card mt-4 d-flex" >
    {{-- <div class="user-title-test-card d-flex align-items-center justify-content-between">
    <img class="user-test-image " src="{{url('image/icon/test.svg')}}" alt="">
    <h6 class="m-0 "> Результаты тестов</h6>
    </div> --}}
    {{-- <div class="user-card-body d-flex border-top">
    <p class="user-test-number">№1</p>
    <p class="user-test-result"> 5 из 10</p> --}}
    {{-- {{dd($user = Auth::user()->toArray());}} --}}

<table class="user-tests-result">
  <tr>
    <td class="user-test-image "> <img class="user-test-image " src="{{url('image/icon/test.svg')}}" alt=""></td>
    <td class="user-test-result">Результаты тестов</td>
  </tr>
  @foreach ($tests as $i=>$test)
  <tr class="user-number-result">
    <td>№{{++$i}}</td>
    <td class="user-test-result">{{$test->true_answers}} из {{$test->quantity}}</td>
  </tr>
  @endforeach
</table>
    {{-- </div> --}}
  </div>
</div>
<div>
  <div class="card user-word-card mt-4 " >
    <table class="user-words-result">
      <tr>
        <td class="user-word-image "> <img class="user-test-image " src="{{url('image/icon/learn.svg')}}" alt=""></td>
        <td colspan="2" class="user-word-result">Выученные слова</td>
      </tr>
      @foreach ($words as $i=>$item)
      <tr class="user-number-result">
        <td class="user-word-number">№{{++$i}}</td>
        <td class="user-word-result1 ">{{$item->russia}}</td>
        <td class="user-word-result ">{{$item->china}}</td>
      </tr>
      @endforeach
      
    </table>
  </div>
</div>
</div>
</div>
@endsection