$(function() {
    var path = window.location.href;
    $('a.nav-link').each(function() {
        if (this.href === path) {
            $(this).addClass('active')
        }
    })
});

$("input[type=radio]").on('change', function () {
    var i = $('input:checked').val();
    if (i == "user") {
        $('div.form-floating#enterprise').hide()
    }
    else {
        $('div.form-floating#enterprise').show()
    }
});

var x = window.matchMedia("(max-width: 992px)")
collapses(x)
x.addListener(collapses)
function collapses(x) {
    if (x.matches) {
        $('#collapse').css("display", "none")
        $('#searchforms').css("display", "flex")
    }
    else {
        $('#collapse').css("display", "block")
        $('#searchforms').css("display", "none")
    }
};

$(document).ready(function() {
    if (window.location.href.indexOf('#sign-in-modal') != -1) {
        $('#sign-in-modal').modal('show');
    }
});


