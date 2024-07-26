<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Reservation;
use App\Models\Voiture;
use TCPDF;

class PdfController extends Controller
{
    public function generate(Voiture $voiture)
    {
        $fileName = "rapport.pdf";
        $charges = Charge::where('matricule', $voiture->matricule)->get();
        $reservations = Reservation::where('matricule', $voiture->matricule)->get();
        $combined = $charges->merge($reservations)->sortBy('created_at');
        $SommeMontant = Reservation::where('matricule', $voiture->matricule)->sum('montant');
        $SommeCharges = Charge::where('matricule', $voiture->matricule)->sum('montant');
        $benefices = $SommeMontant - $SommeCharges;
        $logoPath = public_path('assets/images/logo-dark-rapport.jpeg');
        $style = public_path('assets/css/style.css');

        $data = [
            "titre" => "Rapport de la voiture",
            "date" => date('m/d/Y'),
            "voiture" => $voiture,
            "benefices" => $benefices,
            "SommeMontant" => $SommeMontant,
            "SommeCharges" => $SommeCharges,
            "logoPath" => $logoPath,
            "style" => $style,
            "combined" => $combined,
        ];

        $html = view()->make('voiture.generateRapport', $data)->render();

        // Create new PDF document
        $pdf = new TCPDF();

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Rapport');
        $pdf->SetSubject('Rapport de la voiture');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        $pdf->AddPage();

        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output(public_path($fileName), 'F');

        return response()->download(public_path($fileName));
    }
}