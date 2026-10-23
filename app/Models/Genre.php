<?php

namespace App\Models;

class Genre
{
    public static function getGenres()
    {
        return [
            ['id' => 1, 'name' => 'Fiction', 'description' => 'Fictional stories and novels'],
            ['id' => 2, 'name' => 'Non-Fiction', 'description' => 'Real-life facts and educational books'],
            ['id' => 3, 'name' => 'Science Fiction', 'description' => 'Futuristic and technological themes'],
            ['id' => 4, 'name' => 'Fantasy', 'description' => 'Magical worlds and mythical creatures'],
            ['id' => 5, 'name' => 'Biography', 'description' => 'Life stories of real people'],
        ];
    }
}