<?php

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;

    // Memanggil kelas Database yg berada di core/Database.php
    public function __construct() {
        $this->db = new Database;
    }

    public function getAllMahasiswa() {
        // stmt, dbh, prepare, execute, fetch sudah dilakukan di DB Wrapper
        // Jadi tinggal panggil saja dari Database class, lalu method query() didlmnya.
        // Didalam query(), jalankan parameternya pakai DL.
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet(); // Mengembalikan "semua" datanya
    }

    // Untuk mendapat detail mahasiswa, kita perlu return 1 row sesuai $id
    public function getMahasiswaById($id) {
        $this->db->query('SELECT * FROM '.$this->table.' WHERE idMahasiswa=:idMahasiswa');
        $this->db->bind('idMahasiswa', $id);
        return $this->db->single();
    }

    // Untuk 'Menangkap' Insert data mahasiswa
    // Pada param ini, ia gunanya untuk menerima $_POST yang terdapat pada controller Mahasiswa method tambah().  Kita menangkapnya pakai $data saja
    public function tambahDataMahasiswa($data) {
        $query = "INSERT INTO mahasiswa
                    VALUES
                    ('', :nama, :nrp, :email, :jurusan)";
        $this->db->query($query);
        $this->db->bind(':nama', $data['nama']); // pakai $data menangkap hasil dari POSTnya. itu ['nama'] nya didapat darimana? dari name property (name) pada form-control.
        $this->db->bind(':nrp', $data['nrp']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':jurusan', $data['jurusan']);
    
        $this->db->execute();
        // Sampai disini db nya sudah jalan, tapi belum ada angka.  Jika dilihat pada controllers Mahasiswa, pada ($POST) > '0', kan kita butuh angka disini ya? kalau tambahDataMahasiswa menghasilkan angka 1, berarti ada 1 baris baru yg ditambahkan kedalam tabel kita. Nah skrg belum

        // Utk itu kita perlu mengembalikan nilai. Nah tapi didalam class DB kita, kita belum punya sebuah method utk menghitung ada brp baris yg baru ditambahkan, atau dihapus, atau diedit.  Gimana kalau kita bikin dulu ke dalam DB Wrappernya? Jadi bisa ke core/Database.php, tambahkan 1 method paling bawah, dan bikin method rowCount.  Setelah itu, direturnkan.
        return $this->db->rowCount(); // Dgn ini, maka akan menghasilkan angka 1.

        // Untuk notifkan ke user "Insert Data Berhasil", di tutorial berikutnya.
    }

    // Untuk delete mahasiswa
    public function hapusDataMahasiswa($id) {
        $query = 'DELETE FROM mahasiswa WHERE idMahasiswa = :idMahasiswa';
        $this->db->query($query);
        $this->db->bind('idMahasiswa', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}


?>