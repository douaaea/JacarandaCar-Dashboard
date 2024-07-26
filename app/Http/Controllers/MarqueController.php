<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function create()
    {
        $marques = Marque::paginate(10);
        return view('marque.create', compact('marques'));
    }
    public function store(Request $request)
    {

        $messages = [
            'marqueVoiture.unique' => 'Cette marque de voiture existe déjà.',
            'marqueVoiture.min' => "La marque doit contenir au moins 3 caractères",
        ];
        //validation

        $request->validate([
            'marqueVoiture' => 'min:3|unique:Marques|required',
        ], $messages);

        $marque = $request->marqueVoiture;
        $marque = Marque::create([
           'marqueVoiture' => $marque,
   ]);
        if ($marque) {
            $profile = $request->session()->get('login');

            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a ajouté(e) La marque $marque->marqueVoiture.",
               ]);
            return redirect()->route('marque.create')->with('success', 'Marque ajoutée avec succès.');
        } else {
            return redirect()->route('marque.create')->with('error', "Une erreur s'est produite.");
        }


    }
    public function destroy(Request $request, Marque $marque)
    {
        $suppression = $marque->delete();
        if ($suppression) {
            $profile = $request->session()->get('login');

            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a supprimé(e) la marque $marque->marqueVoiture.",
               ]);
            return redirect()->route('marque.create')->with('success', ' Marque suprimée avec succès.');
        } else {
            return redirect()->route('marque.create')->with('error', "Une erreur s'est produite.");
        }
    }
    public function edit(Marque $marque)
    {
        return view('marque.edit', compact('marque'));
    }
    public function update(Request $request, Marque $marque)
    {

        $messages = [
            'marqueVoiture.min' => "La marque doit contenir au moins 3 caractères",
        ];

        $request->validate([
            'marqueVoiture' => 'min:3',
        ], $messages);

        if($request->marqueVoiture !== null) {
            $marque->marqueVoiture = $request->marqueVoiture;
        }
        if ($marque->save()) {
            $profile = $request->session()->get('login');

            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a modifié(e) la marque $marque->marqueVoiture.",
               ]);
            return redirect()->route('marque.create')->with('success', 'Marque modifiée avec succès.');
        } else {
            return redirect()->route('marque.create')->with('error', "Une erreur s'est produite.");
        }
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $marques = Marque::where('marqueVoiture', 'LIKE', '%' . $query . '%')
            ->paginate(10);
        return view('marque.search', compact('marques'));
    }
}