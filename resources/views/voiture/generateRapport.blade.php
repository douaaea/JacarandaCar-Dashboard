<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Example 1</title>
    <link href="{{ $style }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <header class="clearfix">
        <table class="header-table">
            <tr>
                <td style="width: 300px;">
                    <img src="{{ $logoPath }}" alt="Logo" style="width: 300px;">
                </td>
                <td>
                    <div>JACARANDACAR</div>
                    <div>7, Centre d´Affaires Al Abraj,<br /> Immeuble C Bd 11 Janvier <br /> Marrakech 40000</div>
                    <div>+2126 62 15 10 10</div>
                    <div><a href="mailto:info@jacarandacar.com">info@jacarandacar.com</a></div>
                </td>
            </tr>
        </table>
        <h1>Rapport {{ $voiture->matricule }}</h1>
    </header>
    <main>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>TYPE</th>
                    <th>DESCRIPTION</th>
                    <th>MONTANT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($combined as $item)
                    <tr>
                        <td>{{ get_class($item) == 'App\Models\Reservation' ? 'Reservation' : 'Charge' }}</td>
                        <td>
                            @if (get_class($item) == 'App\Models\Reservation')
                                du {{ $item->dateDepart }} à {{ $item->dateArrive }}
                            @else
                                {{ $item->typeCharge }}
                            @endif
                        </td>
                        <td class="desc">{{ $item->montant }} DH</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2" class="total">TOTAL RESERVATIONS</td>
                    <td class="total">{{ $SommeMontant }} DH</td>
                </tr>
                <tr>
                    <td colspan="2" class="total">TOTAL CHARGES</td>
                    <td class="total">{{ $SommeCharges }} DH</td>
                </tr>
                <tr>
                    <td colspan="2" class="grand total">TOTAL NET</td>
                    <td class="grand total">{{ $benefices }} DH</td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>
