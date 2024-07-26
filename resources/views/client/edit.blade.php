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
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
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
                                <li class="breadcrumb-item active">Modifier un client</li>
                            </ol>
                        </div>
                    </div>
                    @include('partials.flashbag')

                    <!-- General Form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Modifier un client</h5>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <form action="{{ route('client.update', $client->idClient) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="prenom" class="form-label">Prénom</label>
                                                    <input type="text" id="prenom" name="prenom"
                                                        class="form-control" value="{{ $client->prenom }}"
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
                                                        class="form-control" value="{{ $client->nom }}"
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
                                                        class="form-control" value="{{ $client->email }}"
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
                                                        class="form-control" value="{{ $client->CIN }}"
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
                                                        class="form-control" value="{{ $client->permis }}"
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
                                                        class="form-control" value="{{ $client->age }}"
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
                                                        aria-label="Floating label select example" name="sexe"
                                                        value="{{ $client->sexe }}">
                                                        <option selected value="{{ $client->sexe }}">
                                                            {{ $client->sexe }}</option>
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
                                                        class="form-control" value="{{ $client->telephone }}"
                                                        placeholder="Entrer le numero de telephone du client">
                                                    @error('telephone')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="adresse" class="form-label">Adresse</label>
                                            <textarea class="form-control" id="adresse" rows="5" spellcheck="false" name="adresse">{{ $client->adresse }}</textarea>
                                            @error('adresse')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">Modifier</button>
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->

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

    <!-- App js-->
    <script src="{{ url('assets/js/app.js') }}"></script>
</body>

</html>
