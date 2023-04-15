<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artist::factory()
            ->times(10)
            ->create();

        foreach (Album::all() as $album) {
            $artists = Artist::inRandomOrder()->pluck('id');
            $album->artists()->attach($artists);
        }
    }
}
