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

$('.show_confirm').click(function(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
        title: 'Are you want to Update?',
        text: 'This operation will modify the data! Are you sure you want to Update?',
        icon: 'question',
        showCancelButton: true,
        scrollbarPadding: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});

$('.show_delete').click(function(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    Swal.fire({
        title: 'Are you want to Delete your Account?',
        text: 'This operation will delete your account and You can not Sign In with this Account! Are you sure you want to Delete?',
        icon: 'question',
        showCancelButton: true,
        scrollbarPadding: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});


$(document).ready(function() {
    $('.js-departure').select2({
        placeholder:'Choose Departure'
    });
    $('.js-destination').select2({
        placeholder:'Choose Destination'
    });
    $('.js-departure-modal').select2({
        placeholder:'Choose Departure',
        dropdownParent: $('#search-flights-form')
    });

    $('.js-destination-modal').select2({
        placeholder:'Choose Destination',
        dropdownParent: $('#search-flights-form')
    });
});

$(document).on("select2:open", () => {
    document.querySelector(".select2-container--open .select2-search__field").focus()
});




