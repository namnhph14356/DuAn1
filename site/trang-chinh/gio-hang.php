<?php
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}
if(isset($_GET['delid'])&&($_GET['delid']>=0)){
    array_splice($_SESSION['giohang'],$_GET['delid'],1);
 }
if (isset($_POST['addcart'])) {
    $ten_sp = $_POST['ten_sp'];
    $so_luong = $_POST['so_luong'];
    $gia = $_POST['gia'];
    $anh_sp = $_POST['anh_sp'];

    $fl = 0;
    for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
        if($_SESSION['giohang'][$i][1]==$ten_sp){
            $fl=1;
            $sl_new = $so_luong + $_SESSION['giohang'][$i][3];
            $_SESSION['giohang'][$i][3] = $sl_new;
        }
    }
    if($fl==0){
    $cart = [$anh_sp, $ten_sp, $gia, $so_luong];
    $_SESSION['giohang'][] = $cart;
    }
}

function showgh()
{
    if (isset($_SESSION['giohang'])) {
        $tong = 0;
        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
            $tt = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
            $tong += $tt;
            echo '<div class="container-fliud">
            <div class="wrapper row">
                <div class="cart-1">
                    <div class="pic-cart">
                        <img src="../../admin/assets/images/products/'.$_SESSION['giohang'][$i][0].'" width="80%" alt="">
                    </div>
                    <div class="text-cart">
                        <h3>'.$_SESSION['giohang'][$i][1].'</h3>
                        <h2>'.number_format($_SESSION['giohang'][$i][2],0,'',".").' VNĐ</h2>
                        
                    </div>
                    <div class="package">
                        <a href="index.php?gio-hang&&delid='.$i.'"><i class="far fa-trash-alt"></i></a>
                        <div class="input-group" style="width: 120px;" id="group">
                          
                            <p id="soluong">Số lượng:
                            '.$_SESSION['giohang'][$i][3].'</p>
                            
                        </div>
                        <div class="price">
                            <p>'.number_format($tt,0,'',".").' VNĐ </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <hr>';
        }
        
        echo ' 
        <div class="text">
            <span>Tổng tiền: <p>'.number_format($tong,0,'',".").' VNĐ</p></span>
        </div>';
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/giohang.css">
    <title>Document</title>
</head>

<body>
    <form action="index.php?confirm" method="post">
    <content>
    
    <div class="container" id="main">
        <div class="cart">
            <?php showgh(); ?>
            
                    <?php if(!isset($_SESSION['user'])){
                        echo '<h4 style="color:red; text-align:center;">Đăng nhập để đặt hàng</h4>';
                    }else{ 
                        ?>
                    <div class="btn-ht">
                        <a href="../trang-chinh/index.php?confirm"><button><p>Hoàn tất đặt hàng</p></button></a>
                    </div>
                    <?php } ?>
                <!-- </div> -->
            </div>
        </div>
    </div>
</content>
</form>
</body>

</html>