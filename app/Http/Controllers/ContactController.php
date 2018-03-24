<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('general.contact');
    }
    public function feedback()
    {
        return view('general.feedback');
    }

    public function store(Request $request)
    {
        $this->contactValidation($request);

        Contact::create($request->all());
        return redirect('contact')->with('message', 'Message sent!');
    }

    public function contactValidation($request)
    {
        $request->validate([
            'name'    => 'required|max:50',
            'email'   => 'required|max:100',
            'subject' => 'required|max:500',
            'text'    => 'required|max:1000',
        ]);
    }
}
