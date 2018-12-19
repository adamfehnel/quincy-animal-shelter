jQuery(window).scroll(function() {
    var e = jQuery(document).scrollTop(),
        t = jQuery(document).height(),
        n = jQuery(window).height(),
        i = jQuery("#wrapper-footer").innerHeight(),
        r = jQuery("#back-to-top");
    0 == e || t - i < e + n ? r.hide() : r.show()
});