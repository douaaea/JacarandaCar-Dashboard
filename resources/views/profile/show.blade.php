<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Profile | JACARANDACAR</title>
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
                            <h4 class="fs-18 fw-semibold m-0"></h4>
                        </div>
                        <div class="text-end">
                            <ol class="breadcrumb m-0 py-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li>
                                <li class="breadcrumb-item active">votre profile</li>
                            </ol>
                        </div>
                    </div>
                    @include('partials.flashbag')

                    <!-- General Form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card  text-white" style="background-color: #001B2F;">
                                <div class="card-body text-center">
                                    <img src="{{ asset('storage/' . $profile->image) }}"
                                        class="rounded-circle avatar-xxxl mb-3" alt="image profile" height="250px">
                                    <div class="overflow-hidden">
                                        <h4 class="m-0 text-white" style="font-size: 2rem;">{{ $profile->prenom }}
                                            {{ $profile->nom }}</h4>
                                        <p class="my-1 text-white" style="font-size: 1rem;">{{ $profile->email }}</p>
                                        <span>Rejoint le : {{ $profile->created_at->format('d/m/Y') }}</span>
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                    <!-- General Form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Modifier votre Profile</h5>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <form action="{{ route('profile.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="prenom" class="form-label">Prénom</label>
                                                    <input type="text" id="prenom" name="prenom"
                                                        class="form-control" value="{{ $profile->prenom }}"
                                                        placeholder="Entrer votre prénom">
                                                    @error('prenom')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="nom" class="form-label">Nom</label>
                                                    <input type="text" id="nom" name="nom"
                                                        class="form-control" value="{{ $profile->nom }}"
                                                        placeholder="Entrer votre nom">
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
                                                        class="form-control" value="{{ $profile->email }}"
                                                        placeholder="Entrer votre adresse email">
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Image:</label>
                                                    <input class="form-control" name="image" id="emailaddress"
                                                        type="file">
                                                    @error('image')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
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
                    <!-- General Form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Modifier votre Mot de passe</h5>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <form action="{{ route('profile.updatePassword') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Ancien mot de
                                                        passe</label>
                                                    <input type="password" id="prenom" name="password"
                                                        class="form-control"
                                                        placeholder="Entrer votre ancien mot de passe ">
                                                    @error('password')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="nom" class="form-label">Nouveau mot de
                                                        passe</label>
                                                    <input type="password" id="nom" name="motdepasse"
                                                        class="form-control"
                                                        placeholder="Entrer votre nouveau mot de passe ">
                                                    @error('motdepasse')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-end">
                                            <div class="col-lg-6">
                                                <label for="password" class="form-label">Confirmation du mot de
                                                    passe</label>
                                                <input type="password" id="password" name="motdepasse_confirmation"
                                                    class="form-control"
                                                    placeholder="Confirmer votre nouveau mot de passe">
                                            </div>
                                            <div class="col-lg-6">
                                                <button class="btn btn-primary w-100" type="submit">Modifier</button>
                                            </div>
                                            <div>
                                                @error('motdepasse_confirmation')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Supprimer votre compte</h5>
                                        </div><!-- end card header -->

                                        <div class="card-body">
                                            <form id="delete-form-{{ $profile->idProfile }}"
                                                action="{{ route('profile.destroy') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="row mb-3 align-items-end">
                                                    <div class="col-lg-6">
                                                        <label for="password" class="form-label">Mot de passe</label>
                                                        <input type="password" id="password" name="password"
                                                            class="form-control" required
                                                            placeholder="Entrer votre mot de passe">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <button class="btn btn-danger w-100" type="submit">Supprimer
                                                            Mon Compte</button>
                                                    </div>
                                                    <div>
                                                        @error('password')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </form>


                                            </form>
                                        </div><!-- end card-body -->


                                    </div> <!-- end card-->
                                </div> <!-- end col -->
                            </div>

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
    <script src="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>


    <!-- App js-->
    <script src="{{ url('assets/js/app.js') }}"></script>
</body>

</html>
