<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="content">
          <div class="title">
            <h3>TÌM KIẾM SẢN PHẨM</h3>
          </div>
          <div class="sp">
           
              <?php foreach($items as $item){
                extract($item);
              ?>
             
                <div class="sanpham">
                  <a href="../hang-hoa/chi-tiet.php?id_sanpham=<?=$id_sanpham?>"><img src="../../admin/assets/images/products/<?=$anh_sp?>" width="230px" height="228px" alt="">
                  <h4><?=$ten_sanpham?></h4>
                  <h5><?=number_format($gia, 0,'',",")?><u style="color: red;">đ</u></h5></a>
                  
                </div>
              
              <?php
            } ?>
              
          </div>
        </div>
      </div>
      <style>
          body{
              color: black;
          }
      </style>
</body>
</html>