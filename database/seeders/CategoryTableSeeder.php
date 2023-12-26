<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [
                'name' => 'Forest',
                'slug' => 'forest',
            ],
            [
                'name' => 'Noise rain',
                'slug' => 'noise-rain',
            ],
            [
                'name' => 'At dawn',
                'slug' => 'at-dawn',
            ],
            [
                'name' => 'Office',
                'slug' => 'office',
            ],
            [
                'name' => 'Coffee house',
                'slug' => 'coffee-house',
            ],
        ]);
    }
}
