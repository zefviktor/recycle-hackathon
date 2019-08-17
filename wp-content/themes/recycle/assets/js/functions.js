// **** menu *****

$(document).ready(function () {

    $('.posts-gride').imagesLoaded(function () {
        $('.posts-gride').masonry({
            itemSelector: '.post-item',
            columnWidth: 420,
            isFitWidth: true
        })
    });




    // $('.menu-toggle').click(function () {
    //     $('.menu').toggleClass('menu__show');
    //     // $('.header').toggleClass('header__background');
    // });
});





// ***** scroll *****
    function smoothScroll(Element) {

        Element = document.getElementById(Element);
        var selectedPosX = 0;
        var selectedPosY = 0;
        while (Element != null) {
            selectedPosX += Element.offsetLeft;
            selectedPosY += Element.offsetTop;
            Element = Element.offsetParent;
        }
        window.scrollTo(selectedPosX, selectedPosY);
    }

    // <a onclick="smoothScroll('news')"> go to</a>

    // <div id="news">this</div>

    // css:   html {scroll-behavior: smooth}


// // ***** slick *****
//     $('.sl').slick({
//         infinite: true,
//         dots: true,
//         slidesToShow: 1,
//         slidesToScroll: 1
//     });


