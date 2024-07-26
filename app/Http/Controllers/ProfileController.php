<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function create()
    {
        return view('profile.create');
    }
    public function modify()
    {
        return view('profile.modify');
    }

    public function store(Request $request)
    {
        $messages = [
           'email.unique' => 'Cette adresse email existe déjà.',
           'motdepasse.min' => 'Le mot de passe doit contenir au moins 8 caractères',
           'motdepasse.regex' => 'Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.',
           'motdepasse.confirmed' => 'La confirmation du mot de passe du ne corresponde pas.',
    ];

        $request->validate([
           'email' => 'required|unique:profiles|email',
           'nom' => 'required',
           'prenom' => 'required',
           'motdepasse' => 'required|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
           'motdepasse_confirmation' => 'required',
           'image' => 'image|mimes:png,jpg,svg,jpeg',
    ], $messages);


        $nom = $request->nom;
        $prenom = $request->prenom;
        $email = $request->email;
        $password = $request->motdepasse;
        $passwordhashed = Hash::make($password);
        $image = $request->image;

        if($image !== null) {
            $fileName = $request->file('image')->store('profiles', 'public');
            $profile = Profile::create([
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'password' => $passwordhashed,
                'image' => $fileName,

            ]);
        } else {
            $profile = Profile::create([
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'password' => $passwordhashed,

            ]);

        }


        if ($profile) {
            $profileHis = $request->session()->get('login');

            $idProfilHis = $profileHis->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfilHis,
                 'action' => "a ajouté(e) un profile $prenom $nom.",
               ]);
            return redirect()->route('profile.create')->with('success', 'Profile ajouté avec succès.');
        } else {
            return redirect()->route('profile.create')->with('error', "Une erreur s'est produite.");
        }
    }
    public function destroy(Request $request)
    {
        $profile = session('login');
        $password = $request->password;
        $hashedPassword = $profile->password;
        if (Hash::check($password, $hashedPassword)) {
            $suppression = $profile->delete();
            if ($suppression) {
                return redirect()->route('login');
            } else {
                return redirect()->route('profile.show')->with('error', "Une erreur s'est produite.");
            }
        } else {
            return back()->with('error', "Mot de passe incorrect.");
        }

    }
    public function update(Request $request)
    {
        $profile = session('login');
        $request->validate([
           'email' => 'email',
           'image' => 'image|mimes:png,jpg,svg,jpeg',
    ]);
        if($request->nom !== null) {
            $profile->nom = $request->nom;
        }
        if($request->prenom !== null) {
            $profile->prenom = $request->prenom;
        }
        if($request->email !== null) {
            $profile->email = $request->email;
        }
        if($request->image !== null) {
            $fileName = $request->file('image')->store('profiles', 'public');
            $profile->image = $fileName;
        }
        if ($profile->save()) {
            return redirect()->route('profile.show')->with('success', 'Profile modifié avec succès.');
        } else {
            return redirect()->route('profile.show')->with('error', "Une erreur s'est produite.");
        }
    }
    public function updatePassword(Request $request)
    {
        $profile = session('login');
        $messages = [
            'motdepasse.min' => 'Le mot de passe doit contenir au moins 8 caractères',
            'motdepasse.regex' => 'Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.',
            'motdepasse.confirmed' => 'La confirmation du mot de passe du ne corresponde pas.',
        ];

        $request->validate([
           'motdepasse' => 'required|min:8|confirmed|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
           'motdepasse_confirmation' => 'required',
           'password' => 'required',
    ], $messages);
        $password = $request->password;
        $hashedPassword = $profile->password;
        if (Hash::check($password, $hashedPassword)) {
            $motdepasse = $request->motdepasse;
            $motdepassehashed = Hash::make($motdepasse);
            $profile->password = $motdepassehashed;
            if ($profile->save()) {
                return redirect()->route('profile.show')->with('success', 'Mot de passe modifié avec succès.');
            } else {
                return redirect()->route('profile.show')->with('error', "Une erreur s'est produite.");
            }
        } else {
            return back()->withErrors([
                'password' => 'Mot de passe incorrect.'
            ])->onlyInput('password');
        }

    }
    public function lockscreen()
    {
        return view('profile.lockscreen');
    }

    public function unlock(Request $request)
    {
        $profile = session('login');
        $inputPassword = $request->password;

        $hashedPassword = $profile->password;
        if (Hash::check($inputPassword, $hashedPassword)) {
            return redirect()->route('dashboard.acceuil');
        } else {
            return back()->withErrors([
                'password' => 'Mot de passe incorrect.'
            ])->onlyInput('password');
        }
    }
    public function show()
    {
        $profile = session('login');
        return view('profile.show', compact('profile'));
    }

}