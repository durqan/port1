$(function () {

    $('.add_answer').on('click', function (e) {
        e.preventDefault();

        let id = $('.form').children().last('.input').attr('data-id');
        let next_id = +id + 1;
        let input = "<input class='answer' name='answers[]' data-id=" + next_id + " placeholder='Вариант ответа'>";

        $('.form').append(input);
    });

    $('.create_survey').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/create_survey',
            data: $(this).serialize(),
            success: function (suc) {
                $('body').html(suc);
            }
        });
    });

    $('.answer').on('click', function (e) {
        e.preventDefault();
        let surv = $(this).attr('data-surv');
        let answ = $(this).attr('data-answ');

        $.ajax({
            url:'/take_answer',
            data:{id: surv, answ:answ},
            success: function (suc) {
                $('body').html(suc);
            }
        })
    });

});
