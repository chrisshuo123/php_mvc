<?php

class About extends Controller {
    // pada contoh ini, method index membutuhkan data, maka pada $this->view, harus tambahkan $data
    public function index($nama = 'Chrissuo', $pekerjaan = 'Kyokushin', $umur = 30) {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $this->view('about/index', $data);
        //echo "Halo, saya $name, Hobi saya adalah $hobby.  Saya berumur $umur tahun.";
    }
    // Pada contoh ini, method page tidak dibutuhkan data.  Jika tidak, pada $this->view tdk perlu ditambahkan apa2.
    public function page() {
        $this->view('about/page');
        //echo 'About/page';
    }
}