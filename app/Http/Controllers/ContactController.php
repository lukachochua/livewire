<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactFormMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contacts.show');
    }

    public function post(ContactRequest $request)
    {
        Mail::to('lukachochua@gmail.com')->send(new ContactFormMailable($request->name, $request->email, $request->phone, $request->message));

        return to_route('welcome');
    }
}
