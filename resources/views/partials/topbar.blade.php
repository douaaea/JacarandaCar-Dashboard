         <!-- Topbar Start -->
         <div class="topbar-custom">
             <div class="container-fluid">
                 <div class="d-flex justify-content-between">
                     <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                         <li>
                             <button class="button-toggle-menu nav-link">
                                 <i data-feather="menu" class="noti-icon"></i>
                             </button>
                         </li>

                     </ul>
                     <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">

                         <li class="dropdown notification-list topbar-dropdown">
                             @include('partials.historique')
                         </li>

                         <li class="dropdown notification-list topbar-dropdown">
                             <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#"
                                 role="button" aria-haspopup="false" aria-expanded="false">

                                 <span class="pro-user-name ms-1">
                                     <img src="{{ asset('storage/' . session('login')->image) }}" alt="user-image"
                                         class=" rounded-circle">
                                     {{ session('login')->prenom }} {{ session('login')->nom }} <i
                                         class="mdi mdi-chevron-down"></i>
                                 </span>
                             </a>
                             <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                 <!-- item-->
                                 <div class="dropdown-header noti-title">
                                     <h6 class="text-overflow m-0">Bienvenue !</h6>
                                 </div>

                                 <!-- item-->
                                 <a href="{{ route('profile.show') }}" class="dropdown-item notify-item">
                                     <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                                     <span>Mon Profile</span>
                                 </a>


                                 <!-- item-->
                                 <a href="{{ route('profile.create') }}" class="dropdown-item notify-item">
                                     <i class="mdi mdi-account-plus fs-16 align-middle"></i>
                                     <span>Ajouter un profile</span>
                                 </a>

                                 <!-- item-->
                                 <a href="{{ route('profile.lockscreen') }}" class="dropdown-item notify-item">
                                     <i class="mdi mdi-lock-outline fs-16 align-middle"></i>
                                     <span>Ecran verrouillé</span>
                                 </a>



                                 <div class="dropdown-divider"></div>

                                 <!-- item-->
                                 <a href="{{ route('login.logout') }}" class="dropdown-item notify-item">
                                     <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                                     <span>Déconnexion</span>
                                 </a>

                             </div>
                         </li>
                     </ul>
                 </div>

             </div>

         </div>
         <!-- end Topbar -->
