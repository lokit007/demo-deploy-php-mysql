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
    </head>
    <body>
        <h1>Danh sách user</h1>
        <a href="user-add.php">Thêm User mới</a> <br/> <br/>
        <table width="100%" border="1" cellspacing="0" cellpadding="3">
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Info</td>
                <td></td>
            </tr>
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
        </table>
    </body>
</html>