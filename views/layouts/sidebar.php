<div class="header">
    <!-- navbar -->
    <div class="navbar-custom navbar navbar-expand-lg">
        <div class="container-fluid px-0">
            <a class="navbar-brand d-block d-md-none" href="index.html">
                <img src="assets/images/brand/logo/logo-2.svg" alt="Image">
            </a>



            <a id="nav-toggle" href="#!" class="ms-auto ms-md-0 me-0 me-lg-3 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-text-indent-left text-muted" viewbox="0 0 16 16">
                    <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z">
                    </path>
                </svg></a>

            <div class="d-none d-md-none d-lg-block">
                <!-- Form -->
                <form action="#">


                    <div class="input-group ">
                        <input class="form-control rounded-3" type="search" value="" id="searchInput" placeholder="Search">
                        <span class="input-group-append">
                            <button class="btn  ms-n10 rounded-0 rounded-end" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search text-dark">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
            <!--Navbar nav -->
            <ul class="navbar-nav navbar-right-wrap ms-lg-auto d-flex nav-top-wrap align-items-center ms-4 ms-lg-0">
                <a href="#" class="form-check form-switch theme-switch btn btn-ghost btn-icon rounded-circle mb-0 ">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>

                </a>


                <li class="dropdown stopevent ms-2">
                    <a class="btn btn-ghost btn-icon rounded-circle" href="#!" role="button" id="dropdownNotification" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-xs" data-feather="bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end" aria-labelledby="dropdownNotification">
                        <div>
                            <div class="border-bottom px-3 pt-2 pb-3 d-flex
              justify-content-between align-items-center">
                                <p class="mb-0 text-dark fw-medium fs-4">Notifications</p>
                                <a href="#!" class="text-muted">
                                    <span>
                                        <i class="me-1 icon-xs" data-feather="settings"></i>
                                    </span>
                                </a>
                            </div>
                            <div data-simplebar="" style="height: 250px;">
                                <!-- List group -->
                                <ul class="list-group list-group-flush notification-list-scroll">
                                    <!-- List group item -->
                                    <li class="list-group-item bg-light">


                                        <a href="#!" class="text-muted">
                                            <h5 class=" mb-1">Rishi Chopra</h5>
                                            <p class="mb-0">
                                                Mauris blandit erat id nunc blandit, ac eleifend dolor pretium.
                                            </p>
                                        </a>



                                    </li>
                                    <!-- List group item -->
                                    <li class="list-group-item">


                                        <a href="#!" class="text-muted">
                                            <h5 class=" mb-1">Neha Kannned</h5>
                                            <p class="mb-0">
                                                Proin at elit vel est condimentum elementum id in ante. Maecenas
                                                et sapien metus.
                                            </p>
                                        </a>



                                    </li>
                                    <!-- List group item -->
                                    <li class="list-group-item">


                                        <a href="#!" class="text-muted">
                                            <h5 class=" mb-1">Nirmala Chauhan</h5>
                                            <p class="mb-0">
                                                Morbi maximus urna lobortis elit sollicitudin sollicitudieget
                                                elit vel pretium.
                                            </p>
                                        </a>



                                    </li>
                                    <!-- List group item -->
                                    <li class="list-group-item">


                                        <a href="#!" class="text-muted">
                                            <h5 class=" mb-1">Sina Ray</h5>
                                            <p class="mb-0">
                                                Sed aliquam augue sit amet mauris volutpat hendrerit sed nunc eu
                                                diam.
                                            </p>
                                        </a>



                                    </li>
                                </ul>
                            </div>
                            <div class="border-top px-3 py-2 text-center">
                                <a href="#!" class="text-inherit ">
                                    View all Notifications
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- List -->
                <li class="dropdown ms-2">
                    <a class="rounded-circle" href="#!" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-md avatar-indicators avatar-online">
                            <img alt="avatar" src="<?= BASE_URL ?>assets/images/avatar/<?= $session->get('user')->photo ?>" class="rounded-circle">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                        <div class="px-4 pb-0 pt-2">


                            <div class="lh-1 ">
                                <h5 class="mb-1"><?= $session->get('user')->full_name ?></h5>
                            </div>
                            <div class=" dropdown-divider mt-3 mb-2"></div>
                        </div>

                        <ul class="list-unstyled">

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#!">
                                    <i class="me-2 icon-xxs dropdown-item-icon" data-feather="user"></i>
                                    Editar Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" id="logout">
                                    <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>
                                    Cerrar sesión
                                </a>
                            </li>
                        </ul>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- navbar vertical -->
<div class="app-menu">
    <!-- Sidebar -->
    <div class="navbar-vertical navbar nav-dashboard">
        <div class="h-100" data-simplebar="">
            <!-- Brand logo -->
            <a class="navbar-brand" href="index.html">
                <img src="assets/images/brand/logo/logo-2.svg" alt="dash ui - bootstrap 5 admin dashboard template">
            </a>
            <!-- Navbar nav -->
            <ul class="navbar-nav flex-column" id="sideNavbar">

                <li class="nav-item">
                    <a class="nav-link <?= $this->ctr->isActive('Dashboard') ?>" href="index.html">
                        <i data-feather="home" class="nav-icon me-2 icon-xxs"></i>
                        Dashboard
                    </a>
                </li>

                <!-- Nav item -->
                <li class="nav-item">
                    <a class="nav-link has-arrow " href="#!" data-bs-toggle="collapse" data-bs-target="#navDashboard" aria-expanded="false" aria-controls="navDashboard">
                        <i data-feather="users" class="nav-icon me-2 icon-xxs"></i>
                        Users
                    </a>

                    <div id="navDashboard" class="collapse show" data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link has-arrow" href="<?= BASE_URL ?>users/list">
                                    Sistema
                                </a>
                            </li>
                        </ul>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</div>