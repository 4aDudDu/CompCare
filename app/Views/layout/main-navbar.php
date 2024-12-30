<nav class="navbar-expand-lg navbar-light custom-navbar sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <form class="d-flex me-auto custom_input" id="searchForm">
            <input class="form-control me-2 input" type="search" placeholder="Cari..." aria-label="Search"
                id="searchInput">
            <button class="btn btnsearch" type="submit">Cari</button>
        </form>
        <a class="navbar-brand mx-auto text-center titlebrand" id="titlebrand" href="/"
            style="padding-left: 20px; padding-right: 20px;"> <svg class="comptext">
                <text x="50%" y="50%" dy=".35em" text-anchor="middle">
                    CompCare | Digital Solution
                </text>
            </svg></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav navtext">
                <li class="nav-item">
                    <a class="nav-link textnav" aria-current="page" href="/">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link textnav" href="/pages/contact/">Keluhan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link textnav" href="/pages/store/">Marketplace</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link textnav" href="<?= logged_in() ? '/pages/settings' : '/login'; ?>"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-gear" viewBox="0 0 16 16">
                            <path
                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                            <path
                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
                        </svg></a>
                </li>
            </ul>
        </div>
        <?php if (logged_in()): ?>
        <a href="<?= site_url('logout') ?>" class="btn btn-danger">Logout</a>
        <?php else: ?>
        <a href="<?= site_url('login') ?>" class="btn btn-primary">Login</a>
        <?php endif; ?>

</nav>
</div>