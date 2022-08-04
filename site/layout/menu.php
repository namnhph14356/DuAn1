<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
      
                  <a class="nav-link active" aria-current="page" href="<?=$SITE_URL?>/trang-chinh?trang-chu"><img src="../assets/svg/house 1.png" alt="">Trang
                    chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=$SITE_URL?>/trang-chinh?dt"><img src="../assets/svg/iphone 1.png" alt="">Điện thoại</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=$SITE_URL?>/trang-chinh?lt"><img src="../assets/svg/image 1.png" alt="">Laptop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=$SITE_URL?>/trang-chinh?pk"><img src="../assets/svg/image 2.png" alt="">Phụ kiện</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=$SITE_URL?>/trang-chinh?tt"><img src="../assets/svg/image 9.png" alt="">Tin tức</a>
                </li>
            	 <li class="nav-item" id="sh">
                  <a class="nav-link" href="../../site/trang-chinh/index.php?gio-hang"><img src="../assets/svg/trolley-cart 1.png" alt="">Giỏ hàng</a>
                </li>
              	  <?php if(isset($_SESSION['user'])){
         			 extract($_SESSION['user']);
        				 ?>
         
        		 <li class="nav-item" id="sh">
        		  <a  href="../../login.php?btn_logoff"><img src="../assets/svg/image 9.png" alt="">Đăng xuất</a>
          </li>
          <?php
          }else{ ?>
                <li class="nav-item" id="sh">
                  <a class="nav-link" href="../../login.php "><img src="../assets/svg/image 9.png" alt="">Đăng nhập</a>
                </li>
                <li class="nav-item" id="sh">
                  <a class="nav-link" href="../../sign-up.php"><img src="../assets/svg/image 9.png" alt="">Đăng ký</a>
                </li>
                <?php } ?>
                
              
      
              </ul>