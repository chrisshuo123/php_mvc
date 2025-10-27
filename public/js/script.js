$(function() {
    $('.tombolTambahData').on('click', function() {


        $('#judulModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost/php-mvc/public/mahasiswa/tambah');
    
    });


    $('.tampilModalUbah').on('click', function() {


        $('#judulModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/php-mvc/public/mahasiswa/ubah');
        // gapapa walau kita masih ga punya method ubah
        
        // Bisa klik kanan > inspect > console, klik 'ubah' setiap row, akan menampilkan nomor row sesuai:
        const id = $(this).data('id'); //idMahasiswa
        console.log('Clicked ID: ', id);
        
        $.ajax({
            url: 'http://localhost/php-mvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json', // disable json saat lagi debug method getubah
            success: function(data) {
                console.log('Data recieved from server: ', data);
                console.log('Data Properties:');
                console.log('- id: ', data.id);
                console.log('- idMahasiswa: ', data.idMahasiswa);
                console.log('- nama: ', data.nama);
                console.log('- nrp: ', data.nrp);
                console.log('- email: ', data.email);
                console.log('- jurusan: ', data.jurusan);

                // Coba semua kemungkinan
                //console.log(data); // pakai ini utk detect json pada console log browser
                $('#nama').val(data.nama);
                $('#nrp').val(data.nrp);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                //$('#id').val(data.id); // Error log: id => kosong, maka coba debug bawah ini
                
                // Coba berbagai kemungkinan field ID
                if(data.id) {
                    $('#id').val(data.id);
                    console.log('Set ID from data id: ', data.id);
                } else if (data.idMahasiswa) {
                    $('#id').val(data.idMahasiswa);
                    console.log('Set ID from data.idMahasiswa: ', data.idMahasiswa);
                } else {
                    console.log('No ID field found in data!');
                }

                // Verify form values (UPDATE: cek ID kosongan)
                console.log('Hidden ID values after set: ', $('#id').val());
                console.log("All form values:");
                console.log('ID: ', $('#id').val());
                console.log('Nama: ', $('#nama').val());
                console.log('NRP: ', $('#nrp').val());
                // Final verify on the hidden ID value:
                console.log("");
                console.log('Final hidden ID value: ', $('#id').val());
            },
            error: function(xhr, status, error) {
                console.log('AJAX Error: ', error);
                console.log('Response Text: ', xhr.responseText);
            }
        });
    });
});
//console.log('ok!');