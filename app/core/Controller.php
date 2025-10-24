<?php

class Controller {
    public function view($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }

    // Kalau view ga perlu instansiasi krn hanya tampilan, isinya html saja
    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        // Kalau models karna dia class, jadi harus diinstansiasi dulu spy bisa kita pakai
        return new $model;
    }
    // Ketika kita panggil disini, berarti kita panggil class models nya pada direktori 'controllers' sekaligus melakukan instansiasi
    // Jadi harusnya kita bisa panggil methodnya.
}