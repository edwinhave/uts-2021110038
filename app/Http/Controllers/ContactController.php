<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view("contact");
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'full_name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email',
            'phone_number' => 'required|numeric|digits_between:5,15'
        ]);

        $contact = new Contact();
        $contact->full_name = $validate['full_name'];
        $contact->email = $validate['email'];
        $contact->phone_number = $validate['phone_number'];
        $contact->save();

        return redirect('/contact-us')->with('success', 'Thank you, we will contact you soon!');
    }
}
