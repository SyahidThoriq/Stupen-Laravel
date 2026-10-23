<?php

namespace App\Models;

class Author
{
    public static function getAuthors()
    {
        return [
            ['id' => 1, 'name' => 'J.K. Rowling', 'email' => 'jkrowling@example.com'],
            ['id' => 2, 'name' => 'George R.R. Martin', 'email' => 'grrm@example.com'],
            ['id' => 3, 'name' => 'J.R.R. Tolkien', 'email' => 'tolkien@example.com'],
            ['id' => 4, 'name' => 'Andrea Hirata', 'email' => 'andrea@example.com'],
            ['id' => 5, 'name' => 'Tere Liye', 'email' => 'tereliye@example.com'],
        ];
    }
}