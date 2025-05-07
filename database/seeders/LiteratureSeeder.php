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
            'file_url' => 'storage/ebooks/laravel11.pdf',
            'category_id' => 1, // Pastikan ID kategori ini ada di database
            'description' => 'Panduan lengkap Laravel 11',
            'detail' => json_encode(['pages' => 200]),
        ]);
    }
}
