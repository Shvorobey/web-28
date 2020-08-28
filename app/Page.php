<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function show_pages()
    {
        return Page::all();
    }
}
