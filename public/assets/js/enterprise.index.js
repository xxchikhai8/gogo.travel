$(function() {
    var path = window.location.href;
    $('a.nav-link').each(function() {
        if (this.href === path) {
            $(this).addClass('active')
        }
    })
});
