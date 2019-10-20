<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Comment;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = DB::select('SELECT * FROM posts');
        // return Post::where('title', 'Post 2')->get();
        //$posts = Post::all();
        // $posts = Post::orderBy('title', 'desc')->get();

        $posts = Post::orderBy('created_at', 'desc')->paginate(3);        
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->user()->is_admin === 0){
            return redirect('/posts')->with('error', 'Seu usuário não possui permissão para publicar!');
        }

        $rules = [
            'body' => 'required|max:500',
            'cover_image' => 'image|nullable|max:1999' //valida que deve ser img (png, jpeg, gif...), n é obrigatorio e tamanho maxx 1,99 mb
        ];

        $customMessage = [
            'required' => 'O conteúdo não pode ser vazio!',
            'body.max' => 'A publicação deve ter até 500 caracteres!',
            'cover_image.max' => 'A imagem deve ter até 1,99 mb'
        ];

        $this->validate($request, $rules, $customMessage);

        //trata o envio do arquivo
        if($request->hasFile('cover_image')){
            //pega o nome do arquivo com a extensão
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //pega apenas o nome do arquivo
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //pega apenas a ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //nome para armazenar
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        // Criar a publicação

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Publicação Criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::orderBy('created_at', 'desc')->paginate(3);

        return view('posts.show', array('post' => $post, 'comments' => $comments));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // verificar se o usuário é o dono da publicação
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Usuário sem permissão!');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->user()->is_admin === 0){
            return redirect('/posts')->with('error', 'Seu usuário não possui permissão para editar!');
        }

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //trata o envio do arquivo
        if($request->hasFile('cover_image')){
            //pega o nome do arquivo com a extensão
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //pega apenas o nome do arquivo
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //pega apenas a ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //nome para armazenar
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        // Criar a publicação

        $post = Post::find($id);

        // verificar se o usuário é o dono da publicação
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Usuário sem permissão!');
        }

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Publicação Atualizado com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::find($id);

        // verificar se o usuário é o dono da publicação
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Este usuário não é o dono da publicação');
        }        

        if($post->cover_image != 'noimage.jpg'){
            //deleta a imagem
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Publicação Excluída com Sucesso!');
    }
}
