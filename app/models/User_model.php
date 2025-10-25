<?php

class User_model { // < Model ini dipanggil oleh Controller, lalu dipanggil satu method didlmnya, dan masukkan isinya di dalam $data.
    private $nama = 'chrissuoo';

    public function getUser() {
        return $this->nama;
    }
}

?>