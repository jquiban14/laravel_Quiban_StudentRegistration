<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function showForm()
    {
        return view('register');
    }

    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'age' => 'required|integer|min:18|max:100',
            'course' => 'required|in:BSIT,BSCS,BSEMC,BSIS'
        ]);

        return view('success', [
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'age' => $validated['age'],
            'course' => $validated['course']
        ]);
    }
}