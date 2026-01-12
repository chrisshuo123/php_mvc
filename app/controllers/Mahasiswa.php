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
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id) {
        if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    // public function getubah() {
    //     //$this->model('Mahasiswa_model')->getDataUbah($_POST['id']);
    //     // Karena ada getMahasiswaById yg querynya sesuai, maka getDataUbah tidak perlu
    //     // $this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']);
    //     // mengingat diatas adl array_assoc, saat di'echo pasti ga mau.  Supaya datanya bukan array associative tapi bentuknya json, harus dibungkus dgn sebuah fungsi namanya json_encode:
    //     echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    //     // Jadi diatas adalah json.  Dan json akan dikirim kedalam 'data' di script $.ajax, datatype json.
    // }

    public function getubah() {
        // Debug button 'ubah'
        //echo 'ok';
        //echo $_POST['id']; //idMahasiswa adalah id. karena si data-id.
        error_log("getubah called with ID: " . $_POST['id']);

        $result = $this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']);
        //echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));

        error_log("Result from getMahasiswaById:");
        error_log(print_r($result, true));

        echo json_encode($result);
    }

    public function ubah() {
        // Debug dicommand "//" dulu jika tidak ada error, agar saat update berhasil, notif respon menyatakan "berhasil". Kenapa? Karna error_log dan assoc jika ditaruk sebelum header, menyebabkan error pada pop-up notif sehingga saat update berhasil notif menyatakan "gagal".
        // error_log("=== CONTROLLER UBAH METHOD ===");
        // error_log("POST data: " . print_r($_POST, true));

        //$result = $this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST);

        //error_log("Result from model: " . $result);

        if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            error_log("SUCCESS: Data updated");
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            error_log("FAILED: No rows updated");
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}

?>