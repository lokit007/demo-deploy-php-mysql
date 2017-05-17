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
        <!-- Jquery -->
        <script src="http://code.jquery.com/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="container-fluid">
        <h1>Cập nhật user</h1>
        <a href="user-list.php" style="position: absolute; right: 20px; top: 30px; font-size: 1.5em;">
            <span class="glyphicon glyphicon-hand-right"></span> Trở về
        </a><br/>
        <form method="post" action="user-edit.php?id=<?php echo $data['id']; ?>" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">User name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['UserName']; ?>" placeholder="Nhập username ...">
                    <?php if (!empty($errors['name'])) echo $errors['name']; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="info" class="col-sm-2 control-label">Info User :</label>
                <div class="col-sm-10">
                    <textarea id="info" name="info" class="form-control" rows="5" placeholder="Giới thiệu về bạn ..."><?php echo !empty($data['InfoUser']) ? $data['InfoUser'] : ''; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="id" value="<?php echo $data['UserId']; ?>"/>
                    <button type="submit" name="edit_user" class="btn btn-default">
                        <span class="glyphicon glyphicon-ok"></span> Lưu
                    </button>
                </div>
            </div>
        </form>
        <img style="position: absolute; margin-left: 45%;" src="http://img.photobucket.com/albums/v209/DuaBeo35_HinhVuiCuoi/Album1/jm040000.gif" alt="Xem hinh thi click vao :V">
        </div>
    </body>
</html>