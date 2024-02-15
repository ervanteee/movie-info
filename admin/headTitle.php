<?php

$page = $_SERVER['PHP_SELF'];

if ($page === '/MovieProject/admin/admin_table.php') {
    $title = 'USER';
} elseif ($page === '/MovieProject/admin/admin_comment.php') {
    $title = 'COMMENTS';
} else {
    $title = 'Default Title';
}
?>
