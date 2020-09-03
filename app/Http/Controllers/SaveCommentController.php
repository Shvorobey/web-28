<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class SaveCommentController extends Controller
{
    public function __invoke(Request $request)
    {
        if (\Auth::check()) {
            if ($request->method() == 'POST') {
                $last_comment = (Comment::where('author', '=', \Auth::user()->name)
                    ->orderBy('created_at', 'desc')
                    ->first())
                    ->created_at
                    ->format('U');
                $period = time() - $last_comment;

                $comment = new Comment();
                $comment->news_id = $request->input('news_id');
                $comment->author = $request->input('author');
                $comment->comment = $request->input('comment');
                $comment->save();

                return redirect()->route('single_news', $request->input('news_id'));
            }
        }
    }
}
