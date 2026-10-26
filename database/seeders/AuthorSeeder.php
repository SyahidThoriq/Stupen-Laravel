<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            ['name' => 'Ahmad Dahlan', 'email' => 'ahmaddahlan@gmail.com'],
            ['name' => 'Siti Nurhaliza', 'email' => 'sitinurhaliza@gmail.com'],
            ['name' => 'Budi Santoso', 'email' => 'budisantoso@gmail.com'],
            ['name' => 'Dewi Lestari', 'email' => 'dewilestari@gmail.com'],
            ['name' => 'Rian Ardianto', 'email' => 'rianardianto@gmail.com'],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}