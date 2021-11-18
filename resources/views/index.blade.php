@extends('head')

@section('content')
    <header style="margin: 0 auto">
        Сайт опросов
    </header>
    <form class="create_survey">
        <div class="form">
            <h2 class="form_input">Форма опросника</h2>
            <textarea class="form_input" name="text" placeholder="Текст опроса"></textarea>
            <input name="datetime" type="datetime-local">
            <input class="answer" data-id="1" name="answers[]" placeholder="Вариант ответа">
        </div>
        <div class="but">
            <button class="add_answer">+</button>
        </div>
        <div class="but">
            <button type="submit">Отправить</button>
        </div>
    </form>
@endsection
