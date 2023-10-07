<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$this->layout('Template', ['title' => "Home"])
?>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Are you sure you want to log out of your account?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <a href="/logout-action" type="button" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button
                    class="navbar-toggler"
                    type="button"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <img
                            src="assets/img/logo.png"
                            height="30"
                            alt="MDB Logo"
                            loading="lazy"
                    />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Projects</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Icon -->
                <a class="text-reset me-3" href="#">
                    <i class="fas fa-shopping-cart"></i>
                </a>

                <!-- Avatar -->
                <?php if (($this->escape(isset($_COOKIE['access_token']))) && $decoded = JWT::decode($_COOKIE['access_token'], new Key($_ENV['SECRET_KEY'], 'HS256'))) { ?>
                    <div class="dropdown">
                        <a
                                class="dropdown-toggle d-flex align-items-center hidden-arrow"
                                href="#"
                                id="navbarDropdownMenuAvatar"
                                role="button"
                                data-mdb-toggle="dropdown"
                                aria-expanded="false"
                        >
                            <img
                                    src="assets/img/super_sex.jpeg"
                                    class="rounded-circle"
                                    height="25"
                                    alt="Black and White Portrait of a Man"
                                    loading="lazy"
                            />
                        </a>
                        <ul
                                class="dropdown-menu dropdown-menu-end"
                                aria-labelledby="navbarDropdownMenuAvatar"
                        >
                            <li>
                                <a class="dropdown-item" href="#">My profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Settings</a>
                            </li>
                            <li>
                                <a class="dropdown-item" data-mdb-toggle="modal" data-mdb-target="#exampleModal"
                                   href="/logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                <?php } else { ?>
                    <a href="/signin" class="btn btn-secondary me-2">Sign In</a>
                    <a href="/signup" class="btn btn-primary me-2">Sign Up</a>
                <?php } ?>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>

<?php if (($this->escape(isset($_COOKIE['access_token']))) && $decoded = JWT::decode($_COOKIE['access_token'], new Key($_ENV['SECRET_KEY'], 'HS256'))) { ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Hello, <?= $decoded->name ?></h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <button type="button" class="btn btn-primary">Button</button>
        </div>
    </div>
<?php } ?>