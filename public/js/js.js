$(document).ready(function(){
    $('.carousel[data-type="multi"] .item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i=0;i<2;i++) {
            next=next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    });
    var count = 0;
    $('.owl-carousel').each(function () {
        $(this).attr('id', 'owl-demo' + count);
        $('#owl-demo' + count).owlCarousel({
            navigation: true,
            slideSpeed: 300,
            pagination: true,
            singleItem: true,
            autoPlay: 2000,
            autoHeight: true
        });
        count++;
    });
    //hidden nav
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("2200");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("2200");
            $(this).toggleClass('open');
        }
    );

});