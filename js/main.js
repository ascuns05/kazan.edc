$('.tribe-events-has-events').click( () => {
        setTimeout(function() {
            $('.tribe-events-read-more').text('Подробнее');
        }, 1);
    });
    $('.mobile-menu').click( () => {
        $('.mobile-menu').toggleClass('mobile-menu-click');
        $('header').toggleClass('margin');
        $('.mobile-main-menu').toggleClass('margin-menu');
    });
    $(document).ready(function(){
        // ловим клик по ссылке с классом go_to
	    var scroll_el = $('#container'); // возьмем содержимое атрибута href, должен быть селектором, т.е. например начинаться с # или .
            if ($(scroll_el).length != 0) { // проверим существование элемента чтобы избежать ошибки
	        $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 900); // анимируем скроолинг к элементу scroll_el
            }
	        return false; // выключаем стандартное действие
    });
