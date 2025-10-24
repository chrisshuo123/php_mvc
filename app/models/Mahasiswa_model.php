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
}


?>