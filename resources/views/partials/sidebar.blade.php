    <!-- Left Sidebar Start -->
    <div class="app-sidebar-menu">
        <div class="h-100" data-simplebar>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <div class="logo-box">
                    <a href="{{ route('dashboard.acceuil') }}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ url('assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ url('assets/images/logo-light.png') }}" alt="" height="35">
                        </span>
                    </a>
                    <a href="{{ route('dashboard.acceuil') }}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ url('assets/images/logo-sm.png') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{ url('assets/images/logo-dark.png') }}" alt="" height="24">
                        </span>
                    </a>
                </div>

                <ul id="side-menu">

                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{ route('dashboard.acceuil') }}">
                            <i data-feather="home"></i>
                            <span> Tableau de bord </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('calendar.index') }}">
                            <i data-feather="calendar"></i>
                            <span> Calendrier </span>
                        </a>
                    </li>


                    <li class="menu-title">données</li>

                    <li>
                        <a href="#sidebarAuth" data-bs-toggle="collapse">
                            <i data-feather="truck"></i>
                            <span> Voitures</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarAuth">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('voiture.show') }}">Afficher tous</a>
                                </li>
                                <li>
                                    <a href="{{ route('voiture.create') }}">Ajouter une voiture </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#sidebarError" data-bs-toggle="collapse">
                            <i data-feather="file-text"></i>
                            <span> Reservations </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarError">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('reservation.create') }}">Ajout et Affichage</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarExpages" data-bs-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Clients </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarExpages">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('client.create') }}">Ajout et Affichage</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#sidebarAdvancedUI" data-bs-toggle="collapse">
                            <i data-feather="align-left"></i>
                            <span> Autres</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarAdvancedUI">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('marque.create') }}">Ajouter une marque </a>
                                </li>
                                <li>
                                    <a href="{{ route('modele.create') }}">Ajouter un modéle </a>
                                </li>
                                <li>
                                    <a href="{{ route('charge.create') }}">Ajouter une charge </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
    </div>
    <!-- Left Sidebar End -->
