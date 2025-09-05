<?php

class App {
    public function __construct() {
        //var_dump($_GET);
        $url = $this -> parseURL();
        var_dump($url);
    }

    public function parseURL() {

        if(isset($_GET['url']) ) {
            $url = rtrim($_GET['url'], '/'); // rtrim agar slash '/' dibagian paling depannya URL bisa ngilang saat ditekan enter
            $url = filter_var($url, FILTER_SANITIZE_URL); // Membersihkan URL dari karakter2 yang ngacau utk menghindar hacker
            $url = explode('/', $url); // Dibagian ini, URL nya kita pecah berdasarkan tanda slash '/' menggunakan fungsi 'explode'.  awalnya '$url = explode(delimiter, string)', yang delimiter itu slash '/', jadi slash-slashnya ilang, jadi string2 nya berubah menjadi elemen array, dari yang mana? dari '$url'. 
            // array => key itu yang kita butuhkan utk nanti kita jalankan controller dan method kita.  Sampai sini, kita sudah berhasil melakukan routing dan indeks kita.
            
             // Debug dengan format rapi
            echo "<pre>";
            echo "array (size=" . count($url) . ")\n";
            foreach ($url as $key => $value) {
                echo "  $key => string '$value' (length=" . strlen($value) . ")\n";
            }
            echo "</pre>";
            
            return $url;
        }
    }
}