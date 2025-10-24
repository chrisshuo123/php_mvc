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
}


?>