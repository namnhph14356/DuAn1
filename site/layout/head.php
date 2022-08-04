<div class="container">
      <div class="row align-items-start">
        <div class="col">
          <a href="../trang-chinh/index.php"><img src="../assets/img/logo-mb.png" width="70%" alt=""></a>
        </div>
        <div class="col">
          <form action="../hang-hoa/liet-ke.php">
          <div class="input-group rounded" id="input">

            <i class="fas fa-search" id="icon-search"></i>

            <input type="search" class="form-control rounded" id="search" name="keywords" placeholder="Tìm kiếm sản phẩm"
              aria-label="Search" aria-describedby="search-addon" />
            <!-- <input type="search" class="form-control rounded" id="search" name="id_danhmuc" placeholder="Tìm kiếm sản phẩm"
              aria-label="Search" aria-describedby="search-addon" /> -->

            </form>
          </div>
        </div>
       <?php if(isset($_SESSION['user'])){
          extract($_SESSION['user']);
         ?>
        <div class="col" id="col3">
          <a href="../trang-chinh/index.php?gio-hang" class="gh"><button id="btn-cart"><img src="../assets/img/trolley-cart 1.png" alt=""></button></a>
          <a href="../trang-chinh/index.php?hosocanhan">Xin chào <?=$ho_va_ten?></a>
          <a id="dn" href="../../login.php?btn_logoff">Đăng xuất</a>
        </div>
          <?php
          }else{ ?>
        <div class="col" id="col4">
          <a href="../trang-chinh/index.php?gio-hang" class="gh"><button id="btn-cart"><img src="../assets/img/trolley-cart 1.png" alt=""></button></a>
          <a href="../../sign-up.php">Đăng Kí</a>
          <a id="dn" href="../../login.php">Đăng nhập</a>
        </div>
        <?php } ?>
      </div>
    </div>
    <style>
      #search{
    background-color: #C50515;
    border: none;
    outline: none;
    color: white !important;
      }
      @media screen (min-width: 768px) {
        header{

        }
        #icon-search{
          font-size: 14px;
          margin-right: 8px;
        }
        #btn-cart{
          border-radius: 100px;
          border-color: #C50515;
          height: 20px;
          width: 20px;
          font-size: 8px;
          line-height: 30px;
          margin-right: 5px;
      }
      }
    </style>