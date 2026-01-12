$(function() {
    $('.tombolTambahData').on('click', function() {
        $('#judulModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    })
    $('.tampilModalUbah').on('click', function() {
        $('#judulModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        
        // Bisa klik kanan > inspect > console, klik 'ubah' setiap row, akan menampilkan nomor row sesuai:
        const id = $(this).data('id');
        console.log(id);
    });
});
//console.log('ok!');