<?php

namespace App\Http\Controllers;

use App\News;
use App\Page;
use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $news = News::orderBy('id', 'DESC')->paginate(10);
        $users = User::orderBy('id', 'DESC')
            ->limit(5)
            ->get();
        $counts = User::all()->count();
        return view('index', [
            'news' => $news,
            'users' => $users,
            'counts' => $counts,
        ]);
    }
}
