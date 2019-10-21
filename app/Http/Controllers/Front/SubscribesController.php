<?php

namespace App\Http\Controllers\Front;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class SubscribesController extends Controller
{
    public function create(Request $request)
    {
        $subscribe = Subscribe::create([
            'email' =>$request->input('subscribe-email')]);
        $type = 'subscribe';
        Mail::send(new Subscribe($subscribe));
        return \view('app.pages.thanks', compact('type'));
    }
}
