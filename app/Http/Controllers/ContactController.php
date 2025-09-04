<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            "name" => ["required", "string", "min:3"],
            "email" => ["required", "email"],
            "message" => ["required", "string", "min:5, max:500"]
        ]);

        $contact = Contact::create([
            "name" => $request->name,
            "email" => $request->email,
            "message" => $request->message
        ]);

        $contact->save();
        return redirect()->back()->with("success", "Your message has been sent successfully!");
    }
}
