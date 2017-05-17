<?php
require './lib/user.php';
// Lấy thông tin hiển thị lên để người dùng sửa
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id){
    $data = get_user($id);
}
// Nếu không có dữ liệu tức không tìm thấy sinh viên cần sửa
if (!$data){
   header("location: user-list.php");
}
// Nếu người dùng submit form
if (!empty($_POST['edit_user'])) {
    // Lay data
    $data['name']        = isset($_POST['name']) ? $_POST['name'] : '';
    $data['info']         = isset($_POST['info']) ? $_POST['info'] : '';
    $data['id']          = isset($_POST['id']) ? $_POST['id'] : '';
     
    // Validate thong tin
    $errors = array();
    if (empty($data['name'])){
        $errors['name'] = 'Chưa nhập dữ liệu cho trường này !!!';
    }
    
    // Neu ko co loi thi insert
    if (!$errors){
        edit_user($data['id'], $data['name'], $data['info']);
        // Trở về trang danh sách
        header("location: user-list.php");
    }
}
 
disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Cập nhật user</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Cập nhật user</h1>
        <a href="user-list.php">Trở về</a> <br/> <br/>
        <form method="post" action="user-edit.php?id=<?php echo $data['id']; ?>">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $data['UserName']; ?>"/>
                        <?php if (!empty($errors['name'])) echo $errors['name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Info</td>
                    <td>
                        <textarea name="info" rows="5" style="width: 100%;" placeholder="Giới thiệu về bạn ..."><?php echo !empty($data['InfoUser']) ? $data['InfoUser'] : ''; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $data['UserId']; ?>"/>
                        <input type="submit" name="edit_user" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>