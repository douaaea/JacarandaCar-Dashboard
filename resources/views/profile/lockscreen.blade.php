<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Écran verrouillé | JACARANDACAR</title>
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

<body class="bg-color">

    <!-- Begin page -->
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-12">
                <div class="p-0">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-6 col-xl-6 col-lg-6">
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <div class="mb-0 border-0">
                                        <div class="p-0">
                                            <div class="text-center">
                                                <div class="mb-4">
                                                    <a href="index.html" class="auth-logo">
                                                        <img src="assets/images/logo-dark.png" alt="logo-dark"
                                                            class="mx-auto" height="70" />
                                                    </a>
                                                </div>

                                                <div class="auth-title-section mb-3">
                                                    <h3 class="text-dark fs-20 fw-medium mb-2">Écran verrouillé</h3>
                                                    <p class="text-dark fs-14 mb-0">Bienvenue de retour ! Pour accéder à
                                                        votre compte,<br> veuillez saisir votre mot de passe.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-0">
                                            <form action="{{ route('profile.unlock') }}" class="my-4" method="POST">
                                                @csrf
                                                <div class="form-group mb-3">
                                                    <label for="password" class="form-label">Mot de passe</label>
                                                    <input class="form-control" type="password" name="password"
                                                        required="" placeholder="Entrer votre mot de passe">
                                                    @error('password')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-0 row">
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button class="btn btn-primary" type="submit">
                                                                Déverrouiller </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="col-md-6 col-xl-6 col-lg-6 p-0 vh-100 d-flex justify-content-center account-page-bg">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- END wrapper -->

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
