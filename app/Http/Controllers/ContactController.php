<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactusRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(ContactusRequest $request)
    {
        $request->validated();
        
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back() ;
    }
}
