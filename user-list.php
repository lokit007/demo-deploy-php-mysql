<?php
    require './lib/user.php';
    $users = get_all_users();
    disconnect_db();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách user</title>
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
        <h1>Danh sách user</h1>
        <a href="user-add.php" style="position: absolute; right: 20px; top: 30px; font-size: 1.5em;">
            <span class="glyphicon glyphicon-plus"></span> Thêm User mới
        </a><br/>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Info</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $item){ ?>
            <tr>
                <td><?php echo $item['UserId']; ?></td>
                <td><?php echo $item['UserName']; ?></td>
                <td><?php echo $item['InfoUser']; ?></td>
                <td>
                    <form method="post" action="user-delete.php">
                        <input onclick="window.location = 'user-edit.php?id=<?php echo $item['UserId']; ?>'" type="button" value="Sửa"/>
                        <input type="hidden" name="id" value="<?php echo $item['UserId']; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        <img style="position: absolute; width: 97%; height: 35%;" src="https://lh4.googleusercontent.com/-vNQWYEWK04M/UAz5Ubg87VI/AAAAAAAAHqI/PCTDKd3DefI/s1600/dophuquy.com_04.gif" alt="Xem hinh thi click vao :V">
        </div>
    </body>
</html>