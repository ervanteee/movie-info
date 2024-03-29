<?php include('../header/head.php') ?>
<?php include('../header/navbar.php') ?>
<?php include('../utilities/titleSection.php') ?>
<?php 
session_start();
if($_SESSION['login'] == false){
    header('Location: ../session/login.php');
    exit();
}
?>

<script src="mainController.js"></script>

<body>
    <div class="title-adjust m-3">
            <b><?=$populer?></b>
    </div>

    <div class="container-fluid mt-3">
        <div class="d-flex justify-content-center align-items-center">
            <div id="cardPopuler" class="row gap-3"></div>
        </div>
    </div>

    <div class="title-adjust m-3">
        <b><?=$topRated?></b>
    </div>

    <div class="container-fluid mt-3">
        <div class="d-flex justify-content-center align-items-center">
            <div id="cardTopRated" class="row gap-3"></div>
        </div>
    </div>

    <div class="title-adjust m-3">
        <b><?=$upComing?></b>
    </div>

    <div class="container-fluid mt-3">
        <div class="d-flex justify-content-center align-items-center">
            <div id="cardUpcoming" class="row gap-3"></div>
        </div>
    </div>

</body>

<style>
    body {
        background:#F5F5F5;
        margin: 0;
    }
    
    .card {
        margin-bottom: 20px;
        padding: 0;
        width: 360px;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
    }

    .card img {
        max-width: 100%;
        height: auto;
        border-radius: 10px 10px 0 0;
    }

    .title-adjust{
        font-size: 3em;
    }
</style>
</html>
