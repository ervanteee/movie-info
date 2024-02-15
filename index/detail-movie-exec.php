<?php include('../header/head.php') ?>
<script src="detailController.js"></script>
<?php include('../header/navbar.php') ?>
<?php include('../connection/koneksi.php');getConnection(); ?>

<body>
    
    <div class="heading-detail">
        <div class="img-bg">
            <ul class="text-center decoration-ul">
                <li class="text-danger "><p class="text-li-header ">Movies Detail</p></li>
            </ul>
        </div> 
    </div>

    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center">
            <div id="cardMovie" class="row gap-3"></div>
        </div>
    </div>

    <div class="comment-user">
        <h1 class="ms-5"><b>Comments</b></h1>    
            <form action="../api/insertComment.php" method="post">
            <div class="mb-3  ms-5" id="myText">
                <input type="text" name="comments"  class="form-control comment-form " required>
            </div>
            <button type="submit" class="d-none ">SUBMIT</button>
            </form>
    </div>
    <div  id="commentsList"></div>

</body>

<style>
    .heading-detail {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 300px;
        background-color: black;
        overflow: hidden;
    }
    .text-li-header{
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: 3.5em;
    }

    .img-bg {
        display: flex;
        justify-content: center;
        align-items: center;
        background:
        linear-gradient(
            rgba(2,0,36, 0.8),
            rgba(2,0,36, 0.8)
        ),
        url('../img/img-heading.jpg');
        background-size: cover;
        background-position: center;
        width: 100%;
        height: 100%;
    }

    .decoration-ul {
        text-decoration: none;
        list-style: none;
        padding: 0; 
    }

    .heading-detail li {
        color: red; 
        font-size: 24px;
    }

    body {
        background:#F5F5F5;

        margin: 0;
    }

    .detail-img-resize{
        max-width: 400px;
        max-height: 550px;
    }

    .margin-synopsis{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        margin-left: 40px;
        font-size: 19px;
        margin-right: 100px;
        padding: 70px;
        background-color: #F5F5DC;
    }
    .text-detail-size{
        font-size: 17px;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }


    .comment-form{
        padding-bottom: 250px;
    }

    .comment-form-user{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        margin-left: 40px;
        font-size: 19px;
    }

    .comment-padding{
        padding: 40px;
        background-color: #F5F5DC;
    }

</style>
</html>
