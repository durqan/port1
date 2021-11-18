@extends('head')

@section('content')
    <div class="choose_answer">
        <div class="form">
            <h2 class="form_input">Опрос:</h2>
            <h4>{{$survey['text']}}</h4>
            @foreach($survey['answer'] as $key => $value)
                <h6>{{$key}} {{$value}}</h6>
            @endforeach
        </div>
    </div>
@endsection
