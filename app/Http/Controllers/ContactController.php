<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255', // Changé de 'nom' à 'name'
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Sauvegarde dans la base de données
            $contact = Contact::create([ // Variable en minuscule
                'nom' => $request->name, // Mapping du champ 'name' vers 'nom'
                'email' => $request->email,
                'message' => $request->message,
            ]);

            // Envoi de l'email
            Mail::send('emails.contact', ['data' => $request->all()], function($message) use ($request) {
                $message->to(config('mail.from.address'))
                        ->subject('Nouveau message de contact')
                        ->from($request->email, $request->name); // Utilisation de 'name'
            });

            return response()->json([
                'status' => 'success',
                'message' => 'Votre message a été envoyé avec succès'
            ]);

        } catch (\Exception $e) {
            \Log::error('Erreur lors de l\'envoi du message de contact: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Une erreur est survenue, veuillez réessayer plus tard'
            ], 500);
        }
    }
}