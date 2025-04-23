<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Literature;

class LiteratureSeeder extends Seeder {
    public function run() {
        Literature::create([
            'title' => 'Panduan Laravel 11',
            'author' => 'John Doe',
            'publisher' => 'Tech Publisher',
            'year' => 2024,
            'type' => 'ebook',
            'file_url' => 'storage/ebooks/laravel11.pdf',
            'stock' => null
        ]);
    }
}
