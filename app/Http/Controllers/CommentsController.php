<?php

namespace App\Http\Controllers;

use ClassPreloader\Config;
use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comment')->with(['comments' => $comments->sortByDesc('created_at')]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_name' => 'required|max:255',
            'user_comment' => 'required'
        ]);

        $date = new \DateTime();
        $date = $date->getTimeStamp();
        $request->request->add(['created_at' => $date, 'updated_at' => $date]);

        $data = $request->all();

        $comment = new Comment();
        $comment->fill($data);
        $comment->save();
        return redirect('/comments');
    }
}
