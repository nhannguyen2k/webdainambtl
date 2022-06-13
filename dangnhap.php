<?php 
    include('include/header.php');
?>
<link rel="stylesheet" href="css/dangnhap.css">

<section id="register" class="container">
    <h2 class="text-center">Đăng nhập</h2>
    <?php
        
            if(isset($_POST['btndangnhap'])){
                // Biến kiểm soát lỗi
                $err = ''; //Ban đầu không có lỗi
                // Kiểm tra Người dùng đã nhập dữ liệu cho các phần tử:
                if(empty($_POST['txtUser'])){
                    $err .= "You must type Username or Email <br>";
                }

                if(empty($_POST['txtPass'])){
                    $err .= "You must type Password <br>";
                }
                // Giả sử đã kiểm tra những thằng còn lại

                if($err != ""){
                    echo "<p class='txt-decoration fst-italic text-danger'> {$err} </p>";
                }else{
                    // Thực hiện Xử lý lưu bản ghi
                    // 1. Lấy thông tin từ FORM
                  
                    $user   = $_POST['txtUser'];
                    $pass       = $_POST['txtPass'];

                    // 2. Ra lệnh kiểm tra
                    include("functions.php");
                    if(checkLogin($user,$pass)){
                        // Sử dụng SESSION
                        header("location:index.php");
                    }else{
                        header("location:dangnhap.php");
                    }
                }
            }

    ?>
    <form method="POST" action="dangnhap.php">
    <div class="mb-3">
        <input type="text" class="form-control" id="txtUser" name="txtUser" placeholder="Username or Email">
    </div>
    <div class="mb-3">
        <input type="password" class="form-control" id="txtPass" name="txtPass" placeholder="Password">
    </div>

    <button type="submit" class="btn btn-primary" name="btndangnhap">Đăng nhập</button>

    </form>
</section>

<?php 
    include('include/footer.php');
?>