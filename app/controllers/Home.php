<?php

class Home extends Controller {
    public function index() {
        // Pada data ini, kita bisa kirimin data ke view:
        $data['judul'] = "Home";
        // Contoh, saya maunya dikirim ke models dulu bukan views pada data nama, maka:
        $data['nama'] = $this->model('User_model')->getUser(); // ke class model, method 'getUser()'
        $this->view('templates/header', $data); // Dimana judul 'Home' dikirim ke view pada header
        $this->view('home/index', $data); // << nama dikirim ke models akan dibawa kesini
        $this->view('templates/footer');
    }
}