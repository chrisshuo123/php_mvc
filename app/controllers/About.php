<?php

class About {
    public function index() {
        echo 'About/index';
    }
    public function page() {
        echo 'About/page';
    }

    public function pembuka($name = 'Chrissuo', $hobby = 'Kyokutin Karate') {
        echo "Halo, saya $name, Hobi saya adalah $hobby";
    }
}