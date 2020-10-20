<?php

namespace App\Http\Controllers;

use App\Mail\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.show');
    }

    public function store()
    {
        $this->validateEmail();

        Mail::to(request('email'))
            ->send(new ContactMe('shirts'));

        // Mail::raw('it works!', function ($message) {
        //     $message
        //         ->to(request('email'))
        //         ->subject('Hello, World!');
        // });

        return redirect(route('contact.show'))
            ->with('message', 'Email sent!');
    }

    protected function validateEmail()
    {
        return request()->validate([
            'email' => ['required', 'email'],
        ]);
    }
}
