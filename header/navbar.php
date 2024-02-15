<?php 
ini_set('display_errors', 0);
session_start();

$hallo = $_SESSION['username'];  
$isAdmin = $_SESSION['admin'];  
?>

<nav class="navbar navbar-expand-lg bg-light height-navbar" id="scroll">
    <div class="container-fluid">
        <a class="navbar-brand logos" href="../index/main.php">Sabana</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../index/populerPage.php">Populer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index/topPage.php">Top Rated</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index/upComingPage.php">Up Coming</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../session/updateProfile.php"><b  class="text-danger"><?=$hallo ?></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../session/logout.php">Logout</a>
                </li>
            </ul>
            <?php if($isAdmin): ?>
                <a href="../admin/admin_table.php" class="m-3 pb-3 sign-underline">Manage</a>
            <?php endif; ?>
            <form class="d-flex " role="search">
                <input class="form-control me-2 " id="hideSearch"  oninput = "Search((this.value).toLowerCase())" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
    </div>
</nav>
