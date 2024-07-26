<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Historique;
use App\Models\Voiture;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Reservation;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function create()
    {
        $marques = Marque::get();
        return view('voiture.create', compact('marques'));
    }
    public function store(Request $request)
    {
        $messages = [
            'matricule.unique' => 'Cette matricule existe déjà.',
            'numPassagers.min' => "Le nombre de passagers doit être d'au moins 2. ",
            'prixJour.decimal' => "Le prix doit être un nombre décimal avec une précision de 2 chiffres.",
            'chargeAchat.decimal' => "Le montant doit être un nombre décimal avec une précision de 2 chiffres.",
            'modelMarque.exists' => "Ce modele n'existe pas.",
        ];
        //validation

        $request->validate([
          'modelMarque' => ['required', 'exists:modeles,modelMarque'],
          'numPassagers' => 'integer|required|min:2',
          'prixJour' => 'required|decimal:2',
          'matricule' => 'required|unique:voitures',
          'couleur' => 'required',
          'carburant' => 'required',
          'boiteVitesse' => 'required',
          'type' => 'required',
          'marqueVoiture' => 'required',
          'image' => 'image|mimes:png,jpg,svg,jpeg|required',
          'chargeAchat' => 'required|decimal:2',
        ], $messages);

        $modelMarque = $request->modelMarque;
        $numPassagers = $request->numPassagers;
        $prixJour = $request->prixJour;
        $matricule = $request->matricule;
        $couleur = $request->couleur;
        $carburant = $request->carburant;
        $boiteVitesse = $request->boiteVitesse;
        $type = $request->type;
        $marqueVoiture = $request->marqueVoiture;
        $chargeAchat = $request->chargeAchat;

        $fileName = $request->file('image')->store('voitures', 'public');

        $modelBelongsToMarque = Modele::where('modelMarque', $modelMarque)
                 ->where('marqueVoiture', $marqueVoiture)
                 ->exists();

        if (!$modelBelongsToMarque) {
            return redirect()->route('voiture.create')->with('error', "Le modèle inséré n'appartient pas à la marque sélectionnée.");
        } else {
            $voiture = Voiture::create([
        'modelMarque' => $modelMarque,
        'numPassagers' => $numPassagers,
        'prixJour' => $prixJour,
        'matricule' => $matricule,
        'couleur' => $couleur,
        'carburant' => $carburant,
        'boiteVitesse' => $boiteVitesse,
        'type' => $type,
        'marqueVoiture' => $marqueVoiture,
        'image' => $fileName,
            ]);
            $charge = Charge::create([
                'typeCharge' => "charges d'achats",
                'montant' => $chargeAchat,
                'matricule' => $matricule,
            ]);
            if ($voiture && $charge) {
                // Retrieve the Profile model instance from the session
                $profile = $request->session()->get('login');

                // Directly access idProfil from the profile instance
                $idProfil = $profile->idProfil;
                $history = Historique::create([
                    'idProfil' => $idProfil,
                     'action' => "a ajouté(e) une voiture $matricule.",
                   ]);
                return redirect()->route('voiture.create')->with('success', 'Voiture ajoutée avec succès.');
            } else {
                return redirect()->route('voiture.create')->with('error', "Une erreur s'est produite.");
            }

        }
    }
    public function show()
    {
        $voitures = Voiture::paginate(12);
        return view('voiture.show', compact('voitures'));
    }
    public function destroy(Request $request, Voiture $voiture)
    {
        $suppression = $voiture->delete();
        if ($suppression) {
            // Retrieve the Profile model instance from the session
            $profile = $request->session()->get('login');

            // Directly access idProfil from the profile instance
            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a supprimé(e) la voiture $voiture->matricule.",
               ]);
            return redirect()->route('voiture.show')->with('success', 'Voiture suprimée avec succès.');
        } else {
            return redirect()->route('voiture.show')->with('error', "Une erreur s'est produite.");
        }
    }
    public function edit(Voiture $voiture)
    {
        $marques = Marque::get();
        return view('voiture.edit', compact('voiture', 'marques'));

    }
    public function update(Request $request, Voiture $voiture)
    {
        $messages = [
            'numPassagers.min' => "Le nombre de passagers doit être d'au moins 2.",
            'prixJour.regex' => "Le prix doit être un nombre décimal avec une précision de 2 chiffres.",
            'modelMarque.exists' => "Ce modèle n'existe pas.",
        ];

        // Validation
        $request->validate([
            'modelMarque' => ['exists:modeles,modelMarque'],
            'numPassagers' => 'integer|min:2',
            'prixJour' => ['regex:/^\d+\.\d{2}$/'],
            'image' => 'image|mimes:png,jpg,svg,jpeg',
        ], $messages);

        if ($request->modelMarque !== null) {
            $modelBelongsToMarque = Modele::where('modelMarque', $request->modelMarque)
                ->where('marqueVoiture', $request->marqueVoiture)
                ->exists();

            if (!$modelBelongsToMarque) {
                return redirect()->route('voiture.edit', $voiture->idVoiture)->with('error', "Le modèle inséré n'appartient pas à la marque sélectionnée.");
            } else {
                $voiture->modelMarque = $request->modelMarque;
            }
        }

        if ($request->numPassagers !== null) {
            $voiture->numPassagers = $request->numPassagers;
        }
        if ($request->prixJour !== null) {
            $voiture->prixJour = $request->prixJour;
        }
        if ($request->matricule !== null) {
            $voiture->matricule = $request->matricule;
        }
        if ($request->couleur !== null) {
            $voiture->couleur = $request->couleur;
        }
        if ($request->carburant !== null) {
            $voiture->carburant = $request->carburant;
        }
        if ($request->boiteVitesse !== null) {
            $voiture->boiteVitesse = $request->boiteVitesse;
        }
        if ($request->type !== null) {
            $voiture->type = $request->type;
        }
        if ($request->marqueVoiture !== null) {
            $voiture->marqueVoiture = $request->marqueVoiture;
        }
        if ($request->image !== null) {
            $fileName = $request->file('image')->store('profiles', 'public');
            $voiture->image = $fileName;
        }

        if ($voiture->save()) {
            // Retrieve the Profile model instance from the session
            $profile = $request->session()->get('login');

            // Directly access idProfil from the profile instance
            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a modifié(e) la voiture $voiture->matricule.",
               ]);
            return redirect()->route('voiture.show')->with('success', 'Voiture modifiée avec succès.');
        } else {
            return redirect()->route('voiture.show')->with('error', "Une erreur s'est produite.");
        }
    }

    public function showDetails(Request $request, Voiture $voiture)
    {
        $charges = Charge::where('matricule', $voiture->matricule)->paginate(5);
        $reservations = Reservation::where('matricule', $voiture->matricule)->paginate(5);
        $NbrReservations = Reservation::where('matricule', $voiture->matricule)->count();
        $SommeMontant = Reservation::where('matricule', $voiture->matricule)->sum('montant');
        $SommeCharges = Charge::where('matricule', $voiture->matricule)->sum('montant');
        $benefices = $SommeMontant - $SommeCharges;
        return view('voiture.detail', compact('voiture', 'NbrReservations', 'benefices', 'SommeCharges', 'charges', 'reservations'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $voitures = Voiture::where('matricule', 'LIKE', '%' . $query . '%')
            ->orWhere('modelMarque', 'LIKE', '%' . $query . '%')
            ->orWhere('marqueVoiture', 'LIKE', '%' . $query . '%')
            ->orWhere('prixJour', 'LIKE', '%' . $query . '%')
            ->orWhere('carburant', 'LIKE', '%' . $query . '%')
            ->orWhere('type', 'LIKE', '%' . $query . '%')
            ->orWhere('boiteVitesse', 'LIKE', '%' . $query . '%')
            ->orWhere('couleur', 'LIKE', '%' . $query . '%')
            ->orWhere('numPassagers', 'LIKE', '%' . $query . '%')
            ->paginate(12);
        return view('voiture.search', compact('voitures'));
    }
}
