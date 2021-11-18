@extends('head')

@section('content')
        <div class="form">
            <h2 class="form_input">Поздравляем, Ваш опрос создан! Вот ссылка:</h2>
            <input class="answer" value="http://port1/survey/{{$survey_id}}">
        </div>
        <div class="but">
            <a href="http://port1/survey/{{$survey_id}}"><button>Перейти к опросу</button></a>
        </div>
@endsection
