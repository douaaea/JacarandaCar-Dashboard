<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Clients | JACARANDACAR</title>
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Clients</a></li>
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
                                    <h5 class="card-title mb-0">Ajouter un client</h5>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <form action="{{ route('client.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="prenom" class="form-label">Prénom</label>
                                                    <input type="text" id="prenom" name="prenom"
                                                        class="form-control" value="{{ old('prenom') }}"
                                                        placeholder="Entrer le prénom du client">
                                                    @error('prenom')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="nom" class="form-label">Nom</label>
                                                    <input type="text" id="nom" name="nom"
                                                        class="form-control" value="{{ old('nom') }}"
                                                        placeholder="Entrer le nom du client">
                                                    @error('nom')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" id="email" name="email"
                                                        class="form-control" value="{{ old('email') }}"
                                                        placeholder="Entrer l'adresse email du client">
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="CIN" class="form-label">CIN</label>
                                                    <input type="text" id="CIN" name="CIN"
                                                        class="form-control" value="{{ old('CIN') }}"
                                                        placeholder="Entrer le CIN du client">
                                                    @error('CIN')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="permis" class="form-label">Permis de conduite</label>
                                                    <input type="text" id="permis" name="permis"
                                                        class="form-control" value="{{ old('permis') }}"
                                                        placeholder="Entrer le numero du permis du client">
                                                    @error('permis')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="age" class="form-label">Age</label>
                                                    <input type="text" id="age" name="age"
                                                        class="form-control" value="{{ old('age') }}"
                                                        placeholder="Entrer l'age du client">
                                                    @error('age')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="sexe" class="form-label">Sexe</label>
                                                    <select class="form-select" id="floatingSelect"
                                                        aria-label="Floating label select example" name="sexe">
                                                        <option selected disabled>Sélectionnez dans le menu</option>
                                                        <option value="M">M</option>
                                                        <option value="F">F</option>
                                                    </select>
                                                    @error('sexe')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="telephone" class="form-label">Telephone</label>
                                                    <input type="text" id="telephone" name="telephone"
                                                        class="form-control" value="{{ old('telephone') }}"
                                                        placeholder="Entrer le numero de telephone du client">
                                                    @error('telephone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="adresse" class="form-label">Adresse</label>
                                            <textarea class="form-control" id="adresse" rows="5" spellcheck="false" name="adresse">{{ old('adresse') }}</textarea>
                                            @error('adresse')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
                                    <form method="GET" class="d-flex" action="{{ route('client.search') }}">
                                        <input class="form-control me-2" type="search" name="query"
                                            placeholder="Chercher..." aria-label="Search">
                                        <button class="btn btn-outline-dark rounded-pill"
                                            type="submit">Chercher</button>
                                    </form>
                                    <table id="alternative-page-datatable"
                                        class="table table-striped dt-responsive nowrap w-100 mt-3">
                                        <thead>
                                            <tr>
                                                <th>Prenom</th>
                                                <th>Nom</th>
                                                <th>Age</th>
                                                <th>Sexe</th>
                                                <th>CIN</th>
                                                <th>Permis</th>
                                                <th>Email</th>
                                                <th>Telephone</th>
                                                <th>Adresse</th>
                                                <th style="width: 200px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clients as $client)
                                                <tr>
                                                    <td>{{ $client->prenom }}</td>
                                                    <td>{{ $client->nom }}</td>
                                                    <td>{{ $client->age }}</td>
                                                    <td>{{ $client->sexe }}</td>
                                                    <td>{{ $client->CIN }}</td>
                                                    <td>{{ $client->permis }}</td>
                                                    <td>{{ $client->email }}</td>
                                                    <td>{{ $client->telephone }}</td>
                                                    <td>{{ $client->adresse }}</td>
                                                    <td>
                                                        <div class="d-flex flex-wrap gap-2">
                                                            <div class="d-flex gap-2">
                                                                <a class="btn btn-warning"
                                                                    href="{{ route('client.edit', $client->idClient) }}"
                                                                    role="button">Modifier</a>
                                                                <form id="delete-form-{{ $client->idClient }}"
                                                                    action="{{ route('client.destroy', $client->idClient) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                                <button class="btn btn-danger"
                                                                    onclick="confirmDelete(event, {{ $client->idClient }})">Retirer</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    {{ $clients->links() }}
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
