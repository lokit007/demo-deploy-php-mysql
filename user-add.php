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
        <h1>Thêm user </h1>
        <a href="user-list.php" style="position: absolute; right: 20px; top: 30px; font-size: 1.5em;">
            <span class="glyphicon glyphicon-hand-right"></span> Trở về
        </a><hr>
        <form method="post" action="user-add.php" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">User name :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo !empty($data['name']) ? $data['name'] : ''; ?>" placeholder="Nhập username ...">
                    <?php if (!empty($errors['name'])) echo $errors['name']; ?>
                </div>
            </div>
            <div class="form-group">
                <label for="info" class="col-sm-2 control-label">Info User :</label>
                <div class="col-sm-10">
                    <textarea id="info" name="info" class="form-control" rows="5" placeholder="Giới thiệu về bạn ..."><?php echo !empty($data['info']) ? $data['info'] : ''; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="add_user" class="btn btn-default">
                        <span class="glyphicon glyphicon-ok"></span> Lưu
                    </button>
                </div>
            </div>
        </form>
     <img style="position: absolute; width: 97%; height: 35%;" src="https://lh3.googleusercontent.com/proxy/Gw8SPSpvrA-8Y0LNKHx93xNfhirA4j83vceUSio8zZNpLxgZ_bnSi9tgPBTKpq88L9cntlkQVdr9iWxppzRTF4fT3129KBnywt8eV5AApwBlCoMjhw=s0-d" alt="Xem hinh thi click vao :V">
    </div>
    </body>
</html>
