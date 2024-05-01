@extends('layouts.base')

{{-- <script>
  var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
</script> --}}

@section('content')
<div class="test-content d-flex align-items-center flex-column mt-4 col-10">
<div class="card test-word">
   
@php
    $words=session()->get('words_control');
    // dd($words);
    foreach($words as $i=>$word){
      if ($i == $str){
        $russia = $word['russia'];
        $china= $word['china'];
        $image = $word['image_path'];
        $know = !!$word['know'];
        $word_id=$word['word_id'];
      }
    }
@endphp
{{-- {{dd(session()->all())}} --}}
{{-- {{dd($know ?'active':'')}} --}}
  <img class="card-img-top" src="{{url($image)}}" alt="Card image cap">

  <div class="card-body card-switch p-0 pt-3 text-center ">
    <h6 class="card-title text-center pt-1 border-top">{{$russia}}</h6>
    <h6 class="card-text text-center border-top pt-3 pb-3">{{$china}}</h6>
  </div>
  </div>

  <div class="buttons-know d-flex column-gap-1 mt-3">
    <form action="{{route('word_control_noknow',['word_id'=>$word_id])}}" method="GET">
      <button type="submit"  class="button-know btn-block btn-red{{$know ?'':'-active'}} btn  "   >Не знаю</button>
    </form>
    <form action="{{route('word_control_know',['word_id'=>$word_id])}}" method="GET">
    <button type="submit"  class="button-know btn-block btn-green{{$know ?'-active':''}}  btn   "  >Знаю</button>
    </form>
  </div>

   

<div class="buttons-switchs d-flex column-gap-1 mt-3 mb-2">
    
    <form action="{{route('word_control.back',['number'=>$str])}}" method="GET">
      <button class="button-switch btn-block  btn btn-warning" type="submit">Back</button>
    </form>
    <form action="{{route('word_control.next',['number'=>$str])}}" method="GET">
      <button class="button-switch btn-block  btn btn-warning" type="submit">Next</button>
    </form>
  </div>

  {{-- <button type="button" class="button-switch btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">
    Завершить просмотр?
  </button> --}}

  {{-- <div class="modal-dialog modal-dialog-centered" id="myModal">
    <form action="{{route('word.check',['str'=>$str])}}" method="GET">
      <button class="button-switch btn-block  btn btn-info " type="submit">Да</button>
    </form>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
    </div>
  </div> --}}

  {{-- <form action="{{route('word.check',['str'=>$str])}}" method="GET">
    <button class="button-switch btn-block  btn btn-info " type="submit">Завершить просмотр?</button>
  </form> --}}
 
  <!-- Кнопка-триггер модального окна -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Завершить просмотр?
</button>
 
  <!-- Модальное окно -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Вы уверены?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        После завершения просмотра изменения будут недоступны!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        {{-- <button type="button" class="btn btn-primary">Сохранить изменения</button> --}}
        <form action="{{route('word.check',['str'=>$str])}}" method="GET">
          <button class="btn btn-primary " type="submit">Сохранить изменения</button>
        </form>
      </div>
    </div>
  </div>
</div>



</div>

@endsection