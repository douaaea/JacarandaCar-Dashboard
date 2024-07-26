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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Voitures</a></li>
                                <li class="breadcrumb-item active">Ajouter une voiture</li>
                            </ol>
                        </div>
                    </div>
                    @include('partials.flashbag')

                    <!-- General Form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Ajouter une voiture</h5>
                                </div><!-- end card header -->

                                <div class="card-body">

                                    <form action="{{ route('voiture.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="prenom" class="form-label">Modèle</label>
                                                    <input type="text" id="prenom" name="modelMarque"
                                                        class="form-control" value="{{ old('modelMarque') }}"
                                                        placeholder="Entrer le modèle de la voiture">
                                                    @error('modelMarque')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="nom" class="form-label">Numero de Passagers</label>
                                                    <select class="form-select" id="floatingSelect"
                                                        aria-label="Floating label select example" name="numPassagers">
                                                        <option selected disabled>Sélectionnez dans le menu</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                    </select>
                                                    @error('numPassagers')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Prix par Jour</label>
                                                    <input type="text" id="prix" name="prixJour"
                                                        class="form-control" value="{{ old('prixJour') }}"
                                                        placeholder="Entrer le prix de la voiture">
                                                    @error('prixJour')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="CIN" class="form-label">Matricule</label>
                                                    <input type="text" id="matricule" name="matricule"
                                                        class="form-control" value="{{ old('matricule') }}"
                                                        placeholder="Entrer la matricule de la voiture">
                                                    @error('matricule')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="permis" class="form-label">Couleur</label>
                                                    <input type="text" id="" name="couleur"
                                                        class="form-control" value="{{ old('couleur') }}"
                                                        placeholder="Entrer la couleur de la voiture">
                                                    @error('couleur')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="age" class="form-label">Carburant</label>
                                                    <select class="form-select" id="floatingSelect"
                                                        aria-label="Floating label select example" name="carburant">
                                                        <option selected disabled>Sélectionnez dans le menu</option>
                                                        <option value="Essence">Essence</option>
                                                        <option value="Diesel">Diesel</option>
                                                    </select>
                                                    @error('carburant')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="sexe" class="form-label">Boîte de vitesse</label>
                                                    <select class="form-select" id="floatingSelect"
                                                        aria-label="Floating label select example"
                                                        name="boiteVitesse">
                                                        <option selected disabled>Sélectionnez dans le menu</option>
                                                        <option value="Automatique">Automatique</option>
                                                        <option value="Manuelle">Manuelle</option>
                                                    </select>
                                                    @error('boiteVitesse')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="telephone" class="form-label">Type</label>
                                                    <select class="form-select" id="floatingSelect"
                                                        aria-label="Floating label select example" name="type">
                                                        <option selected disabled>Sélectionnez dans le menu</option>
                                                        <option value="Citadine">Citadine</option>
                                                        <option value="Berline">Berline</option>
                                                        <option value="Compact">Compact</option>
                                                        <option value="Luxe">Luxe</option>
                                                        <option value="SUV">SUV</option>
                                                        <option value="Sport">Sport</option>
                                                        <option value="4x4">4x4</option>
                                                    </select>
                                                    @error('type')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="telephone" class="form-label">Marque</label>
                                                    <select class="form-select " id="floatingSelect"
                                                        aria-label="Floating label select example"
                                                        name="marqueVoiture">
                                                        <option selected disabled>Sélectionnez dans le menu</option>
                                                        @foreach ($marques as $marque)
                                                            <option value="{{ $marque->marqueVoiture }}">
                                                                {{ $marque->marqueVoiture }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('marqueVoiture')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="telephone" class="form-label">Image de la
                                                        voiture</label>
                                                    <input type="file" id="telephone" name="image"
                                                        class="form-control" value="{{ old('image') }}">
                                                    @error('image')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <label for="example-date" class="form-label">Prix d'achats</label>
                                                <input type="text" id="example-date" class="form-control"
                                                    name="chargeAchat" value="{{ old('chargeAchat') }}"
                                                    placeholder="Entrer le montant payé">
                                                @error('chargeAchat')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="d-grid">
                                                    <label class="form-label"
                                                        style="visibility: hidden;">Button</label>
                                                    <button class="btn btn-primary form-control"
                                                        type="submit">Ajouter</button>
                                                </div>
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
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>

    <!-- App js-->
    <script src="assets/js/app.js"></script>
</body>

</html>
