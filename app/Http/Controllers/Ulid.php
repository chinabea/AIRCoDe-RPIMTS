<?php

namespace App;

class Ulid 
{
    public static function generate()
    {
        // Here you can call the Ulid::generate() method from the rorecek/laravel-ulid package.
        return \rorecek\Ulid\Ulid::generate();
    }
}
