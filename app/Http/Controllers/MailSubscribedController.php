<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Mail\UserSubscribed;
use Illuminate\Http\Request;

class MailSubscribedController extends Controller
{
    public function __invoke(Request $request)
    {
        $mail = new UserSubscribed($request->input('email'));
        SendMail::dispatch($mail)->onQueue('mails');

        return view('mail_subscribed');
    }
}
