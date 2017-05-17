<?php
    // Biến kết nối toàn cục
    global $conn;
    
    // Hàm kết nối database
    function connect_db() {
        // Gọi tới biến toàn cục $conn
        global $conn;
        // Nếu chưa kết nối thì thực hiện kết nối
        if (!$conn){
            $conn = mysqli_connect('us-cdbr-iron-east-03.cleardb.net', 'bac65a4df0c518', '1a4e7f25', 'heroku_e28276a5872ba54') or die ('Can\'t not connect to database');
            // Thiết lập font chữ kết nối
            mysqli_set_charset($conn, 'utf8');
        }
    }
    
    // Hàm ngắt kết nối
    function disconnect_db() {
        // Gọi tới biến toàn cục $conn
        global $conn;
        // Nếu đã kêt nối thì thực hiện ngắt kết nối
        if ($conn){
            mysqli_close($conn);
        }
    }
    
    // Hàm lấy tất cả user
    function get_all_users() {
        // Gọi tới biến toàn cục $conn
        global $conn;
        // Hàm kết nối
        connect_db();
        // Câu truy vấn lấy tất cả sinh viên
        $sql = "select * from user";
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
        // Mảng chứa kết quả
        $result = array();
        // Lặp qua từng record và đưa vào biến kết quả
        if ($query){
            while ($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
        // Trả kết quả về
        return $result;
    }
    
    // Hàm lấy user theo ID
    function get_user($user_id) {
        // Gọi tới biến toàn cục $conn
        global $conn;
        // Hàm kết nối
        connect_db();
        // Câu truy vấn lấy tất cả sinh viên
        $sql = "select * from user where UserId = {$user_id}";
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
        // Mảng chứa kết quả
        $result = array();
        // Nếu có kết quả thì đưa vào biến $result
        if (mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $result = $row;
        }
        // Trả kết quả về
        return $result;
    }
    
    // Hàm thêm user
    function add_user($user_name, $user_info) {
        // Gọi tới biến toàn cục $conn
        global $conn;
        // Hàm kết nối
        connect_db();
        // Chống SQL Injection
        $user_name = addslashes($user_name);
        $user_info = addslashes($user_info);
        
        // Câu truy vấn thêm
        $sql = "
                INSERT INTO user(UserName, PassWord, InfoUser) VALUES
                ('$user_name','12345678','$user_info')
        ";
        
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
        return $query;
    }
    
    // Hàm sửa user
    function edit_user($user_id, $user_name, $user_info) {
        // Gọi tới biến toàn cục $conn
        global $conn;
        // Hàm kết nối
        connect_db();
        // Chống SQL Injection
        $user_name        = addslashes($user_name);
        $user_info   = addslashes($user_info);
        
        // Câu truy sửa
        $sql = "
                UPDATE user SET
                UserName = '$user_name',
                InfoUser = '$user_info'
                WHERE UserId = $user_id
        ";
        
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
        return $query;
    }
    
    // Hàm xóa sinh viên
    function delete_user($user_id) {
        // Gọi tới biến toàn cục $conn
        global $conn;
        // Hàm kết nối
        connect_db();
        // Câu truy sửa
        $sql = "
                DELETE FROM user
                WHERE UserId = $user_id
        ";
        
        // Thực hiện câu truy vấn
        $query = mysqli_query($conn, $sql);
        return $query;
    }
?>