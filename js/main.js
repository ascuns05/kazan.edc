// возвращает cookie с именем name, если есть, если нет, то undefined
function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
      "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }

  var date = new Date(new Date().getTime() + 60 * 1000 * 10000 * 10000);
 

  
  var like = location.pathname;

if (getCookie(like) == 'true') {
    $('.heart').addClass('is_animating');
}

function setLike() {
    
    if (getCookie(like) == 'true') {
        document.cookie = "" + like + "=" + false + "; path=/; expires=" + date.toUTCString();
    } else {
        document.cookie = "" + like + "=" + true + "; path=/; expires=" + date.toUTCString();
    }
}

$(".heart").click( () => {
    $(".heart").toggleClass('is_animating');
    setLike();
} );
  

$('.tribe-events-has-events').click( () => {
    setTimeout(function() {
        $('.tribe-events-read-more').text('Подробнее');
    }, 1);
    });
    $('.mobile-menu').click( () => {
        $('.mobile-menu').toggleClass('mobile-menu-click');
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

