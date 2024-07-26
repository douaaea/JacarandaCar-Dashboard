<?php

namespace App\Rules;

use App\Models\Reservation;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueReservation implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $matricule = request('matricule');
        $dateDepart = request('dateDepart');
        $dateArrive = request('dateArrive');
        // Find reservations that conflict with the new reservation times
        $conflictingReservation = Reservation::where('matricule', $matricule)
            ->where(function ($query) use ($dateDepart, $dateArrive) {
                $query->where(function ($query) use ($dateArrive, $dateDepart) {
                    // Case 1: New reservation starts within an existing reservation
                    $query->whereBetween('dateDepart', [$dateDepart,$dateArrive])
                          ->orWhereBetween('dateArrive', [$dateDepart,$dateArrive]);
                })
                ->orWhere(function ($query) use ($dateDepart) {
                    // Case 2: Existing reservation starts during the new reservation
                    $query->where('dateDepart', '<', $dateDepart)
                          ->where('dateArrive', '>', $dateDepart);
                })
                ->orWhere(function ($query) use ($dateDepart) {
                    // Case 3: New reservation starts exactly when an existing reservation ends
                    $query->where('dateArrive', '=', $dateDepart);
                })
                ->orWhere(function ($query) use ($dateArrive) {
                    // Case 4: Existing reservation starts exactly when the new reservation ends
                    $query->where('dateDepart', '=', $dateArrive);
                });
            })
            ->exists();

        if ($conflictingReservation) {
            $fail('Une réservation pour cette voiture existe déjà pendant cette période.');
        }
    }
}
