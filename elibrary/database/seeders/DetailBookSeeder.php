<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $books = [
            [
                'cover' => 'cover_one.jpg',
                'synopsis' => 'This is the synopsis for Book One.',
                'year' => 2001,
                'publisher' => 'Publisher One',
            ],
            [
                'cover' => 'cover_two.jpg',
                'synopsis' => 'This is the synopsis for Book Two.',
                'year' => 2002,
                'publisher' => 'Publisher Two',
            ],
            [
                'cover' => 'cover_three.jpg',
                'synopsis' => 'This is the synopsis for Book Three.',
                'year' => 2003,
                'publisher' => 'Publisher Three',
            ],
            [
                'cover' => 'cover_four.jpg',
                'synopsis' => 'This is the synopsis for Book Four.',
                'year' => 2004,
                'publisher' => 'Publisher Four',
            ],
            [
                'cover' => 'cover_five.jpg',
                'synopsis' => 'This is the synopsis for Book Five.',
                'year' => 2005,
                'publisher' => 'Publisher Five',
            ],
            [
                'cover' => 'cover_six.jpg',
                'synopsis' => 'This is the synopsis for Book Six.',
                'year' => 2006,
                'publisher' => 'Publisher Six',
            ],
            [
                'cover' => 'cover_seven.jpg',
                'synopsis' => 'This is the synopsis for Book Seven.',
                'year' => 2007,
                'publisher' => 'Publisher Seven',
            ],
            [
                'cover' => 'cover_eight.jpg',
                'synopsis' => 'This is the synopsis for Book Eight.',
                'year' => 2008,
                'publisher' => 'Publisher Eight',
            ],
            [
                'cover' => 'cover_nine.jpg',
                'synopsis' => 'This is the synopsis for Book Nine.',
                'year' => 2009,
                'publisher' => 'Publisher Nine',
            ],
            [
                'cover' => 'cover_ten.jpg',
                'synopsis' => 'This is the synopsis for Book Ten.',
                'year' => 2010,
                'publisher' => 'Publisher Ten',
            ],
        ];

        foreach ($books as $index => $book) {
            $id = $index + 10;
            Book::updateOrCreate(
                ['id' => $index + 3],
                [
                    'synopsis' => $book['synopsis'],
                    'year' => $book['year'],
                    'publisher' => $book['publisher'],
                    'cover' => "https://picsum.photos/id/$id/210/290",
                ]
            );
        }
    }
}
