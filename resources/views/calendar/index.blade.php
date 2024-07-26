<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Calendrier | JACARANDACAR</title>
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Calendrier</a></li>
                            </ol>
                        </div>
                    </div>
                    @include('partials.flashbag')

                    <!-- General Form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title mb-0">Calendrier</h5>
                                        </div><!-- end card header -->

                                        <div class="card-body">
                                            <div id='calendar'></div>

                                            <!-- Modal -->
                                            <div class="modal fade bs-example-modal-center" tabindex="-1"
                                                role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalTitle">Details de la
                                                                réservation</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id="modalBody">
                                                            <div class="mb-3">
                                                                <h5 class="fw-bold text-center" id="modalVoiture"></h5>
                                                            </div>
                                                            <div class="text-center mb-3">
                                                                <img id="modalVoitureImage" src=""
                                                                    alt="Car Image" class="img-fluid mb-3"
                                                                    style="max-height: 200px;">
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-md-6">
                                                                    <strong>Matricule:</strong>
                                                                    <p id="modalMatricule" class="mb-0"></p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong>Client:</strong>
                                                                    <p id="modalClient" class="mb-0"></p>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-md-6">
                                                                    <strong>Date de Départ:</strong>
                                                                    <p id="modalDateDepart" class="mb-0"></p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong>Date d'Arrivée:</strong>
                                                                    <p id="modalDateArrive" class="mb-0"></p>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="modal-footer d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <strong class="fs-4">Montant:</strong>
                                                                    <!-- Use Bootstrap's font-size utilities -->
                                                                </div>
                                                                <div class="text-end">
                                                                    <p id="modalMontant" class="mb-0 fs-5"></p>
                                                                    <!-- Ensure fs-30 class is applied correctly -->
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
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

        <!-- App js-->
        <script src="{{ url('assets/js/app.js') }}"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/locales/fr.global.min.js'></script> <!-- French locale script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var reservation = @json($events);
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'fr',
                    eventTextColor: 'black',
                    events: reservation,
                    eventDidMount: function(info) {
                        // Set cursor style directly
                        info.el.style.cursor =
                            'pointer'; // Show a pointer cursor when hovering over the event
                    },
                    eventClick: function(info) {
                        // Access extended properties
                        var details = info.event.extendedProps.details;

                        // Update modal content
                        document.getElementById('modalMatricule').innerText = details.reservation.matricule;
                        document.getElementById('modalClient').innerText = details.reservation.CIN;
                        document.getElementById('modalDateDepart').innerText = details.reservation
                            .dateDepart;
                        document.getElementById('modalDateArrive').innerText = details.reservation
                            .dateArrive;
                        document.getElementById('modalVoiture').innerText = details.voiture.marqueVoiture +
                            ' ' + details.voiture.modelMarque;
                        document.getElementById('modalMontant').innerText = details.reservation.montant
                            .toFixed(2) + '    DH';
                        document.getElementById('modalVoitureImage').src = "{{ asset('storage/') }}/" +
                            details.voiture.image;


                        // Show the modal
                        var modalElement = document.querySelector('.bs-example-modal-center');
                        var modal = new bootstrap.Modal(modalElement);
                        modal.show();
                    }
                });

                calendar.render();
            });
        </script>
</body>

</html>
