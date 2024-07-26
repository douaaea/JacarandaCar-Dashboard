<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use App\Models\Reservation;
use App\Models\Voiture;
use App\Rules\UniqueReservation;
use App\Rules\UpdateReservation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function create(Request $request)
    {
        $voitures = Voiture::get();
        $reservations = Reservation::paginate(10);
        $matricule = $request->query('matricule');
        return view('reservation.create', compact('reservations', 'voitures', 'matricule'));
    }
    public function store(Request $request)
    {
        $messages = [
            'dateDepart.date' => 'Veuillez entrer une date valide',
            'dateArrive.date' => 'Veuillez entrer une date valide',
            'CIN.regex' => 'Veuillez entrer un CIN valide.',
            'CIN.exists' => "Ce client n'existe pas .",
            'matricule.exists' => "Cette voiture n'existe pas .",


        ];

        $request->validate([
            'dateDepart' => 'required|date',
            'dateArrive' => 'required|date',
            'CIN' => 'required|exists:clients,CIN|regex:/^[A-Z]+[0-9]+$/',
            'matricule' => ['required', 'exists:voitures,matricule', new UniqueReservation()],
        ], $messages);

        $dateDepart = $request->dateDepart;
        $dateArrive = $request->dateArrive;
        $CIN = $request->CIN;
        $matricule = $request->matricule;

        $date1 = Carbon::parse($dateDepart);
        $date2 = Carbon::parse($dateArrive);

        $daysDifference = $date1->diffInDays($date2);
        $voiture = Voiture::where('matricule', $matricule)->get()->first();
        $prixJour = $voiture->prixJour;

        $montant = $prixJour * $daysDifference;

        $reservation = Reservation::create([
             'dateDepart' => $dateDepart,
             'dateArrive' => $dateArrive,
             'CIN' => $CIN,
             'matricule' => $matricule,
             'montant' => $montant,
        ]);

        if ($reservation) {
            $profile = $request->session()->get('login');

            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a ajouté(e) une reservation de $matricule.",
               ]);
            return redirect()->route('reservation.create')->with('success', 'Reservation ajoutée avec succès.');
        } else {
            return redirect()->route('reservation.create')->with('error', "Une erreur s'est produite.");
        }

    }
    public function destroy(Request $request, Reservation $reservation)
    {
        $suppression = $reservation->delete();
        if ($suppression) {
            $profile = $request->session()->get('login');

            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a supprimé(e) une reservation de $reservation->matricule.",
               ]);
            return redirect()->route('reservation.create')->with('success', 'Reservation suprimée avec succès.');
        } else {
            return redirect()->route('reservation.create')->with('error', "Une erreur s'est produite.");
        }
    }
    public function edit(Reservation $reservation)
    {
        $voitures = Voiture::get();
        return view('reservation.edit', compact('reservation', 'voitures'));

    }
    public function update(Request $request, Reservation $reservation)
    {

        $messages = [
            'dateDepart.date' => 'Veuillez entrer une date valide',
            'dateArrive.date' => 'Veuillez entrer une date valide',
            'CIN.regex' => 'Veuillez entrer un CIN valide.',
            'CIN.exists' => "Ce client n'existe pas .",
            'matricule.exists' => "Cette voiture n'existe pas .",


        ];

        $request->validate([
            'dateDepart' => 'date',
            'dateArrive' => 'date',
            'CIN' => 'exists:clients,CIN|regex:/^[A-Z]+[0-9]+$/',
            'matricule' => [ 'exists:voitures,matricule', new  UpdateReservation($reservation)],
        ], $messages);
        if($request->CIN !== null) {
            $reservation->CIN = $request->CIN;
        }
        if($request->matricule !== null) {
            $reservation->matricule = $request->matricule;
        }
        if($request->dateDepart !== null) {
            $reservation->dateDepart = $request->dateDepart;
            if($request->dateArrive !== null) {
                $reservation->dateArrive = $request->dateArrive;
                $date1 = Carbon::parse($request->dateDepart);
                $date2 = Carbon::parse($request->dateArrive);
                $daysDifference = $date1->diffInDays($date2);
                $voiture = Voiture::where('matricule', $request->matricule)->get()->first();
                $prixJour = $voiture->prixJour;
                $montant = $prixJour * $daysDifference;
                $reservation->montant = $montant;
            } else {
                $date1 = Carbon::parse($request->dateDepart);
                $date2 = Carbon::parse($reservation->dateArrive);
                $daysDifference = $date1->diffInDays($date2);
                $voiture = Voiture::where('matricule', $request->matricule)->get()->first();
                $prixJour = $voiture->prixJour;
                $montant = $prixJour * $daysDifference;
                $reservation->montant = $montant;
            }
        }
        if($request->dateArrive !== null) {
            $reservation->dateArrive = $request->dateArrive;
            if($request->dateDepart !== null) {
                $reservation->dateDepart = $request->dateDepart;
                $date1 = Carbon::parse($request->dateDepart);
                $date2 = Carbon::parse($request->dateArrive);
                $daysDifference = $date1->diffInDays($date2);
                $voiture = Voiture::where('matricule', $request->matricule)->get()->first();
                $prixJour = $voiture->prixJour;
                $montant = $prixJour * $daysDifference;
                $reservation->montant = $montant;
            } else {
                $date1 = Carbon::parse($reservation->dateDepart);
                $date2 = Carbon::parse($request->dateArrive);
                $daysDifference = $date1->diffInDays($date2);
                $voiture = Voiture::where('matricule', $request->matricule)->get()->first();
                $prixJour = $voiture->prixJour;
                $montant = $prixJour * $daysDifference;
                $reservation->montant = $montant;
            }
        }
        if ($reservation->save()) {
            $profile = $request->session()->get('login');

            $idProfil = $profile->idProfil;
            $history = Historique::create([
                'idProfil' => $idProfil,
                 'action' => "a modifié(e) une reservation de $reservation->matricule.",
               ]);
            return redirect()->route('reservation.create')->with('success', 'Reservation modifiée avec succès.');
        } else {
            return redirect()->route('reservation.create')->with('error', "Une erreur s'est produite.");
        }
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $reservations = Reservation::where('CIN', 'LIKE', '%' . $query . '%')
            ->orWhere('matricule', 'LIKE', '%' . $query . '%')
            ->orWhere('dateDepart', 'LIKE', '%' . $query . '%')
            ->orWhere('dateArrive', 'LIKE', '%' . $query . '%')
            ->orWhere('montant', 'LIKE', '%' . $query . '%')
            ->paginate(10);
        $voitures = Voiture::get();

        return view('reservation.search', compact('reservations', 'voitures'));
    }
}