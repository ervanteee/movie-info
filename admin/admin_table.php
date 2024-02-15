<?php include('crud.php')?>
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
            <div>
            <?php include ('linking_table.php');?>    
 
            <button id="click_admin" class="btn btn-outline-success  m-3 adjust_exe"> + </button>
            <form method='post' action='' class="row col-2 ms-3 mb-3 hide">
                <input type='text' name='username' placeholder='Username' required class="mb-2">
                <input type='email' name='email' placeholder='Email' required class="mb-2">
                <input type='number' name='phone' placeholder='Phone' required class="mb-2">
                <input type='password' name='password' placeholder='Password' required  class="mb-2">
                <input type='submit' name='add' value='Add' class='btn btn-success mb-3 mt-3 confirm'>
            </form>

                <table class="table table-bordered table-hover">
                    <thead class="bg-secondary text-white text-center ">
                        <tr>
                            <th>NO</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
        <?php
            $sql = "SELECT * FROM admin";
            $result = $conn->query($sql);
            $no = 1;

            foreach ($result as $row) {
                ?>
                <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['password'] ?></td>
                    <td>
                        <form method='post' action=''>
                            <input type='hidden' name='id' value='<?= $row['id'] ?>' >
                            <input type='text' name='username' value='<?= $row['username'] ?>' >
                            <input type='email' name='email' value='<?= $row['email'] ?>'>
                            <input type='number' name='phone' value='<?= $row['phone'] ?>'>
                            <input type='text' name='password' value='<?= $row['password'] ?>'>
                            <input type='submit' name='update' value='Update' class='btn btn-primary confirm'>
                            <input type='submit' name='delete' value='Delete' class='btn btn-danger confirm'>
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
