<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Request;

class CommentController extends Controller
{
    const NUM_PER_PAGE = 20;
    
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {
        $this->authorize('index', Comment::class);
        $comments = Comment::ofType(request('filter'))
        ->orderBy(
            request('orderby') ? request('orderby') : 'created_at',
            request('order') ? request('order') : 'DESC'
        )->paginate(static::NUM_PER_PAGE);

        return view('comments.index', compact('comments'));
    }

    /**
     * Guardar um novo comentário
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $this->authorize('comment', Request::find(request('request_id')));
        $comment = new Comment();
        $comment->fill($request->all());
        $comment->user_id = auth()->user()->id;
        $comment->blocked = 0;
        $comment->save();

        return back()->with('success', 'Commentário Enviado');
    }

    public function change()
    {
        $this->authorize('change', Comment::class);

        $comment = Comment::find(request('comment_id'));
        if ($comment->blocked == '1') {
            $comment->blocked = 0;
        } else {
            $comment->blocked = 1;
        }
        $comment->save();
        return back()->with(
            'success',
            $comment->blocked == '1' ? 'Bloqueado' : 'Desbloqueado'
        );
    }
}
