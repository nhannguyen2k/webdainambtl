<?php 
    include('header.php');
?>

<link rel="stylesheet" href="css/dangky.css">

<section id="register" class="container">
    <h2 class="text-center">Đăng ký</h2>
    <?php
        
            if(isset($_POST['btnRegister'])){
                // Biến kiểm soát lỗi
                $err = ''; //Ban đầu không có lỗi
                // Kiểm tra Người dùng đã nhập dữ liệu cho các phần tử:
                if(empty($_POST['txtFirstName'])){
                    $err .= "First Name must not empty <br>";
                }

                if(empty($_POST['txtLastName'])){
                    $err .= "Last Name must not empty <br>";
                }

                if(empty($_POST['txtUser'])){
                    $err .= "Username must not empty <br>";
                }
                // Giả sử đã kiểm tra những thằng còn lại

                if($err != ""){
                    echo "<p class='txt-decoration fst-italic text-danger'> {$err} </p>";
                }else{
                    // Thực hiện Xử lý lưu bản ghi
                    // 1. Lấy thông tin từ FORM
                    $firstName  = $_POST['txtFirstName'];
                    $lastName   = $_POST['txtLastName'];
                    $userName   = $_POST['txtUser'];
                    $email      = $_POST['txtEmail'];
                    $pass       = $_POST['txtPass1'];

                    // 2. Ra lệnh kiểm tra
                    include("functions.php");
                    if(checkUserExist($userName, $email)){
                        $err .= "Username or Email existed";
                        echo "<p class='txt-decoration fst-italic text-danger'> {$err} </p>";
                    }else{
                        if(addNewUser($firstName, $lastName, $userName, $email, $pass)){
                            // Xử lý chức năng GỬI EMAIL
                            
                            $err .= "Bạn đã đăng kí thành công tài khoản. Chúng tôi sẽ gửi thông báo tới Email của Bạn";
                            echo "<p class='txt-decoration fst-italic text-danger'> {$err} </p>";
                        }
                    }
                }
            }

    ?>
    <form method="POST" action="dangky.php">
    <div class="mb-3">
        <input type="text" class="form-control" id="txtFirstName" name="txtFirstName" placeholder="First Name">
    </div>
    <div class="mb-3">
      <input type="text" class="form-control" id="txtLastName" name="txtLastName" placeholder="Last Name">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="txtUser" name="txtUser" placeholder="Username">
    </div>
    <div class="mb-3">
        <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email">
    </div>
    <div class="mb-3">
        <input type="password" class="form-control" id="txtPass1" name="txtPass1" placeholder="Password">
    </div>
    <div class="mb-3">
        <input type="password" class="form-control" id="txtPass2" name="txtPass2" placeholder="Retype Password">
    </div>

    <button type="submit" class="btn btn-primary" name="btnRegister">Đăng ký</button>
    <a class="btn btn-primary" href="dangnhap.php" role="button">Đăng nhập</a>
    </form>
</section>


<?php 
    include('footer.php');
?>