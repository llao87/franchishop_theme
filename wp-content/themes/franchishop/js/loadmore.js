jQuery(function($) {
    $('#loadmore').on('click', function() { // клик на кнопку
        $(this).text('Загрузка...'); // меняем текст на кнопке
        // получаем нужные переменные
        var data = {
            'action': 'loadmore',
            'query': posts_vars,
            'page': current_page
        };
        // отправляем Ajax запрос 
        $.ajax({
            url: ajaxurl,
            data: data,
            type: 'POST',
            success: function(data) {
                if (data) {
                    $('#loadmore').text('больше новостей');
                    $('.news-list').append(data); // добавляем новые посты
                    current_page++; // записываем новый номер страницы
                    if (current_page == max_pages) $("#loadmore").remove(); // если последняя страница, удаляем кнопку
                } else {
                    $('#loadmore').remove(); // если посты не были получены так же удаляем кнопку
                }
            }
        });
    });
});