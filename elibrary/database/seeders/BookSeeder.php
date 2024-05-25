<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $titles = [
            'Book One',
            'Book Two',
            'Book Three',
            'Book Four',
            'Book Five',
            'Book Six',
            'Book Seven',
            'Book Eight',
            'Book Nine',
            'Book Ten'
        ];

        // Array of sample authors
        $authors = [
            'Author A',
            'Author B',
            'Author C',
            'Author D',
            'Author E'
        ];

        // Generate random category_ids
        $categories = range(4, 28);
        shuffle($categories);

        foreach ($titles as $title) {
            Book::create([
                'title' => $title,
                'author' => $authors[array_rand($authors)],
                'category_id' => implode(',', array_slice($categories, 0, rand(1, 3))),
                'stock' => rand(1, 50)
            ]);
        }
    }
}
