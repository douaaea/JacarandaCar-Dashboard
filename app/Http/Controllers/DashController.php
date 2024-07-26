<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Client;
use App\Models\Marque;
use App\Models\Reservation;
use App\Models\Voiture;

class DashController extends Controller
{
    public function show()
    {
        $NbrReservations = Reservation::count();
        $NbrClients = Client::count();
        $NbrVoitures = Voiture::count();
        $NbrMarques = Marque::count();
        $MontantReservations = Reservation::sum('montant');
        $SommeCharges = Charge::sum('montant');
        $benefices = $MontantReservations - $SommeCharges;
        $topClients = Client::select(
            'clients.nom',
            'clients.prenom',
            'clients.CIN'
        )
    ->join('reservations', 'clients.CIN', '=', 'reservations.CIN')
    ->selectRaw('COUNT(reservations.idReservation) as total_reservations')  
    ->selectRaw('SUM(reservations.montant) as total_montant')  
    ->groupBy('clients.CIN', 'clients.nom', 'clients.prenom')
    ->orderBy('total_reservations', 'desc')
    ->orderBy('total_montant', 'desc')
    ->limit(5)
    ->get();

        $topVoitures = Voiture::select(
            'voitures.marqueVoiture',
            'voitures.modelMarque',
            'voitures.image',
            'voitures.matricule'
        )
  ->join('reservations', 'voitures.matricule', '=', 'reservations.matricule')
  ->selectRaw('COUNT(reservations.idReservation) as total_reservations')  
  ->selectRaw('SUM(reservations.montant) as total_montant')  
  ->groupBy('voitures.matricule', 'voitures.marqueVoiture', 'voitures.modelMarque', 'voitures.image')
  ->orderBy('total_reservations', 'desc')
  ->orderBy('total_montant', 'desc')
  ->limit(5)
  ->get();

        $monthlyReservations = Reservation::selectRaw('YEAR(dateDepart) as year, MONTH(dateDepart) as month, COUNT(*) as total_reservations')
        ->groupByRaw('YEAR(dateDepart), MONTH(dateDepart)')
        ->orderByRaw('YEAR(dateDepart), MONTH(dateDepart)')
        ->get();

        return view('dashboard.acceuil', compact('topClients', 'topVoitures', 'NbrClients', 'NbrMarques', 'NbrReservations', 'NbrVoitures', 'MontantReservations', 'benefices', 'monthlyReservations'));
    }


}