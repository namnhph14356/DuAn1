<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/hosocanhan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
</head>
<style>
    .update button{
        background-color: #C50515;
        padding: 5px 20px;
        color:white;
        border:none;
        margin-top: 15px;
    }
    .chi-tiet input[type="text"]{
        margin-left: 0;
        background-color: #F7F6F4;
        border: 1px solid rgb(154, 154, 154);
    }
    input#btn{
        margin-top:10px;
    }
    .update label{
        margin: 10px 0;
    }
  #li{
    text-decoration:none;
  }
</style>

<body>
    <!-- phần chính -->
    <content>
        <!-- slide -->
        <!-- ------------------ -->
        <!-- layout các mục gồm sản phẩm -->
        <div class="container" id="main">
         
            <aside>
                <div class="mo-ta">
                    <div class="avt">
                        <img src="../../admin/assets/images/avatars/<?=$_SESSION['user']['anh_dd']?>" width="100%" alt="">
                    </div>
                    <div class="name">
                        <p><?=$_SESSION['user']['ho_va_ten']?></p>
                        <a href="../trang-chinh/index.php?capnhattk">Sửa hồ sơ</a>
                    </div>
                   
                </div> 
                <hr>
                <a href="../trang-chinh/index.php?quanlidonhang&id_khachhang=<?=$_SESSION['user']['id_khachhang']?>" id="xdh"><i class="far fa-file-alt"></i><span>Xem đơn hàng</span></a>
                <?php
                    if($_SESSION['user']['vai_tro'] == TRUE){
                        echo "<a href='../../admin/index.php'><span id='li'>Quản trị website</span></a>";
                    }
                ?>
                   <style>
                      #li a{
                           text-decoration: none;
                          font-size: 23px;
                          margin-left: 24px;
                       }
                       label, button{
                           color: black;
                       }
                       
                   </style>
            </aside>
            <main>
                <form action="../trang-chinh/index.php?capnhattk" enctype="multipart/form-data" method="post">
                <div class="chi-tiet">
                    <h3>Hồ sơ của tôi</h3>
                    <h4>Cập nhật thông tin hồ sơ để bảo mật tài khoản</h4>
                    <hr id="hr-ct">
                    <div class="ho-so-ca-nhan">
                        <div class="update">
                        <label>Họ tên</label><br>
                         <input type="hidden" name="id_khachhang" value="<?=$id_khachhang?>" id="">
                         <input type="hidden" name="username" value="<?=$username?>" id="">
                         <input type="hidden" name="password" value="<?=$password?>" id="">
                         <input type="hidden" name="vai_tro" value="<?=$vai_tro?>" id="">
                         <input type="text" name="ho_va_ten" value="<?=$ho_va_ten?>" id=""><br>
                         <label>Email</label><br>
                         <input type="text" name="email" value="<?=$email?>" id=""><br>
                         <label>SĐT</label> <br>
                         <input type="text" name="sdt" value="<?=$sdt?>" id=""><br>
                         
                         <button type="submit" name="edit">Cập nhật</button>
                        </div>
                        <div class="avt-ct">
                           
                            <img src="../../admin/assets/images/avatars/<?=$anh_dd?>" width="80%" alt="">
                            <input style="color: black;" type="file" name="anh_dd"  id="btn">
                        </div>
                    </div>
                </div>
                </form>
            </main>
        </div>



    </content>
</body>

</html>
