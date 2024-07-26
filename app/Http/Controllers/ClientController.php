<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Historique;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function create()
    {
        $clients = Client::paginate(10);
        return view('client.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $messages = [
            'CIN.unique' => 'Ce CIN existe déjà.',
            'CIN.regex' => 'Veuillez entrer un CIN valide.',
            'age.integer' => 'Veuillez entrer un age valide.',
            'age.min' => "L'âge doit être d'au moins 21 ans.",
            'permis.unique' => 'Ce permis existe déjà.',
            'permis.regex' => 'Veuillez entrer un numero de permis valide.',
            'telephone.regex' => 'Veuillez entrer un numero de telephone valide.',

        ];

        $request->validate([
            'email' => 'required|email',
            'nom' => 'required',
            'prenom' => 'required',
            'CIN' => 'required|unique:Clients|regex:/^[A-Z]+[0-9]+$/',
            'age' => 'required|integer|min:21',
            'permis' => 'required|unique:Clients|regex:/^\d{2}\/\d{6}$/',
            'telephone' => ['required','regex:/^(?:\+212[567][0-9]{8}|0[567][0-9]{8})$/'],
            'adresse' => 'required',
            'sexe' => 'max:1|required',
        ], $messages);

        $nom = $request->nom;
        $prenom = $request->prenom;
        $email = $request->email;
        $cin = $request->CIN;
        $permis = $request->permis;
        $age = $request->age;
        $telephone = $request->telephone;
        $adresse = $request->adresse;
        $sexe = $request->sexe;


        $client = Client::create([
           'nom' => $nom,
           'prenom' => $prenom,
           'email' => $email,
           'CIN' => $cin,
           'permis' => $permis,
           'age' => $age,
           'telephone' => $telephone,
           'adresse' => $adresse,
           'sexe' => $sexe,

   ]);
        if ($client) {
            $profile = $request->session()->get('login');

            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a ajouté(e) le client $cin.",
               ]);
            return redirect()->route('client.create')->with('success', 'Client ajouté avec succès.');
        } else {
            return redirect()->route('client.create')->with('error', "Une erreur s'est produite.");
        }

    }
    public function destroy(Request $request, Client $client)
    {
        $suppression = $client->delete();
        if ($suppression) {
            $profile = $request->session()->get('login');

            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a supprimé(e) le client $client->CIN.",
               ]);
            return redirect()->route('client.create')->with('success', 'Client suprimé avec succès.');
        } else {
            return redirect()->route('client.create')->with('error', "Une erreur s'est produite.");
        }
    }

    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));

    }
    public function update(Request $request, Client $client)
    {

        $messages = [
            'CIN.regex' => 'Veuillez entrer un CIN valide.',
            'age.integer' => 'Veuillez entrer un age valide.',
            'age.min' => "L'âge doit être d'au moins 21 ans.",
            'permis.regex' => 'Veuillez entrer un numero de permis valide.',
            'telephone.regex' => 'Veuillez entrer un numero de telephone valide.',

        ];

        $request->validate([
            'email' => 'email',
            'CIN' => 'regex:/^[A-Z]+[0-9]+$/',
            'age' => 'integer|min:21',
            'permis' => 'regex:/^\d{2}\/\d{6}$/',
            'telephone' => ['regex:/^(?:\+212[567][0-9]{8}|0[567][0-9]{8})$/',],
        ], $messages);

        if($request->nom !== null) {
            $client->nom = $request->nom;
        }
        if($request->prenom !== null) {
            $client->prenom = $request->prenom;
        }
        if($request->email !== null) {
            $client->email = $request->email;
        }
        if($request->CIN !== null) {
            $client->CIN = $request->CIN;
        }
        if($request->permis !== null) {
            $client->permis = $request->permis;
        }
        if($request->age !== null) {
            $client->age = $request->age;
        }
        if($request->telephone !== null) {
            $client->telephone = $request->telephone;
        }
        if($request->adresse !== null) {
            $client->adresse = $request->adresse;
        }
        if($request->sexe !== null) {
            $client->sexe = $request->sexe;
        }

        if ($client->save()) {

            $profile = $request->session()->get('login');

            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a modifié(e) le client $client->CIN.",
               ]);
            return redirect()->route('client.create')->with('success', 'Client modifié avec succès.');
        } else {
            return redirect()->route('client.create')->with('error', "Une erreur s'est produite.");
        }
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $clients = Client::where('prenom', 'LIKE', '%' . $query . '%')
            ->orWhere('nom', 'LIKE', '%' . $query . '%')
            ->orWhere('age', 'LIKE', '%' . $query . '%')
            ->orWhere('sexe', 'LIKE', '%' . $query . '%')
            ->orWhere('CIN', 'LIKE', '%' . $query . '%')
            ->orWhere('permis', 'LIKE', '%' . $query . '%')
            ->orWhere('email', 'LIKE', '%' . $query . '%')
            ->orWhere('telephone', 'LIKE', '%' . $query . '%')
            ->orWhere('adresse', 'LIKE', '%' . $query . '%')
            ->paginate(10);

        return view('client.search', compact('clients'));
    }
}