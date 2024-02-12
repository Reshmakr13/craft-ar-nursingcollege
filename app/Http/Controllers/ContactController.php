<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'message'=>'required|string',
        ]);
        Mail::to('reshmakanjoorparambil@gmail.com')->send(new ContactMail($request->all()));
        return redirect()->back()->with('success','Thank you! Your message has been sent.');
    }
}
