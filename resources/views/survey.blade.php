@extends('head')

@section('content')
    <div class="choose_answer">
        <div class="form">
            <h2 class="form_input">Опрос:</h2>
            <h4>{{$survey->text}}</h4>
            @foreach($survey->answers as $answer)
                <br>
                <div class="but">
                    <div class="btn btn-primary answer" data-surv="{{$survey->id}}" data-answ="{{$answer->id}}">{{$answer->answer}}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
