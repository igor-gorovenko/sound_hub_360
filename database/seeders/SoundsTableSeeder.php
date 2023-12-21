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
                'path' => 'sounds/forest.mp3',
            ],
            [
                'name' => 'birds',
                'path' => 'sounds/birds.mp3',
            ],
            [
                'name' => 'fire',
                'path' => 'sounds/fire.mp3',
            ],
            [
                'name' => 'water',
                'path' => 'sounds/water.mp3',
            ],
            [
                'name' => 'wind',
                'path' => 'sounds/wind.mp3',
            ],
            [
                'name' => 'office',
                'path' => 'sounds/office.mp3',
            ],
        ]);
    }
}
