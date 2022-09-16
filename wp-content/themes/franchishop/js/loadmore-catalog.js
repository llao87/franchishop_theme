jQuery(function($) {
    $('#loadmore-catalog').on('click', function() { // клик на кнопку
        $(this).text('Загрузка...'); // меняем текст на кнопке
        // получаем нужные переменные
        var data = {
            'action': 'loadmore_catalog',
            'query': posts_vars,
            'page': current_page
        };
        console.log(posts_vars);
        // отправляем Ajax запрос 
        $.ajax({
            url: ajaxurl,
            data: data,
            type: 'POST',
            success: function(data) {
                if (data) {
                    $('#loadmore-catalog').text('показать больше');
                    $('.franchises-list').append(data); // добавляем новые посты
                    current_page++; // записываем новый номер страницы
                    if (current_page == max_pages) $("#loadmore-catalog").remove(); // если последняя страница, удаляем кнопку
                } else {
                    $('#loadmore-catalog').remove(); // если посты не были получены так же удаляем кнопку
                }
            }
        });
    });
});