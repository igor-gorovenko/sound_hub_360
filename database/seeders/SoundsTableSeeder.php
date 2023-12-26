<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class SoundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('sounds')->truncate();

        $forestCategoryId = Category::where('name', 'Forest')->value('id');
        $officeCategoryId = Category::where('name', 'Office')->value('id');

        DB::table('sounds')->insert([
            [
                'name' => 'forest',
                'category' => $forestCategoryId,
                'path' => 'sounds/forest.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'birds',
                'category' => $forestCategoryId,
                'path' => 'sounds/birds.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'bonfire',
                'category' => $forestCategoryId,
                'path' => 'sounds/bonfire.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'water',
                'category' => $forestCategoryId,
                'path' => 'sounds/water.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'wind',
                'category' => $forestCategoryId,
                'path' => 'sounds/wind.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'office',
                'category' => $officeCategoryId,
                'path' => 'sounds/office.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
