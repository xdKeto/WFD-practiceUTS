<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
           [
            'movie_title' => 'Transformer',
            'duration' => 126,
            'release_date' => '2012-10-24',
            'created_at' => now(),
            'updated_at' => now(),
           ],
           [
            'movie_title' => 'Inception',
            'duration' => 148,
            'release_date' => '2010-07-16',
            'created_at' => now(),
            'updated_at' => now(),
           ],
           [
            'movie_title' => 'The Dark Knight',
            'duration' => 152,
            'release_date' => '2008-07-18',
            'created_at' => now(),
            'updated_at' => now(),
           ],
           [
            'movie_title' => 'Interstellar',
            'duration' => 169,
            'release_date' => '2014-11-07',
            'created_at' => now(),
            'updated_at' => now(),
           ],
           [
            'movie_title' => 'Avengers: Endgame',
            'duration' => 181,
            'release_date' => '2019-04-26',
            'created_at' => now(),
            'updated_at' => now(),
           ],
        ]);
    }
}