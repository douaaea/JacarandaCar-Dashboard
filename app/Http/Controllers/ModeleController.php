<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use App\Models\Modele;
use App\Models\Marque;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    public function create()
    {
        $marques = Marque::get();
        $modeles = Modele::paginate(10);
        return view('modele.create', compact('marques', 'modeles'));
    }
    public function store(Request $request)
    {

        $messages = [
            'modelMarque.unique' => 'Ce Modele de voiture existe déjà.',
            'modelMarque.min' => "Le modele doit contenir au moins 2 caractères",
        ];
        //validation

        $request->validate([
            'modelMarque' => 'min:2|unique:modeles|required',
            'marqueVoiture' => 'required',
        ], $messages);

        $modele = $request->modelMarque;
        $marqueVoiture = $request->marqueVoiture;


        $modele = Modele::create([
           'modelMarque' => $modele,
           'marqueVoiture' => $marqueVoiture,
   ]);
        if ($modele) {
            $profile = $request->session()->get('login');

            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a ajouté(e) le modéle $modele->modelMarque.",
               ]);
            return redirect()->route('modele.create')->with('success', 'Modele ajouté avec succès.');
        } else {
            return redirect()->route('modele.create')->with('error', "Une erreur s'est produite.");
        }

    }
    public function retrieveModels(Request $request)
    {
        $modeles = Modele::all();
        return view('voiture.create', compact('modeles'));
    }

    public function destroy(Request $request, Modele $model)
    {
        $suppression = $model->delete();
        if ($suppression) {
            $profile = $request->session()->get('login');

            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a supprimé(e) le modéle $model->modelMarque.",
               ]);
            return redirect()->route('modele.create')->with('success', 'Modele suprimé avec succès.');
        } else {
            return redirect()->route('modele.create')->with('error', "Une erreur s'est produite.");
        }
    }
    public function edit(Modele $model)
    {
        $marques = Marque::get();
        return view('modele.edit', compact('model', 'marques'));

    }
    public function update(Request $request, Modele $model)
    {

        $messages = [
            'modelMarque.min' => "Le modele doit contenir au moins 2 caractères",
        ];
        

        $request->validate([
            'modelMarque' => 'min:2',
        ], $messages);
        if($request->modelMarque !== null) {
            $model->modelMarque = $request->modelMarque;
        }
        if($request->marqueVoiture !== null) {
            $model->marqueVoiture = $request->marqueVoiture;
        }
        if ($model->save()) {
            $profile = $request->session()->get('login');

            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a modifié(e) le modéle $model->modelMarque.",
               ]);
            return redirect()->route('modele.create')->with('success', 'Modele modifiée avec succès.');
        } else {
            return redirect()->route('modele.create')->with('error', "Une erreur s'est produite.");
        }
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $modeles = Modele::where('modelMarque', 'LIKE', '%' . $query . '%')
            ->orWhere('marqueVoiture', 'LIKE', '%' . $query . '%')
            ->paginate(10);
        $marques = Marque::get();

        return view('modele.search', compact('modeles', 'marques'));
    }
}