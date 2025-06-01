<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function index()
    {
        return view('website.pages.contact');
    }

    public function send(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'string|max:255',
            'message' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'La validation a échoué.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $contactData = $request->only(['name', 'email', 'subject', 'message']);

            // Send the email to your support/admin email
            Mail::to(config('mail.from.address')) // or replace with a specific address
                ->send(new ContactMessageMail($contactData));


            return redirect()->back()->with('success', 'Votre message a été envoyé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l’envoi de l’email.');
        }
    }
}
