jQuery(function() {

    jQuery('.variant').on('click', function(e) {
        e.preventDefault();
        let currValue = jQuery(this).find('.variant-text').text();

        jQuery('.variant').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.js-investment-amount').text(currValue);
    })

    // franchise gallery
    new Swiper(".js-franchise-swiper", {
        slidesPerView: 3,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: ".gallery-next",
            prevEl: ".gallery-prev",
        },
    });

    // sort region select
    jQuery('.js-sort').selectmenu();
});