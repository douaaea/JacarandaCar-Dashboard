<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Acceuil | JACARANDACAR</title>
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                            </ol>
                        </div>
                    </div>
                    @include('partials.flashbag')

                    <!-- General Form -->

                    <div class="row justify-content-center">
                        <!-- start sales -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="card-title mb-0">
                                            <img src="{{ url('assets/images/icons8-car-rental-30.png') }}">
                                            Nombre de reservations
                                        </h5>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="justify-content-center text-center">
                                        <h3 class="m-0 mb-3 fs-22">{{ $NbrReservations }}</h3>

                                        <div id="sale_chart" class="apex-charts"></div>
                                    </div>
                                </div> <!-- end card body -->
                            </div> <!-- end card -->
                        </div> <!-- end sales -->

                        <!-- start view -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="card-title mb-0">
                                            <img src="{{ url('assets/images/icons8-group-30.png') }}">
                                            Nombre de clients
                                        </h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="justify-content-center text-center">
                                        <h3 class="m-0 mb-3 fs-22">{{ $NbrClients }}</h3>

                                        <div id="view_chart" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end view -->

                        <!-- start new orders -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="card-title mb-0">
                                            <img src="{{ url('assets/images/icons8-car-30.png') }}">
                                            Nombre de voitures
                                        </h5>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="justify-content-center text-center">
                                        <h3 class="m-0 mb-3 fs-22">{{ $NbrVoitures }}</h3>

                                        <div id="order_chart" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end New Orders -->

                        <!-- start revenue -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="card-title mb-0">
                                            <img src="{{ url('assets/images/icons8-brand-30.png') }}">
                                            Nombre de marques
                                        </h5>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="justify-content-center text-center">
                                        <h3 class="m-0 mb-3 fs-22">{{ $NbrVoitures }}</h3>
                                        <div id="revenue_chart" class="apex-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="card-title mb-0">
                                            <img src="{{ url('assets/images/icons8-best-seller-30.png') }}">
                                            Meilleurs Clients
                                        </h5>

                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="justify-content-center">
                                        <div class="table-responsive card-table">
                                            <table class="table align-middle table-nowrap mb-0">
                                                <tbody>
                                                    <!-- Add your customer rows here -->
                                                    @foreach ($topClients as $client)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center my-1">
                                                                    <div
                                                                        class="avatar-sm rounded me-3 align-items-center justify-content-center d-flex">
                                                                        <img
                                                                            src="{{ url('assets/images/icons8-client-30.png') }}">

                                                                    </div>
                                                                    <div>
                                                                        <h5 class="fs-14 mb-1">{{ $client->prenom }}
                                                                            {{ $client->nom }}</h5>
                                                                        <span
                                                                            class="text-muted">{{ $client->total_reservations }}
                                                                            réservations <br>
                                                                            {{ $client->CIN }}</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="fw-normal my-1">
                                                                    {{ number_format($client->total_montant, 2) }}DH
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row h-100">
                                <div class="col-md-12 mb-4"> <!-- Added mb-4 class for margin-bottom -->
                                    <div class="card h-100">
                                        <div class="card-header" style="background-color: #d0e5ac;">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5 class="card-title mb-0">
                                                    <img src="{{ url('assets/images/icons8-profit-30.png') }}">
                                                    Chiffre d'affaires
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div
                                                class="d-flex flex-column justify-content-center align-items-center h-100 text-center">
                                                <h3 class="m-0 mb-3" style="font-size: 30px;">
                                                    {{ number_format($benefices, 2) }}DH</h3>
                                                <!-- Reduced font size -->
                                                <div id="revenue_chart_2" class="apex-charts"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4"> <!-- Added mb-4 class for margin-bottom -->
                                    <div class="card h-100">
                                        <div class="card-header" style="background-color: #d0e5ac;">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5 class="card-title mb-0">
                                                    <img src="{{ url('assets/images/icons8-profit-30.png') }}">
                                                    Montant Total des Locations
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div
                                                class="d-flex flex-column justify-content-center align-items-center h-100 text-center">
                                                <h3 class="m-0 mb-3" style="font-size: 30px;">
                                                    {{ number_format($MontantReservations, 2) }}DH</h3>
                                                <!-- Reduced font size -->
                                                <div id="revenue_chart_2" class="apex-charts"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="card-title mb-0">
                                            <img src="{{ url('assets/images/icons8-best-seller-30.png') }}">
                                            Voitures les Plus Louées
                                        </h5>

                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="justify-content-center">
                                        <div class="table-responsive card-table">
                                            <table class="table align-middle table-nowrap mb-0">
                                                <tbody>
                                                    @foreach ($topVoitures as $voiture)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center my-1">
                                                                    <div
                                                                        class="avatar-sm rounded me-3 align-items-center justify-content-center d-flex">
                                                                        <img src="{{ asset('storage/' . $voiture->image) }}"
                                                                            class="img-fluid ">

                                                                    </div>
                                                                    <div>
                                                                        <h5 class="fs-14 mb-1">
                                                                            {{ $voiture->marqueVoiture }}
                                                                            {{ $voiture->modelMarque }}</h5>
                                                                        <span
                                                                            class="text-muted">{{ $voiture->total_reservations }}
                                                                            réservations <br>
                                                                            {{ $voiture->matricule }}</span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="fw-normal my-1">
                                                                    {{ number_format($voiture->total_montant, 2) }}DH
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5 class="card-title mb-0">
                                            <img src="{{ url('assets/images/icons8-analytics-30.png') }}">
                                            Nombre de Réservations Mensuelles
                                        </h5>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="justify-content-center">
                                        <div id="res_chart" class="apex-charts"></div>
                                    </div>
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

    <!-- Apexcharts JS -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- for basic area chart -->
    <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

    <!-- App js-->
    <script src="{{ url('assets/js/app.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const data = @json($monthlyReservations);
            const categories = [
                "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
                "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
            ];
            const seriesData = new Array(12).fill(0); // Initialize an array with 12 zeros

            data.forEach(item => {
                seriesData[item.month - 1] = item
                    .total_reservations; // Fill the array with reservation data
            });

            var options = {
                series: [{
                    name: "Réservations",
                    data: seriesData
                }],
                chart: {
                    type: "bar",
                    height: 318,
                    toolbar: {
                        show: !1
                    }
                },
                colors: ["#d0e5ac"],
                plotOptions: {
                    bar: {
                        horizontal: !1,
                        columnWidth: "45%",
                        endingShape: "rounded",
                        borderRadius: 5
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    show: !0,
                    width: 2,
                    colors: ["transparent"]
                },
                xaxis: {
                    categories: categories,
                    axisBorder: {
                        show: !1
                    },
                    axisTicks: {
                        show: !1
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: ["#001b2f"]
                        }
                    }
                },
                grid: {
                    borderColor: "#f1f1f1"
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val;
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#res_chart"), options);
            chart.render();
        });
    </script>
</body>

</html>
