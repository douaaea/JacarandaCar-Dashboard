<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Voitures | JACARANDACAR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/figure.css') }}" rel="stylesheet" type="css" />
</head>

<body data-menu-color="dark" data-sidebar="default">

    <!-- Begin page -->
    <div id="app-layout">
        @include('partials.topbar')
        @include('partials.sidebar')

        <div class="clearfix"></div>

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-xxl">

                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                        <div class="flex-grow-1">

                        </div>
                        <div class="text-end">
                            <ol class="breadcrumb m-0 py-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Voitures</a></li>
                                <li class="breadcrumb-item active">Details</li>
                            </ol>
                        </div>
                    </div>
                    @include('partials.flashbag')

                    <!-- General Form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Details</h5>
                                </div><!-- end card header -->

                                <div class="card-body text-center">
                                    <div>
                                        <h1>{{ $voiture->marqueVoiture }} {{ $voiture->modelMarque }}</h1>
                                    </div>
                                    <figure class="figure d-inline-block">
                                        <img src="{{ asset('storage/' . $voiture->image) }}"
                                            class="img-fluid figure-img rounded figureImage" alt="Figure img"
                                            style="width: 500px; height:auto;">
                                        <figcaption class="figure-caption">Ajouté le :
                                            {{ $voiture->created_at->format('d/m/Y') }}</figcaption>
                                    </figure>
                                    <div class="row">

                                        <div class="col-md-6 col-xl-6">
                                            <div class="card" style="background-color: #bbcaa1;">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{ url('assets/images/icons8-benefit-50.png') }}">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 text-truncate">
                                                            <small
                                                                class="text-muted fs-13 fw-medium mb-0">Bénéfice:</small>
                                                            <h6 class="my-0 fw-medium text-dark fs-15">
                                                                {{ number_format($benefices, 2) }} DH</h6>
                                                        </div>
                                                    </div>
                                                </div> <!-- end card-body -->
                                            </div> <!-- end card -->
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="card" style="background-color: #caa1a1;">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{ url('assets/images/icons8-charge-50.png') }}">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 text-truncate">
                                                            <small
                                                                class="text-muted fs-13 fw-medium mb-0">Charges:</small>
                                                            <h6 class="my-0 fw-medium text-dark fs-15">
                                                                {{ number_format($SommeCharges, 2) }} DH</h6>
                                                        </div>
                                                    </div>
                                                </div> <!-- end card-body -->
                                            </div> <!-- end card -->
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{ url('assets/images/icons8-price-50.png') }}">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 text-truncate">
                                                            <small class="text-muted fs-13 fw-medium mb-0">Prix:</small>
                                                            <h6 class="my-0 fw-medium text-dark fs-15">
                                                                {{ $voiture->prixJour }} DH/Jour</h6>
                                                        </div>
                                                    </div>
                                                </div> <!-- end card-body -->
                                            </div> <!-- end card -->
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img
                                                                src="{{ url('assets/images/icons8-car-rental-50.png') }}">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 text-truncate">
                                                            <small class="text-muted fs-13 fw-medium mb-0">Nombre de
                                                                réservations:</small>
                                                            <h6 class="my-0 fw-medium text-dark fs-15">
                                                                {{ $NbrReservations }}</h6>
                                                        </div>
                                                    </div>
                                                </div> <!-- end card-body -->
                                            </div> <!-- end card -->
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{ url('assets/images/icons8-car-50.png') }}">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 text-truncate">
                                                            <small class="text-muted fs-13 fw-medium mb-0">Type:</small>
                                                            <h6 class="my-0 fw-medium text-dark fs-15">
                                                                {{ $voiture->type }}</h6>
                                                        </div>
                                                    </div>
                                                </div> <!-- end card-body -->
                                            </div> <!-- end card -->
                                        </div>

                                        <div class="col-md-6 col-xl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img
                                                                src="{{ url('assets/images/icons8-licence-plate-50.png') }}">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 text-truncate">
                                                            <small
                                                                class="text-muted fs-13 fw-medium mb-0">Matricule:</small>
                                                            <h6 class="my-0 fw-medium text-dark fs-15">
                                                                {{ $voiture->matricule }}</h6>
                                                        </div>
                                                    </div>
                                                </div> <!-- end card-body -->
                                            </div> <!-- end card -->
                                        </div>

                                        <div class="col-md-6 col-xl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{ url('assets/images/icons8-fuel-50.png') }}">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 text-truncate">
                                                            <small
                                                                class="text-muted fs-13 fw-medium mb-0">Carburant:</small>
                                                            <h6 class="my-0 fw-medium text-dark fs-15">
                                                                {{ $voiture->carburant }}</h6>
                                                        </div>
                                                    </div>
                                                </div> <!-- end card-body -->
                                            </div> <!-- end card -->
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{ url('assets/images/icons8-color-50.png') }}">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 text-truncate">
                                                            <small
                                                                class="text-muted fs-13 fw-medium mb-0">Couleur:</small>
                                                            <h6 class="my-0 fw-medium text-dark fs-15">
                                                                {{ $voiture->couleur }}</h6>
                                                        </div>
                                                    </div>
                                                </div> <!-- end card-body -->
                                            </div> <!-- end card -->
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img
                                                                src="{{ url('assets/images/icons8-gearbox-50.png') }}">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 text-truncate">
                                                            <small class="text-muted fs-13 fw-medium mb-0">Boite de
                                                                vitesse:</small>
                                                            <h6 class="my-0 fw-medium text-dark fs-15">
                                                                {{ $voiture->boiteVitesse }}</h6>
                                                        </div>
                                                    </div>
                                                </div> <!-- end card-body -->
                                            </div> <!-- end card -->
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img
                                                                src="{{ url('assets/images/icons8-person-50.png') }}">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 text-truncate">
                                                            <small class="text-muted fs-13 fw-medium mb-0">Numero de
                                                                passagers:</small>
                                                            <h6 class="my-0 fw-medium text-dark fs-15">
                                                                {{ $voiture->numPassagers }}</h6>
                                                        </div>
                                                    </div>
                                                </div> <!-- end card-body -->
                                            </div> <!-- end card -->
                                        </div>

                                    </div>




                                </div><!-- end card -->

                            </div><!-- end col -->
                        </div><!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Les Réservations De Cette Voiture:</h5>
                                        <a class="btn btn-primary"
                                            href="{{ route('reservation.create', ['matricule' => $voiture->matricule]) }}"
                                            role="button">Ajouter</a>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <table id="alternative-page-datatable"
                                            class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>CIN</th>
                                                    <th>Date de départ </th>
                                                    <th>Date d'arrivée</th>
                                                    <th>Montant</th>
                                                    <th style="width: 200px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($reservations as $reservation)
                                                    <tr>
                                                        <td>{{ $reservation->CIN }}</td>
                                                        <td>{{ $reservation->dateDepart }}</td>
                                                        <td>{{ $reservation->dateArrive }}</td>
                                                        <td>{{ number_format($reservation->montant, 2) }}</td>
                                                        <td>
                                                            <div class="d-flex flex-wrap gap-2">
                                                                <div class="d-flex gap-2">
                                                                    <a class="btn btn-warning"
                                                                        href="{{ route('reservation.edit', $reservation->idReservation) }}"
                                                                        role="button">Modifier</a>
                                                                    <form
                                                                        id="delete-form-{{ $reservation->idReservation }}"
                                                                        action="{{ route('reservation.destroy', $reservation->idReservation) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                    <button
                                                                        onclick="confirmDelete(event, {{ $reservation->idReservation }})"
                                                                        class="btn btn-danger">Retirer</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        {{ $reservations->links() }}
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Les Charges De Cette Voiture:</h5>
                                        <a class="btn btn-primary"
                                            href="{{ route('charge.create', ['matricule' => $voiture->matricule]) }}"
                                            role="button">Ajouter</a>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <table id="alternative-page-datatable"
                                            class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Type de charge</th>
                                                    <th>Montant</th>
                                                    <th style="width: 200px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($charges as $charge)
                                                    <tr>
                                                        <td>{{ $charge->typeCharge }}</td>
                                                        <td>{{ number_format($charge->montant, 2) }}</td>
                                                        <td>
                                                            <div class="d-flex flex-wrap gap-2">
                                                                <div class="d-flex gap-2">
                                                                    <a class="btn btn-warning"
                                                                        href="{{ route('charge.edit', $charge->idCharge) }}"
                                                                        role="button">Modifier</a>
                                                                    <form id="delete-form-{{ $charge->idCharge }}"
                                                                        action="{{ route('charge.destroy', $charge->idCharge) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                    <button
                                                                        onclick="confirmDelete(event, {{ $charge->idCharge }})"
                                                                        class="btn btn-danger">Retirer</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        {{ $charges->links() }}
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Rapport:</h5>
                                    </div><!-- end card header -->
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <h5 class="m-0">Télécharger le rapport.pdf</h5>
                                        <a class="btn btn-primary"
                                            href="{{ route('voiture.generate', $voiture->idVoiture) }}"
                                            role="button">Télécharger</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div> <!-- container-fluid -->
                </div> <!-- content -->
                @include('partials.footer')
            </div> <!-- end content page -->
        </div> <!-- end wrapper -->


        <!-- Vendor -->
        <script src="{{ url('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ url('assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ url('assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ url('assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ url('assets/libs/feather-icons/feather.min.js') }}"></script>
        <script src="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>

        <!-- App js-->
        <script src="{{ url('assets/js/app.js') }}"></script>
</body>

</html>
