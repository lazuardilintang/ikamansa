$(document).ready(function() {
    // hilangkan tombol cari

    // event ketika keyword ditulis
    $('#keyword').on('keyup', function() {
        // munculkan icon loading
        //$('.loader').show();
        //ajax menggunakan load
        $('#tampilkan').load('../search.php?keyword=' + $('#keyword').val());
        // $.get()
        //$.get('seacrh.php?keyword=' + $('#keyword').val(), function(data) {

           // $('#tampilkan').html(data);
            //$('.loader').hide();

        });

    });