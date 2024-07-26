<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Reservation;

class UpdateReservation implements Rule
{
    protected $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function passes($attribute, $value)
    {
        $newDateDepart = request()->input('dateDepart');
        $newDateArrive = request()->input('dateArrive');
        $newCIN = request()->input('CIN');

        // Check if the new reservation period conflicts with existing reservations
        $conflictingReservations = Reservation::where('idReservation', '!=', $this->reservation->id)
            ->where('matricule', $this->reservation->matricule)
            ->where(function ($query) use ($newDateDepart, $newDateArrive) {
                $query->where(function ($query) use ($newDateDepart, $newDateArrive) {
                    // Case 1: New reservation starts within an existing reservation
                    $query->where('dateDepart', '<=', $newDateArrive)
                          ->where('dateArrive', '>=', $newDateDepart);
                })
                ->orWhere(function ($query) use ($newDateDepart) {
                    // Case 2: Existing reservation starts during the new reservation
                    $query->where('dateDepart', '<', $newDateDepart)
                          ->where('dateArrive', '>', $newDateDepart);
                })
                ->orWhere(function ($query) use ($newDateDepart) {
                    // Case 3: New reservation starts exactly when an existing reservation ends
                    $query->where('dateArrive', '=', $newDateDepart);
                })
                ->orWhere(function ($query) use ($newDateArrive) {
                    // Case 4: Existing reservation starts exactly when the new reservation ends
                    $query->where('dateDepart', '=', $newDateArrive);
                });
            })
            ->where('CIN', '!=', $newCIN) // Ensure CIN remains the same
            ->exists();

        return !$conflictingReservations;
    }

    public function message()
    {
        return 'La période de réservation est déjà prise.';
    }
}
