<?php
    require './lib/user.php';
    // Thực hiện xóa
    $id = isset($_POST['id']) ? (int)$_POST['id'] : '';
    if ($id){
        delete_user($id);
    }
    // Trở về trang danh sách
    header("location: user-list.php");
?>