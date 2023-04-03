$(function() {
    var path = window.location.origin + window.location.pathname;
    $('a.nav-link').each(function() {
        if (this.href === path) {
            $(this).addClass('active')
        }
    })
});

function formatSearch(item) {
    var selectionText = item.text.split("|");
    var $returnString = $('<span>' + selectionText[0] + '</br><b>' + selectionText[1] + '</b></br>' + selectionText[2] +'</span>');
    return $returnString;
};
function formatSelected(item) {
    var selectionText = item.text.split("|");
    var $returnString = $('<span>' + selectionText[0].substring(0, 21) +'</span>');
    return $returnString;
};
$('.select2').select({
    templateResult: formatSearch,
    templateSelection: formatSelected
});

$("input[type=radio]").on('change', function () {
    var i = $('input:checked').val();
    if (i == "user") {
        $('div.form-floating#enterprise').hide()
    }
    else {
        $('div.form-floating#enterprise').show();
        var input = document.getElementById('enterpri');
        input.setAttribute('required', '');
        var input1 = document.getElementById('enterpri1');
        input1.setAttribute('required', '');
        var input2 = document.getElementById('enterpri2');
        input2.setAttribute('required', '');
        var input3 = document.getElementById('enterpri3');
        input3.setAttribute('required', '');
    }
});


$(function() {
    $("#reDay").on("click",function() {
      $("#return").toggle(this.checked);
    });
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


