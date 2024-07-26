<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Reservations | JACARANDACAR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Reservations</a></li>
                                <li class="breadcrumb-item active">Ajout et affichage</li>
                            </ol>
                        </div>
                    </div>
                    @include('partials.flashbag')

                    <!-- General Form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Ajouter Une Réservation</h5>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <form action="{{ route('reservation.store') }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="prenom" class="form-label">CIN du client</label>
                                                <input type="text" id="prenom" name="CIN" class="form-control"
                                                    value="{{ old('CIN') }}" placeholder="Entrer le CIN du client">
                                                @error('CIN')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="nom" class="form-label">La voiture à louer</label>
                                                <input class="form-control" list="datalistOptions" id="exampleDataList"
                                                    placeholder="Chercher..." name="matricule"
                                                    value="{{ request()->query('matricule') }}">
                                                <datalist id="datalistOptions">
                                                    @foreach ($voitures as $voiture)
                                                        <option value="{{ $voiture->matricule }}">
                                                            {{ $voiture->marqueVoiture }}-{{ $voiture->modelMarque }}-{{ $voiture->matricule }}
                                                        </option>
                                                    @endforeach
                                                </datalist>
                                                @error('matricule')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="example-date" class="form-label">Date de départ</label>
                                                <input type="date" id="example-date" class="form-control"
                                                    name="dateDepart" value="{{ old('dateDepart') }}">
                                                @error('dateDepart')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="example-date" class="form-label">Date d'arrivée</label>
                                                <input type="date" id="example-date" class="form-control"
                                                    name="dateArrive" value="{{ old('dateArrive') }}">
                                                @error('dateArrive')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">Ajouter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Vos Données</h5>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <form method="GET" class="d-flex" action="{{ route('reservation.search') }}">
                                        <input class="form-control me-2" type="search" name="query"
                                            placeholder="Chercher..." aria-label="Search">
                                        <button class="btn btn-outline-dark rounded-pill"
                                            type="submit">Chercher</button>
                                    </form>
                                    <table id="alternative-page-datatable"
                                        class="table table-striped dt-responsive nowrap w-100 mt-3">
                                        <thead>
                                            <tr>
                                                <th>CIN</th>
                                                <th>Matricule</th>
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
                                                    <td>{{ $reservation->matricule }}</td>
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
                </div> <!-- container-fluid -->
            </div> <!-- content -->
            @include('partials.footer')
        </div> <!-- end content page -->
    </div> <!-- end wrapper -->

    <!-- Vendor -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- App js-->
    <script src="assets/js/app.js"></script>
</body>

</html>
