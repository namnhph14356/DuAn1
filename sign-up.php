<?php
require 'global.php';
require 'dao/khach_hang.php';
$err=[
  'anh_dd'=>'',
  'username'=>'',
  'password'=>'',
  'ho_va_ten'=>'',
  'repass'=>''
];
    if(isset($_POST['btn_sign'])){
      $username =$_POST['username'];
      $password = $_POST['pass'];
      $repass = $_POST['repass'];
      $ho_va_ten = $_POST['hoten'];
      $email = $_POST['email'];

      $sdt = $_POST['sdt'];
      $anh_dd = $_FILES['anh_dd']['name'];
      $vai_tro = $_POST['vai_tro'];
      $up_file = "admin/assets/images/avatars/";
      $up = $up_file . basename($_FILES['anh_dd']['name']);
      $user = khach_hang_exist1($username);
      $pat = pathinfo($_FILES['anh_dd']['name'], PATHINFO_EXTENSION);
      $alow = array('jpg','png');
      if($_FILES['anh_dd']['name']>0){
          if(!in_array($pat, $alow)){
              $err['anh_dd'] ="Phải là file JPG hoặc PNG!";
          }elseif($_FILES['anh_dd']['size']>2000000){
              $err['anh_dd'] = "Ảnh ko quá 2MB!";
      }
  }

      if(empty($username)){
          $err['username'] = "Tên đăng nhập không được trống!";
      }
      if($user){
        $err['username'] = "Tên đăng nhập đã tồn tại!";
      }
      if(empty($password)){
          $err['password'] = "Password không được trống!";
      }
      if(strlen($password)<=5){
          $err['password'] = "Password phải hơn 5 ký tự!";
      }
      if($password!=$repass){
          $err['repass'] = "Xác nhận mật khẩu không đúng!";
      }
      if(empty($ho_va_ten)){
          $err['ho_va_ten'] = "Tên không được trống!";
      }
     

      if(!array_filter($err)){

      if($_FILES['anh_dd']['size']>0){
          move_uploaded_file($_FILES['anh_dd']['tmp_name'], $up);
      }
      khach_hang_insert($username, $password, $ho_va_ten, $email, $sdt, $anh_dd, $vai_tro);
      $MESSAGE = "Đăng ký thành công!";
      header('refresh:2; url=login.php');
      }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Đăng kí</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="./site/assets/css/login.css">
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="./site/assets/img/RC_Collection_1000x1000.png" width="20%" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="./site/assets/img/logo-black.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Đăng kí tài khoản của bạn</p>
              <form action="sign-up.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="email" class="sr-only">Tài khoản</label>
                  <input type="text" name="username" id="user" class="form-control" value="<?=isset($username)? $username:''?>" placeholder="Tài khoản">
                  <div><?php if(isset($err['username'])){
                                    echo "<p style='color:red; margin-top:5px; font-size:13px;'>$err[username]</p>";
                                } ?></div>
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Mật khẩu</label>
                  <input type="password" name="pass" id="password" class="form-control" value="<?=isset($password)? $password:''?>" placeholder="Mật khẩu">
                  <div><?php if(isset($err['password'])){
                                    echo "<p style='color:red; margin-top:5px; font-size:13px;'>$err[password]</p>";
                                } ?></div>
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Nhập lại Mật khẩu</label>
                  <input type="password" name="repass" id="re-password" class="form-control" value="<?=isset($repass)? $repass:''?>"
                    placeholder="Nhập lại mật khẩu">
                    <div><?php if(isset($err['repass'])){
                                    echo "<p style='color:red; margin-top:5px; font-size:13px;'>$err[repass]</p>";
                                } ?></div>
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Email</label>
                  <input type="email" name="email" id="email" class="form-control" value="<?=isset($email)? $email:''?>" placeholder="Địa chỉ Email">
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Phone</label>
                  <input type="text" name="sdt" id="phone" class="form-control" value="<?=isset($sdt)? $sdt:''?>" placeholder="Số điện thoại">
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Name</label>
                  <input type="text" name="hoten" id="password" class="form-control" value="<?=isset($ho_va_ten)? $ho_va_ten:''?>" placeholder="Họ và tên">
                  <input type="hidden" name="vai_tro" id="password" value="0" class="form-control" placeholder="Họ và tên">
                  <div><?php if(isset($err['ho_va_ten'])){
                                    echo "<p style='color:red; margin-top:5px; font-size:13px;'>$err[ho_va_ten]</p>";
                                } ?></div>
                </div>
                <div class="form-group mb-4">
                <input type="file" name="anh_dd" value="<?=isset($anh_dd)? $anh_dd:''?>">
                <div><?php if(isset($err['anh_dd'])){
                                    echo "<p style='color:red; margin-top:5px; font-size:13px;'>$err[anh_dd]</p>";
                                } ?></div>
                </div>
                <?php if(isset($MESSAGE)){
                  echo '<p style="color:red;">'.$MESSAGE.'</p>';
                } ?>
                <input name="btn_sign" id="sign" class="btn btn-block login-btn mb-4" type="submit" value="Đăng kí"
                  style="font-weight: 200;">

              </form>
              <p class="login-card-footer-text">Bạn đã có tài khoản? <a href="./login.php" class="text-reset">Trở về
                  đăng nhập ngay</a></p>
              <nav class="login-card-footer-nav">
                <a href="#!">Điều khoản sử dụng.</a>
                <a href="#!">Chính sách bảo mật</a>
              </nav>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>