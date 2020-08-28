<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contacts()
    {
        $contacts = Contact::all();
        return view('contacts', ['contacts' => $contacts]);
    }

    public function page($key)
    {
        $page = Page::where('page', '=', $key)->first();
        return view('all', ['page' => $page]);
    }
}
