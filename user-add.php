<?php
    require './lib/user.php';
    // Nếu người dùng submit form
    if (!empty($_POST['add_user'])) {
        // Lay data
        $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
        
        // Validate thong tin
        $errors = array();
        if (empty($data['name'])){
            $errors['name'] = 'Chưa nhập dữ liệu cho trường này !!!';
        }
        
        // Neu ko co loi thi insert
        if (!$errors){
            add_user($data['name'], isset($_POST['info']) ? $_POST['info'] : '');
            // Trở về trang danh sách
            header("location: user-list.php");
        }
    }
    disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm user</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Thêm user </h1>
        <a href="user-list.php">Trở về</a> <br/> <br/>
        <form method="post" action="user-add.php">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>User</td>
                    <td>
                        <input type="text" name="name" value="<?php echo !empty($data['name']) ? $data['name'] : ''; ?>"/>
                        <?php if (!empty($errors['name'])) echo $errors['name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Info</td>
                    <td>
                        <textarea name="info" rows="5" style="width: 100%;" placeholder="Giới thiệu về bạn ..."><?php echo !empty($data['info']) ? $data['info'] : ''; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="add_user" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
