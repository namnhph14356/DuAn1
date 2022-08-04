<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/tintuc.css">
  
  <title>Document</title>
</head>
<style>
  .news{
    padding: 10px 20px;
  }
</style>
<body>
  
  <div class="container">
    <div class="title">
      <h2>TIN TỨC</h2>
    </div>
    <div id="content">
    <?php foreach($itemstt as $tt){
      extract($tt);
     ?>
    <div class="news">
        <a href="../tintuc/chitiet.php?id_tintuc=<?=$id_tintuc?>">
        <div class="news-ct">
          
            <div class="image">
              <img src="../../admin/assets/images/tintuc/<?=$anh_tt?>" width="80%" alt="">
            </div>
            <div class="text">          
                          <p id="title-news"><?=$tieu_de?></p>
                              <p id="mota"><?=$gioi_thieu?></p>
                          <p id="ngaydang"><?=$ngay_dang?></p>    
            </div>
        </div></a>
    
        <hr></div>
        <?php
      } ?></div>
       
    </div>
    
  </div>

</body>
</html>