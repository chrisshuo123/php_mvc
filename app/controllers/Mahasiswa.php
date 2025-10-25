<?php

class Mahasiswa extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Mahasiswa';
        // Diambil dari models/Mahasiswa_model.php
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id) {
        $data['judul'] = 'Detail Mahasiswa';
        // Diambil dari models/Mahasiswa_model.php
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    // Buat Insert Data Mahasiswa
    // public function tambah() {
    //     //var_dump($_POST); // << Ini buat memastikan datanya terkirim semua
    //     // Kalau nilainya > 0 berarti ada baris baru yg ditambahkan.
    //     if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) { //<< Jika dilihat pada ($POST) > '0', kan kita butuh angka disini ya? kalau method tambahDataMahasiswa di Mahasiswa_model menghasilkan angka 1, berarti ada 1 baris baru yg ditambahkan kedalam tabel kita. Nah skrg belum. Utk itu, kita perlu mengembalikan nilai di Mahasiswa_models. Tpi sblmnya, bikin DB Wrapper dulu di core/Database.php berupa method rowCount(). Stelahnya, return kan pada mahasiswa_model di dlm method tambahDataMahasiswa.
    //         header('Location: ' . BASEURL . '/mahasiswa');
    //         exit;
    //     }
    // } // Ini sama kyk kita lakukan di PHP Dasar, tapi pakai yg gaya MVC. Lanjut tambaa method tambahDataMahasiswa pada models.

    public function tambah() {
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) { //<< Jika dilihat pada ($POST) > '0', kan kita butuh angka disini ya? kalau method tambahDataMahasiswa di Mahasiswa_model menghasilkan angka 1, berarti ada 1 baris baru yg ditambahkan kedalam tabel kita. Nah skrg belum. Utk itu, kita perlu mengembalikan nilai di Mahasiswa_models. Tpi sblmnya, bikin DB Wrapper dulu di core/Database.php berupa method rowCount(). Stelahnya, return kan pada mahasiswa_model di dlm method tambahDataMahasiswa.
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}

?>