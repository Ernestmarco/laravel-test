<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Usuari;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',
            ['only' => ['create', 'store', 'edit', 'update', 'destroy']]
        );
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        $post = new Post();
        $post->titol = $request->input('titol');
        $post->contingut = $request->input('contingut');
        $post->usuari()->associate(Usuari::get()->first());
        $post->save();

        return redirect()
            ->route('posts.index')
            ->with('mensaje_ok', 'Post insertado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        if($post->usuari->id != Auth::user()->id){
            abort(403, "No tienes permisos para modificar este post");
        }
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->titol = $request->validated('titol');
        $post->contingut = $request->validated('contingut');
        $post->save();

        return redirect()
            ->route('posts.index')
            ->with('mensaje_ok', 'Post actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->usuari->id != Auth::user()->id){
            abort(403, "No tienes permisos para eliminar este post");
        }
        
        $post->delete();
        return redirect()->route('posts.index')->with('mensaje_ok', 'Post eliminat correctament.');
    }

    function nuevoPrueba()
    {
        $post = new Post();
        $rand  = rand(1, 1000);
        $post->titol = 'Post ' . $rand;
        $post->contingut = 'Contingut del nou post ' . $rand;
        $post->save();
        return redirect()->route('posts.index')->with('mensaje_ok', 'Post afegit correctament.');
    }

    function editPrueba($id)
    {
        $post = Post::findOrFail($id);
        $post->titol .= '[Editat]';
        $post->contingut .= '[Editat]';
        $post->save();
        return redirect()->route('posts.index')->with('mensaje_ok', 'Post modificat correctament.');
    }
}
