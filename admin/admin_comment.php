<?php include('adminCommentCrud.php')?>
<?php include('headTitle.php');?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <?php include ('../header/head.php');?>
    </head>
    <body>
        <div class="text-dark-emphasis w-100">
            <h1 class="text-center mb-3 bg-danger p-3">ADMIN PANEL <br> <?= $title ?></h1>
             <?php include ('linking_table.php');?>    
            <div>
                <table class="table table-bordered table-hover">
                    <thead class="bg-secondary text-white text-center ">
                        <tr>
                            <th>NO</th>
                            <th>SQL_ID</th>
                            <th>Username</th>
                            <th>Comment</th>
                            <th>Id_Movie</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
        <?php
            $sql = "SELECT * FROM review";
            $result = $conn->query($sql);
            $no = 1;

            foreach ($result as $row) {
                ?>
                <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $row['Id'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['comment'] ?></td>
                    <td><?= $row['id_movie'] ?></td>
                    <td>
                        <form method='post' action=''>
                            <div class="">
                            <input type='hidden' name='id' value='<?= $row['Id'] ?>'readonly >
                            <input type='text' name='username' value='<?= $row['username'] ?>' readonly class="admin_comment_form rounded ">
                            <input type='text' name='comment' value='<?= $row['comment'] ?>' readonly class="admin_comment_form rounded ms-3">
                            <input type='number' name='id_movie' value='<?= $row['id_movie'] ?>' readonly class="admin_comment_form rounded ms-3">
                                <input type='submit' name='delete' value='Delete' class='btn btn-danger confirm ms-3'>
                            </div>
                        </form>
                    </td>
                </tr>
                <?php
            }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
