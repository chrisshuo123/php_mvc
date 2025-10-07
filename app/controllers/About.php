<?php

class About {
    public function index($name = 'Chrissuo', $hobby = 'Kyokutin Karate') {
        echo "Halo, saya $name, Hobi saya adalah $hobby";
    }
    public function page() {
        echo 'About/page';
    }
}