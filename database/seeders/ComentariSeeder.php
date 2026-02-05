<?php

namespace Database\Seeders;

use App\Models\Comentari;
use App\Models\Post;
use App\Models\Pelicula;
use App\Models\Usuari;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComentariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $peliculas = Pelicula::all();

        // $posts->each(function($post){
        //     Comentari::factory(3)->create([
        //         'post_id' => $post->id                
        //     ]);
        // });

        $peliculas->each(function($pelicula){
            Comentari::factory(3)->create([
                'pelicula_id' => $pelicula->id                
            ]);
        });

    }
}
