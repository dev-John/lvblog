<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Comment;
use App\Post;
use DB;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'comment' => 'required|max:128'
        ];

        $customMessage = [
            'required' => 'O comentário não pode ser vazio!',
            'comment.max' => 'O comentário deve ter até 128 caracteres!'
        ];

        $this->validate($request, $rules, $customMessage);

        $user_id = auth()->user()->id;
        $id = (int)$request->input('id');

        $comment = new Comment;
        $comment->post_id = $id;
        $comment->body = $request->input('comment');
        $comment->user_id = $user_id;
        
        // var_dump($user_id);

        $comment->save();

        return redirect()->route('posts.show',[$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($comment_id)
    {
        $comment = Comment::find((int)$comment_id);

        // verificar se o usuário é o dono da publicação
        if(auth()->user()->id !== $comment->user_id){
            return redirect('/posts')->with('error', 'Usuário sem permissão!');
        }

        return view('comments.edit')->with('comment', $comment);
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

        $rules = [
            'body' => 'required|max:128'
        ];

        $customMessage = [
            'required' => 'O comentário não pode ser vazio!',
            'body.max' => 'O comentário deve ter até 128 caracteres!'
        ];

        $this->validate($request, $rules, $customMessage);

        // Encontra o comentário

        $comment = Comment::find($id);

        // verificar se o usuário é o dono da publicação
        if(auth()->user()->id !== $comment->user_id){
            return redirect('/posts')->with('error', 'Usuário sem permissão!');
        }

        // Encontra o post

        $post = Post::find($comment->post_id);

        $comment->body = $request->input('body');
        $comment->save();

        $comments = Comment::orderBy('created_at', 'desc')->paginate(3);

        return view('posts.show', array('post' => $post, 'comments' => $comments))->with('success', 'Comentário Atualizado com Sucesso!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);


        // verificar se o usuário é o dono da publicação
        if(auth()->user()->id !== $comment->user_id){
            return redirect('/posts')->with('error', 'Este usuário não é o dono da publicação');
        }        

        $comment->delete();
        $post = Post::find($comment->post_id);
        $comments = Comment::orderBy('created_at', 'desc')->paginate(3);

        return view('posts.show', array('post' => $post, 'comments' => $comments))->with('success', 'Comentário Excluído com Sucesso!');;

        // return redirect('/posts')->with('success', 'Publicação Excluída com Sucesso!');
    }
}
