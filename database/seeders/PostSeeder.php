<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Usuari;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {       
        $usuaris = Usuari::all();
        $usuaris->each(function($usuari){
            Post::factory()->count(3)->create([
                'usuari_id' => $usuari->id
            ]);
        });
    }
}
