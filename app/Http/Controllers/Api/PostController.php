<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Usuari;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller; //Per al middleware

class PostController extends Controller
{
    
    public function __construct(){
        $this->middleware(['auth:sanctum'], ['except' =>['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::with(['comentaris'])->get();
        $posts = $posts->map(function($post){
            return [
                "id" => $post->id,
                "titol" => $post->titol,
                "contingut" => $post->contingut,
                "usuari" => $post->usuari->login,
                "comentaris" => $post->comentaris,
            ];
        });
        return response()->json($posts, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $usuari_id = $request->usuari_id;
        $usuari = Usuari::findOrFail($usuari_id);
        $post = new Post();
        $post->titol = $request->titol;
        $post->contingut = $request->contingut;
        $post->usuari()->associate($usuari);
        $post->save();

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->titol = $request->titol;
        if($request->has('contingut')){
            $post->contingut = $request->contingut;
        }        
        $post->update();
        return response()->json($post, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(null, 204);
    }
}
