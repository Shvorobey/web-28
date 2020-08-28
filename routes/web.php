<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', IndexController::class)->name('index');

Route::get('/page/{key}', 'PageController@page')->name('page');

Route::get('/contacts', 'PageController@contacts')->name('contacts');

Route::get('/author/{key}', News_by_author_controller::class)->name('news_by_authors');

Route::get('/news/{id}', Single_news_controller::class)->name('single_news');

Route::get('/category/{key}', News_by_category::class)->name('news_by_category');

Route::post('/news/{id}', SaveCommentController::class)->name('save_comment');


// ADMIN PANEL

Route::get('/admin/add_news', 'Admin_news_Controller@add')->name('add_news_get');

Route::post('/admin/add_news', 'Admin_news_Controller@save')->name('add_news_post');

Route::get('/admin/edit_news/{id}', 'Admin_news_Controller@edit')->name('edit_news_get');

Route::post('/admin/edit_news/{id}', 'Admin_news_Controller@edit_save')->name('edit_news_post');

Route::get('/admin/delete_news', 'Admin_news_Controller@delete')->name('delete_news_get');

Route::delete('/admin/delete_news', 'Admin_news_Controller@delete')->name('delete_news_delete');

Route::get('/404', function (){return view('404');}) -> name('404');

Route::get('/mail_subscribed', MailSubscribedController::class) ->name('mail_subscribed');

Route::get('/send_mail', function (){
    $mail = new \App\Mail\UserSubscribed();
    $mail->subject = 'Welcome to news site';
    \Illuminate\Support\Facades\Mail::to('a.shvorobey@gmail.com')->send($mail);
}) -> name('send_mail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
