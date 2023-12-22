<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('sounds')->truncate();

        DB::table('sounds')->insert([
            [
                'name' => 'forest',
                'category' => 'Nature',
                'path' => 'sounds/forest.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'birds',
                'category' => 'Nature',
                'path' => 'sounds/birds.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'bonfire',
                'category' => 'Nature',
                'path' => 'sounds/bonfire.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'water',
                'category' => 'Nature',
                'path' => 'sounds/water.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'wind',
                'category' => 'Nature',
                'path' => 'sounds/wind.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'office',
                'category' => 'Office',
                'path' => 'sounds/office.mp3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
