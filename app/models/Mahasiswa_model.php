<?php

class Mahasiswa_model {
    private $mhs = [
        [
            "nama" => "Andi Wijaya",
            "nrp" => "112310001",
            "email" => "andi.wijaya@email.com",
            "jurusan" => "Teknik Informatika"
        ],
        [
            "nama" => "Sari Damayanti",
            "nrp" => "112310002",
            "email" => "sari.damayanti@mail.com",
            "jurusan" => "Sistem Informasi"
        ],
        [
            "nama" => "Budi Santoso",
            "nrp" => "112310003",
            "email" => "budi.santoso99@example.com",
            "jurusan" => "Teknik Elektro"
        ],
        [
            "nama" => "Citra Lestari",
            "nrp" => "112310004",
            "email" => "c.lestari@students.ac.id",
            "jurusan" => "Manajemen Bisnis"
        ],
        [
            "nama" => "Dimas Pratama",
            "nrp" => "112310005",
            "email" => "dimas.pratama@mail.com",
            "jurusan" => "Desain Komunikasi Visual"
        ]
    ];

    public function getAllMahasiswa() {
        return $this->mhs;
        
    }
}


?>