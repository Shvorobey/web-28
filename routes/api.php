<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response()->json(['User' => ['Name' => 'Ivan', 'Email' => 'example@mail.ua']], 200);
});

Route::get('/news', function () {
    return response()->json(\App\News::paginate(10), 200);
});

Route::get('/news/{id}', function ($id) {
    try {
        $news = \App\News::findOrFail($id);
    } catch (Exception $exception) {
        return response()->json(['Msg' => 'Такой новости не существует'], 404);
    }
    return response()->json($news, 200);
});

Route::post('/news', 'ApiCRUDcontroller@create');

Route::put('/news/{id}', 'ApiCRUDcontroller@update');

Route::delete('/news/{id}', function ($id) {
    $news = \App\News::find($id);
    $news->delete();
    return response()->json(['msg' => $news->id . 'Новость успешно удалена'], 200);
});

