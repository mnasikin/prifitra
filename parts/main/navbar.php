</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="dashboard" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fas fa-random me-2"></i><?php echo BASE_NAME; ?></h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="<?php echo BASE_AVATAR; ?>" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['username']; ?></h6>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard" class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/prifitra/dashboard') ? 'active' : ''; ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    <a href="help" class="nav-item nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/prifitra/help') ? 'active' : ''; ?>"><i class="fas fa-question me-2"></i>Help</a>
                    <a href="https://github.com/mnasikin" class="nav-item nav-link" target="_blank"><i class="fab fa-github me-2"></i>Github</a>
                    <a href="logout" class="nav-item nav-link"><i class="fas fa-sign-out-alt me-2"></i>logout</a>
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

