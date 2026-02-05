<?php

namespace App\Http\Controllers\Api;

//use App\Http\Controllers\Controller;

use App\Http\Requests\PeliculaRequest;
use Illuminate\Http\Request;
use App\Models\Pelicula;

use Illuminate\Routing\Controller;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware(['auth:sanctum'], ['except' =>['index', 'show']]);
    }

    public function index()
    {
        $peliculas = Pelicula::with(['comentaris'])->get();
        $peliculas = $peliculas->map(function($pelicula){
            return [
                'id'=> $pelicula->id,
                'titulo'=>$pelicula->titulo,
                'descripcion'=>$pelicula->descripcion,
                'comentaris'=>$pelicula->comentaris
            ];
        });
        return response()->json($peliculas, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeliculaRequest $request)
    {
        $pelicula = new Pelicula();
        $pelicula->titulo = $request->titulo;
        $pelicula->descripcion = $request->descripcion;

        return response()->json($pelicula, 201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelicula $pelicula)
    {
        return response()->json($pelicula, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
