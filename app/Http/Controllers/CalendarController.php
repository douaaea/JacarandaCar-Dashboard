<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Voiture;

class CalendarController extends Controller
{
    public function index()
    {
        $eventsDepart = [];
        $eventsArrive = [];
        $events = [];
        $reservations = Reservation::all();

        foreach ($reservations as $reservation) {
            $voiture = Voiture::where('matricule', $reservation->matricule)->first();
            $eventsDepart[] = [
                'title' => 'Départ de ' . $reservation->matricule,
                'start' => $reservation->dateDepart,
                'color' => '#ffbb33',
                'extendedProps' => [
                    'details' => [
                        'reservation' => $reservation,
                        'voiture' => $voiture,
                    ]
                ]
            ];

            $eventsArrive[] = [
                'title' => 'Arrivée de ' . $reservation->matricule,
                'start' => $reservation->dateArrive,
                'color' => '#00c851',
                'extendedProps' => [
                    'details' => [
                        'reservation' => $reservation,
                        'voiture' => $voiture,
                    ]
                ]
            ];
        }

        $events = array_merge($eventsDepart, $eventsArrive);
        return view('calendar.index', ['events' => $events]);
    }
}
