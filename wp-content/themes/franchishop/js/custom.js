jQuery(function($) {
    // плавный скролл от меню до блока
    jQuery(".contents-link").on("click", function(e) {
        e.preventDefault();
        let clickTarget = jQuery(this).attr("href");

        jQuery("body,html").animate({
                scrollTop: jQuery(clickTarget).offset().top,
            },
            800
        );
        return false;
    });


    jQuery('.js-filter-selector').change(function() {
        document.cookie = "currCategory=" + jQuery(this).find('option:selected').text() + "; path=/; max-age=3600";
        window.location.href = jQuery(this).val();
        console.log(jQuery(this).find('option:selected').text())
    });

    jQuery('#catalog-sort').on('change', function(e) {
        e.preventDefault();

        jQuery(this).submit();
    })
});