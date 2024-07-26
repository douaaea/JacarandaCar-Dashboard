<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Historique;
use App\Models\Voiture;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    public function create(Request $request)
    {
        $charges = Charge::paginate(10);
        $voitures = Voiture::get();
        $matricule = $request->query('matricule');

        return view('charge.create', compact('charges', 'voitures', 'matricule'));
    }
    public function store(Request $request)
    {

        $messages = [
          'monatant.decimal' => 'Le montant doit être un nombre décimal avec une précision de 2 chiffres.',
          'matricule.exists' => "Cette voiture n'existe pas.",
        ];
        //validation

        $request->validate([
            'typeCharge' => 'required',
            'montant' => 'required|decimal:2',
            'matricule' => ['required', 'exists:voitures,matricule'],
        ], $messages);

        $typeCharge = $request->typeCharge;
        $montant = $request->montant;
        $matricule = $request->matricule;


        $charge = Charge::create([
           'typeCharge' => $typeCharge,
           'montant' => $montant,
           'matricule' => $matricule,
        ]);
        if ($charge) {
            $profile = $request->session()->get('login');

            $idProfil = $profile->idProfil;
            $history = Historique::create([
             'idProfil' => $idProfil,
              'action' => "a ajouté(e) une charge pour $matricule.",
            ]);
            return redirect()->route('charge.create')->with('success', 'Charge ajoutée avec succès.');
        } else {
            return redirect()->route('charge.create')->with('error', "Une erreur s'est produite.");
        }

    }
    public function destroy(Request $request, Charge $charge)
    {
        $suppression = $charge->delete();
        if ($suppression) {
            $profile = $request->session()->get('login');

            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a supprimé(e) une charge de $charge->matricule.",
               ]);
            return redirect()->route('charge.create')->with('success', 'Charge suprimée avec succès.');
        } else {
            return redirect()->route('charge.create')->with('error', "Une erreur s'est produite.");
        }
    }
    public function edit(Charge $charge)
    {
        $voitures = Voiture::get();
        return view('charge.edit', compact('charge', 'voitures'));

    }
    public function update(Request $request, Charge $charge)
    {

        $messages = [
            'monatant.decimal' => 'Le montant doit être un nombre décimal avec une précision de 2 chiffres.',
          'matricule.exists' => "Cette voiture n'existe pas.",
        ];
        //validation

        $request->validate([
          'montant' => 'decimal:2',
          'matricule' => ['exists:voitures,matricule'],
        ], $messages);
        
        if($request->typeCharge !== null) {
            $charge->typeCharge = $request->typeCharge;
        }
        if($request->montant !== null) {
            $charge->montant = $request->montant;
        }
        if($request->matricule !== null) {
            $charge->matricule = $request->matricule;
        }
       
        if ($charge->save()) {
            // Retrieve the Profile model instance from the session
            $profile = $request->session()->get('login');

            
            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a modifié(e) une charge de $charge->matricule.",
               ]);
            return redirect()->route('charge.create')->with('success', 'Charge modifiée avec succès.');
        } else {
            return redirect()->route('charge.create')->with('error', "Une erreur s'est produite.");
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $charges = Charge::where('typeCharge', 'LIKE', '%' . $query . '%')
            ->orWhere('montant', 'LIKE', '%' . $query . '%')
            ->orWhere('matricule', 'LIKE', '%' . $query . '%')
            ->paginate(10);
        $voitures = Voiture::get();
        return view('charge.search', compact('charges', 'voitures'));
    }
}