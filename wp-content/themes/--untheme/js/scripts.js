document.addEventListener("DOMContentLoaded", () => {

    let body = $('body');
    let menu = $('.container nav');
    let textDefault = 'Меню';
    let textOther = 'Закрыть';

    $('.header__inner__burger span').text(textDefault);

    $(document).on('click', '.header__inner__burger', function () {

        textDefault = textOther;
        textOther = $('.header__inner__burger span').text();
        $('.header__inner__burger span').text(textDefault);


        $(this).toggleClass('_open');
        menu.toggleClass('_open');
        body.toggleClass('_fixed');

        // document.querySelector('.header__inner__burger span').innerHTML = 'Закрыть';
    });


    if (window.innerWidth >= 1240) {
        let navItemLength = document.querySelectorAll('nav .main-menu li').length;
        let ourLogo = document.querySelector('.container .header__inner__logo');

        let menuItems = document.querySelectorAll('nav .main-menu li:nth-child(' + Math.floor(navItemLength / 2 + 1) + ')');

        for (var i = 0; i < menuItems.length; i++) {
            menuItems[i].after(ourLogo);
        }
    }

    $(".page-section__title h2").html(function () {

        var text = $(this).text().trim().split(" ");
        var first = text.shift();
        return (text.length >= 0 ? "<span class='first-word'>" + first + "</span> " : first) + text.join(" ");

    });

    // Изменение хедера при скролле

    if (window.innerWidth >= 1024) {
        const headerFront = document.querySelector('.site-header');
        const headerChange = () => {
            const
                mainBlock = document.querySelector('body');


            window.addEventListener('scroll', () => {
                if (-mainBlock.getBoundingClientRect().top > 100) {
                    headerFront.classList.add('header-scroll');

                } else {
                    headerFront.classList.remove('header-scroll');
                }
            })

        }
        headerChange();
    }
    //плавный скролл

    function scrollTo(to, duration = 700) {
        const
            element = document.scrollingElement || document.documentElement,
            start = element.scrollTop,
            change = to - start,
            startDate = +new Date(),
            // t = current time
            // b = start value
            // c = change in value
            // d = duration
            easeInOutQuad = function (t, b, c, d) {
                t /= d / 2;
                if (t < 1) return c / 2 * t * t + b;
                t--;
                return -c / 2 * (t * (t - 2) - 1) + b;
            },
            animateScroll = function () {
                const currentDate = +new Date();
                const currentTime = currentDate - startDate;
                element.scrollTop = parseInt(easeInOutQuad(currentTime, start, change, duration));
                if (currentTime < duration) {
                    requestAnimationFrame(animateScroll);
                }
                else {
                    element.scrollTop = to;
                }
            };
        animateScroll();
    }

    //кнопка вверх

    //     const upArrow = document.querySelector('.arrow-up');


    // upArrow.addEventListener('click', (e) => {
    //     e.preventDefault();
    //     // Вызываем функцию, первый аргумент - отступ, второй - скорость скролла, чем больше значение, тем медленнее скорость прокрутки
    //     scrollTo(0, 800);
    // });
    // // Вверх и показ верхнего меню
    // const arrowUp = () => {
    //     const
    //         //fixedHeader = document.querySelector('.fixed-header'),
    //         mainBlock = document.querySelector('.site-container'),
    //         arrow = document.querySelector('.arrow-up');

    //     window.addEventListener('scroll', () => {
    //         if (-mainBlock.getBoundingClientRect().top > 300) {
    //             arrow.classList.add('show');
    //             //fixedHeader.classList.add('show')

    //         } else {
    //             arrow.classList.remove('show');
    //             //fixedHeader.classList.remove('show')

    //         }
    //     })

    // }
    // arrowUp();

    //анимация при скролле

    function onEntry(entry) {
        entry.forEach(change => {
            if (change.isIntersecting) {
                change.target.classList.add('element-show');
            }
        });
    }
    let options = { threshold: [0.5] };
    let observer = new IntersectionObserver(onEntry, options);
    let elements = document.querySelectorAll('.toright, .fromtop, .toleft, .destr-img, .toopacity, .animateBlur, .animateScale, .frombottom');
    for (let elm of elements) {
        observer.observe(elm);
    };

    (function () {
        $('.menu-toggle').on('click', function () {
            $('.menu-toggle').toggleClass('animate');
            $('.main-navigation').toggleClass('animate');
            $('.background-container').toggleClass('animate');
        })
    })();

    (function () {
        $('.toggle-contacts-icon').on('click', function (e) {
            $(this).toggleClass('animate');
            e.preventDefault();
            $('.messengers-list._toggle-contacts').toggleClass('animate');
            //$('._toggle-contacts').toggleClass('animate');
            //$('.background-container').toggleClass('animate');
        })
    })();

});














