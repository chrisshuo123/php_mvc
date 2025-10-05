<?php

class About extends Controller {
    // pada contoh ini, method index membutuhkan data, maka pada $this->view, harus tambahkan $data
    public function index($nama = 'Chrissuo', $pekerjaan = 'Kyokushin', $umur = 30) {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About Us';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
        //echo "Halo, saya $name, Hobi saya adalah $hobby.  Saya berumur $umur tahun.";
    }
    // Pada contoh ini, method page tidak dibutuhkan data.  Jika tidak, pada $this->view tdk perlu ditambahkan apa2.
    public function page() {
        $data['judul'] = 'Page';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
        //echo 'About/page';
    }
}