<?php

function checkUserExist($userName, $email){
         // B1. Ket noi CSDL
         $conn = mysqli_connect('localhost','root','','btl');
         if(!$conn){
             die("Ko the ket noi");
         }
         // B2. Truy van
         $sql = "SELECT * FROM users WHERE username='$userName' OR user_email='$email'";
         $result = mysqli_query($conn,$sql); //Nó trả về SỐ BẢN GHI CHÈN THÀNH CÔNG 
 
         // B4. Dong ket noi
         mysqli_close($conn);
         // B3. Xu ly ket qua
         if(mysqli_num_rows($result) > 0){
             return true;
         }
 
         
         return false;
    }

    function addNewUser($fistName, $lastName, $userName, $email, $pass){
        // B1. Ket noi CSDL
        $conn = mysqli_connect('localhost','root','','btl');
        if(!$conn){
            die("Ko the ket noi");
        }
        // B2. Truy van
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (user_firstname, user_lastname, username, user_email, user_password)
        VALUES ('$fistName', '$lastName', '$userName', '$email', '$pass_hash')";
        $n = mysqli_query($conn,$sql); //Nó trả về SỐ BẢN GHI CHÈN THÀNH CÔNG 

        // B4. Dong ket noi
        mysqli_close($conn);
        // B3. Xu ly ket qua
        if($n > 0){
            return true;
        }
        return false;
  }
  function checkLogin($user, $pass){
    // B1. Ket noi CSDL
    $conn = mysqli_connect('localhost','root','','btl');
    if(!$conn){
        die("Ko the ket noi");
    }
    // B2. Truy van LẦN 1
    $sql = "SELECT * FROM users WHERE username='$user' OR user_email='$user'";
    $result = mysqli_query($conn,$sql); //Nó trả về SỐ BẢN GHI CHÈN THÀNH CÔNG 

    
    // B3. Xu ly ket qua
    if(mysqli_num_rows($result) > 0){
        // Lấy ra MẬT KHẨU của tài khoản đang tồn tại
        $row = mysqli_fetch_assoc($result);
        $pass_save = $row['user_password']; //Mật khẩu đang được lưu trong CSDL
    }

    // B4. Truy van SO KHỚP MẬT KHẨU
    if(password_verify($pass, $pass_save)){
        return true;
    }

    // B4. Dong ket noi
    mysqli_close($conn);
    return false;
}
?>