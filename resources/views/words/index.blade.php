@extends('layouts.base')

@section('content')



            <h1 class="words-title">Карточки со словами</h1>
            <div class="words-cards d-flex gap-3 ">
                
            <div class="card words-card color-sky" >
                <a href={{route('word_control.get')}}>
                <div class="card-body">
                    <h5 class="card-title-word pt-4 text-center">Знаю/Не знаю</h5>
                </div>
                </a>
            </div>
            <div class="card words-card color-sky " >
                <a href={{route('word.ru.get')}}>
                <div class="card-body">
                    <h5 class="card-title-word pt-3 text-center">Проверка знания слов</h5>
                    <h6 class="card-subtitle-word pt-1  text-center">Перевод с русского на китайский</h6>
                </div>
                </a>
            </div>
            <div class="card words-card color-sky " >
                <a href={{route('word.ch.get')}}>
                <div class="card-body">
                    <h5 class="card-title-word pt-3 text-center">Проверка знания слов</h5>
                    <h6 class="card-subtitle-word pt-1  text-center">Перевод с китайского на русский</h6>
                </div>
                </a>
            </div>
            
        </div>
  

   
@endsection