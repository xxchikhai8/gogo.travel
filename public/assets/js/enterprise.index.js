$(function() {
    var path = window.location.origin + window.location.pathname;
    $('a.nav-link').each(function() {
        if (this.href === path) {
            $(this).addClass('active')
        }
    })
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

$(document).ready(function() {
    $('.js-departure').select2({
        placeholder:'Choose Departure'
    });
    $('.js-destination').select2({
        placeholder:'Choose Destination'
    });
});

$(document).on("select2:open", () => {
    document.querySelector(".select2-container--open .select2-search__field").focus()
});
