<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiCRUDcontroller extends Controller
{
    public function create(Request $request)
    {
        $news = new \App\News();
        $news->author_id = $request->post('author_id');
        $news->title = $request->post('title');
        $news->body = $request->post('body');
        $news->img = $request->post('img');
        $news->save();
        return response()->json($news, 201);
    }

    public function update(Request $request, $id)
    {
        $news = \App\News::find($id);
        $news->author_id = $request->post('author_id');
        $news->title = $request->post('title');
        $news->body = $request->post('body');
        $news->img = $request->post('img');
        $news->save();
        return response()->json($news, 200);
    }
}
