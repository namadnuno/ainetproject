<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private const NUM_PER_PAGE = 20;
    
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {
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
        $comment = new Comment();
        $comment->fill($request->all());
        $comment->user_id = auth()->user()->id;
        $comment->blocked = 0;
        $comment->save();

        return back()->with('success', 'Commentário Enviado');
    }

    public function change()
    {
        $comment = Comment::find(request('comment_id'));
        if ($comment->blocked == '1') {
            $comment->blocked = 0;
        } else {
            $comment->blocked = 1;
        }
        $comment->save();
        return back()->with(
            'success',
            $comment->blocked == '1' ? 'Bloquado' : 'Desbloqueado'
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
