<?php

namespace App\Http\Controllers;

use App\Models\Besoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BesoinController extends Controller
{
    public function envoyerBesoin(Request $request)
    {
        // Validation améliorée
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'entreprise' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'projet' => 'required|string|max:500',
            'budget' => 'nullable|string|max:100',
            'delai' => 'nullable|string|max:100',
            'details' => 'nullable|string|max:1000',
            'services' => 'required|array',
            'services.*' => 'string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Création du besoin
            $besoin = Besoin::create([
                'nom' => $request->nom,
                'entreprise' => $request->entreprise,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'projet' => $request->projet,
                'budget' => $request->budget,
                'delai' => $request->delai,
                'details' => $request->details,
                'services' => $request->services // Laravel gère automatiquement la conversion en JSON
            ]);

            // Envoi d'email
            Mail::send('emails.besoin', ['data' => $request->all()], function($message) {
                $message->to(config('mail.from.address'))
                        ->subject('Nouvelle demande de service');
            });

            return response()->json([
                'status' => 'success',
                'message' => 'Demande enregistrée avec succès',
                'data' => $besoin
            ]);

        } catch (\Exception $e) {
            \Log::error('Erreur envoi demande: '.$e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Une erreur est survenue'
            ], 500);
        }
    }
}