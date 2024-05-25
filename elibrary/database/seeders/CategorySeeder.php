<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $kategori = [
            'Fiksi',
            'Non-Fiksi',
            'Fiksi Ilmiah',
            'Fantasi',
            'Misteri',
            'Thriller',
            'Romansa',
            'Horor',
            'Biografi',
            'Pengembangan Diri',
            'Sejarah',
            'Anak-Anak',
            'Remaja',
            'Perjalanan',
            'Masakan',
            'Kesehatan',
            'Novel Grafis',
            'Puisi',
            'Religi',
            'Sains',
            'Teknologi',
            'Bisnis',
            'Seni',
            'Musik'
        ];

        foreach ($kategori as $value) {
            # code...
            Category::create([
                'name' => $value,
            ]);
        }
    }
}
