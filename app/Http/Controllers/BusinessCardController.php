<?php

namespace App\Http\Controllers;

use App\Models\BusinessCard;
use Illuminate\Http\Request;

class BusinessCardController extends Controller
{
    public function index()
    {
        // Récupérer toutes les cartes de visite de l'utilisateur authentifié
        $businessCards = auth()->user()->businessCards;

        return response()->json($businessCards);
    }

    public function store(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'name' => 'required|string',
            'company' => 'required|string',
            'title' => 'required|string',
            'email' => 'required|email',
        ]);

        // Créer une nouvelle carte de visite associée à l'utilisateur authentifié
        $businessCard = auth()->user()->businessCards()->create($request->all());

        return response()->json($businessCard, 201);
    }

    public function update(Request $request,BusinessCard $businessCard)
    {
        // Valider les données de la requête
        
        $request->validate([
            'name' => 'required|string',
            'company' => 'required|string',
            'title' => 'required|string',
            'email' => 'required|email',
        ]);


        // Mettre à jour la carte de visite
        $businessCard->update($request->all());

        return response()->json($businessCard);
    }

    public function destroy($businessCard)
    {
        $businesscard=BusinessCard::find($businessCard);
        if(!$businesscard){
            return response()->json('CARD DOESE NOT EXIST', 500);  
        }
        $businesscard->delete();

        return response()->json('deleted with success', 204);
    }
}
