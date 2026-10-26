<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['title' => 'Harry Potter', 'author_id' => 1, 'price' => 150000],
            ['title' => 'A Game of Thrones', 'author_id' => 2, 'price' => 200000],
            ['title' => 'The Hobbit', 'author_id' => 3, 'price' => 175000],
            ['title' => 'Laskar Pelangi', 'author_id' => 4, 'price' => 95000],
            ['title' => 'Bumi', 'author_id' => 5, 'price' => 89000],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}