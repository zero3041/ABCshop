<?php
    include("lib_db.php");
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
    // $p = isset($_REQUEST["p"]) ? $_REQUEST["p"] : 0;
	if ($id<  1) return ;
    // if ($p < 1 ) return ;
    $sql = "SELECT * FROM trangchu where id=$id";
    // print_r($sql).exit();
    $result = select_one($sql);
    // print_r($result).die("ok");
    $cm = "SELECT * FROM chuyenmuc WHERE id={$result["cid"]}";
    $cmo = select_one($cm);
    // print_r($cmo).die("");
    $sql = "SELECT * FROM trangchu where cid={$result['cid']}";
    // print_r($sql).exit();
    $list = select_list($sql);


?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/chuyen-muc.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" >
        <link rel="stylesheet" href="css/fontawesome-free-5.15.4-web/css/all.css">
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/bootstrap/js/bootstrap.js"></script>
        
    </head>

<body>
    <div class="weblazada">
      <div class="lzd-header">
        <div class="header">
          <nav class="navbar navbar-expand-lg header_navbar ">
              <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                  <ul class="navbar-nav header_navbar-list">
                    <li class="nav-item header_navbar-item">
                      <a class="header_navbar-link header_navbar-link-active" href="#">TIẾT KIỆM HƠN VỚI ỨNG DỤNG</a>
                    </li>
                    <li class="nav-item header_navbar-item">
                      <a class="header_navbar-link header_navbar-link-active" href="#">BÁN HÀNG CÙNG ABC</a>
                    </li>
                    <li class="nav-item header_navbar-item">
                      <a class="header_navbar-link" href="#">CHĂM SÓC KHÁCH HÀNG</a>
                    </li>
                    <li class="nav-item header_navbar-item">
                      <a class="header_navbar-link" href="#">KIỂM TRA ĐƠN HÀNG</a>
                    </li>
                    <?php
                            if(!isset($_COOKIE['username'])){
                            echo '<li class="header_navbar-item nav-item">
                              <a href="./login.php" class="header_navbar-link">
                                ĐĂNG NHẬP
                              </a>
                            </li>
                            <li class="header_navbar-item nav-item">
                              <a href="./register.php" class="header_navbar-link">
                                ĐĂNG KÝ
                              </a>';
                            }else
                            {
                              if($_COOKIE['level']==md5(1)){
                                echo '<li class="header_navbar-item nav-item">
                                  <a href="./admin.php" class="header_navbar-link">
                                    ADMIN
                                  </a>
                                </li>
                                <li class="header_navbar-item nav-item">
                                  <a href="./logout.php" class="header_navbar-link">
                                    ĐĂNG XUẤT
                                  </a></li>';
                              }
                              if($_COOKIE['level']!=md5(1)){
                                echo '<li class="header_navbar-item nav-item">
                                  <a href="#" class="header_navbar-link">';
                                   echo $_COOKIE['username'];
                                 echo '</a>
                                </li>
                                <li class="header_navbar-item nav-item">
                                  <a href="./logout.php" class="header_navbar-link">
                                    ĐĂNG XUẤT
                                  </a></li>';
                              }
                            }

                              ?>
                    <li class="nav-item header_navbar-item dropdown">
                      <a class="header_navbar-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        CHANGE LANGUAGE
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">VIETNAM</a></li>
                        <li><a class="dropdown-item" href="#">ENGLISH</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            <div class="header_search">
                   <div class="header_search-logo">
                       <a style="text-decoration:none; color:black; font-size:10px;" href="./index.php"><img style="width: 50px;height: 50px;" class="header_search-logo-img" src="images/logo.png" alt="logo"/>ABC SHOP</a>
                     </div>
                   <div class="header_search-action">
                       <input class="search-action_input" placeholder="Tìm kiếm trên Shop" type="text"/>
                       <div class="search-action_icon">
                           <i class="fas fa-search"></i>
                       </div>
                   
                         <i class="header_search-cart fas fa-shopping-cart"></i>
                         <a href="" class="header_search-advertisenment"><img src="images/logo-momo-sale.jpg" alt="Advertisenment"/></a>
                     </div>
              </div>
          <div class="menu-site-lzd">
              <div class="menu-site-container container-fluid">
                  <div class="menu-site-category ">
                      <a href="" class="menu-site-category-text">
                          <span class="category-text">
                              Danh mục
                          </span>
                      </a>
                      <i class="fas fa-angle-down fa-2x" aria-hidden="true"></i>
                      <div class="dropdown_menu">
                          <a href="" class=""><span>Thời Trang Nữ</span></a>
                          <a href="" class=""><span>Thời Trang Nam</span></a>
                          <a href="" class=""><span>Thời Trang Cho Bé</span></a>
                          <a href="" class=""><span>Phụ Kiện Xinh</span></a>
                          <a href="" class=""><span>Giày Dép</span></a>
                          <a href="" class=""><span>Hàng Quốc Tế</span></a>
                          <a href="" class=""><span>Hàng Đại Hạ Giá</span></a>
                          <a href="" class=""><span>Danh Mục Bán Chạy</span></a>
                          <a href="" class=""><span>Hàng Đặt Trước</span></a>
                          <a href="" class=""><span>Phụ Kiện Thời Trang</span></a>
                          <a href="" class=""><span>Đồ Ngủ</span></a>
                          <a href="" class=""><span>Quần Áo Thể Thao</span></a>
                      </div>
                  </div>
                  <nav class="menu-site-labels">
                    <a href="#" class="menu-site-labels-items">
                      <span class="menu-site-labels-items-icon">
                        <img class="menu-site-labels-items-icon-img" src="images/lazzmail.png" alt="">
                      </span>
                      <span class="menu-site-labels-text">ShopMall</span>
                    </a>
                    <a href="#" class="menu-site-labels-items">
                      <span class="menu-site-labels-items-icon">
                        <img class="menu-site-labels-items-icon-img" src="images/mgg.png" alt="">
                      </span>
                      <span class="menu-site-labels-text">Mã giảm giá</span>
                    </a>
                    <a href="#" class="menu-site-labels-items">
                      <span class="menu-site-labels-items-icon">
                        <img class="menu-site-labels-items-icon-img" src="images/napthe-voucher.png" alt="">
                      </span>
                      <span class="menu-site-labels-text">Ví Của Bạn</span>
                    </a>
                    <a href="#" class="menu-site-labels-items">
                      <span class="menu-site-labels-items-icon">
                        <img class="menu-site-labels-items-icon-img" src="images/global.png" alt="">
                      </span>
                      <span class="menu-site-labels-text">ShopGlobal</span>
                    </a>
                  </nav>
              </div>  
            </div>           
        </div> 
      </div>
      <!--laz nav  -->
      <div class="container-fluid">
        <div class="laz_nav-breadcrumb ">
          <ul class="nav-breadcrumb-list">
            <li class="nav-breadcrumb-item">
              <span class="nav-breadcrumb-item-text">
                <a href="#" class="breadcrumb-edit">
                  <span><?php echo $cmo['name'] ?></span>
                  <div class="right-arrow"></div>
                </a>
              </span>
            </li>
          </ul>
        </div>
      </div>


      <!-- container -->
      <div class="container">
        <div class="card">
            <div class="card-main">
                <a href="#" class="card-detail-first">
                    <img src="<?php echo $cmo['img'] ?>/cm1.webp" alt="" class="card-main-img">
                </a>
                <a href="#" class="card-detail">
                    <img src="<?php echo $cmo['img'] ?>/cm2.webp" alt="" class="card-main-img">
                </a>
                <a href="#" class="card-detail">
                    <img src="<?php echo $cmo['img'] ?>/cm3.webp" alt="" class="card-main-img">
                </a>
                <a href="#" class="card-detail">
                    <img src="<?php echo $cmo['img'] ?>/cm4.webp" alt="" class="card-main-img">
                </a>
                <a href="#" class="card-detail">
                    <img src="<?php echo $cmo['img'] ?>/cm5.webp" alt="" class="card-main-img">
                </a>
                <a href="#" class="card-detail">
                    <img src="<?php echo $cmo['img'] ?>/cm6.webp" alt="" class="card-main-img">
                </a>
                <a href="#" class="card-detail">
                    <img src="<?php echo $cmo['img'] ?>/cm7.webp" alt="" class="card-main-img">
                </a>
            </div>
        </div>
        <div class="content">
            <div class="content-detail">
                <div class="content-detail-row">
                    <div class="content-detail-col-first">
                        <div class="content-header">
                            <h1 class="content-header-title"><?php echo $cmo['name'] ?></h1>
                            <div class="content-header-nav">
                                <div class="content-header-nav-search">
                                    <span>92696 sản phẩm tìm thấy trong </span>
                                    <span><?php echo $cmo['name'] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="content-product">
                            <?php foreach($list as $item) {?>
                            <div class="content-product-item">
                                <div class="content-product-item-detail">
                                    <div class="product-item">
                                        <div class="product-item-card">
                                            <div class="product-item-card-img">
                                                <a href="chi-tiet.php?id=<?php echo $item['id'] ?>">
                                                    <img src="<?php echo($item["img"]) ?>/1.webp" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-item-desc">
                                            <div class="product-item-title">
                                                <a href="#"><?php echo $item["cardname"] ?></a>
                                            </div>
                                            <div class="product-item-discount">
                                                <span><?php echo $item["cardprice"] ?></span>
                                            </div>
                                            <div class="product-item-sale">
                                                <span class="product-item-sale-del">
                                                    <span class="product-item-sale-discount"><?php echo $item["currentprice"] ?></span>
                                                </span>
                                                <span class="product-item-sale-off"><?php echo $item["currentsaleoff"] ?></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- ---------------- -->
                        </div>
                    </div>
                    <div class="content-detail-col-last">
                        <div class="content-category">
                            <div class="content-category-header">
                                <div class="content-category-header-title">Danh mục liên quan</div>
                                <div class="content-category-header-link">
                                    <a href="#"><?php echo $cmo['name'] ?></a>
                                </div>
                            </div>
                            <div class="content-main">
                                <div class="content-main-brand">Thương hiệu</div>
                                <div class="content-main-detail">
                                    <div class="content-main-detail-brand-list">
                                        <a href="#" class="content-main-detail-brand-item">
                                            <label for="" class="checkbox-brand">
                                                <input type="checkbox" value="OEM">
                                                <span class="checkbox-brand-inner"></span>
                                                <span class="checkbox-brand-name">Gucci</span>
                                            </label>
                                        </a>
                                        <a href="#" class="content-main-detail-brand-item">
                                            <label for="" class="checkbox-brand">
                                                <input type="checkbox" value="OEM">
                                                <span class="checkbox-brand-inner"></span>
                                                <span class="checkbox-brand-name">Hades</span>
                                            </label>
                                        </a>
                                        <a href="#" class="content-main-detail-brand-item">
                                            <label for="" class="checkbox-brand">
                                                <input type="checkbox" value="OEM">
                                                <span class="checkbox-brand-inner"></span>
                                                <span class="checkbox-brand-name">Zune</span>
                                            </label>
                                        </a>
                                        <a href="#" class="content-main-detail-brand-item">
                                            <label for="" class="checkbox-brand">
                                                <input type="checkbox" value="OEM">
                                                <span class="checkbox-brand-inner"></span>
                                                <span class="checkbox-brand-name">Yody</span>
                                            </label>
                                        </a>
                                        <a href="#" class="content-main-detail-brand-item">
                                            <label for="" class="checkbox-brand">
                                                <input type="checkbox" value="OEM">
                                                <span class="checkbox-brand-inner"></span>
                                                <span class="checkbox-brand-name">Adidas</span>
                                            </label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="content-main">
                                <div class="content-main-brand">Dịch Vụ</div>
                                <div class="content-main-detail">
                                    <div class="content-main-detail-brand-list">
                                        <a href="#" class="content-main-detail-brand-item">
                                            <label for="" class="checkbox-brand">
                                                <input type="checkbox" value="OEM">
                                                <span class="checkbox-brand-inner"></span>
                                                <span class="checkbox-brand-name">Giao hàng miễn phí</span>
                                            </label>
                                        </a>
                                        <a href="#" class="content-main-detail-brand-item">
                                            <label for="" class="checkbox-brand">
                                                <input type="checkbox" value="OEM">
                                                <span class="checkbox-brand-inner"></span>
                                                <span class="checkbox-brand-name">ShopMail</span>
                                            </label>
                                        </a>
                                        <a href="#" class="content-main-detail-brand-item">
                                            <label for="" class="checkbox-brand">
                                                <input type="checkbox" value="OEM">
                                                <span class="checkbox-brand-inner"></span>
                                                <span class="checkbox-brand-name">ShopQuốcTế</span>
                                            </label>
                                        </a>
                                        <a href="#" class="content-main-detail-brand-item">
                                            <label for="" class="checkbox-brand">
                                                <input type="checkbox" value="OEM">
                                                <span class="checkbox-brand-inner"></span>
                                                <span class="checkbox-brand-name">Thanh toán khi nhận hàng</span>
                                            </label>
                                        </a>
                                        <a href="#" class="content-main-detail-brand-item">
                                            <label for="" class="checkbox-brand">
                                                <input type="checkbox" value="OEM">
                                                <span class="checkbox-brand-inner"></span>
                                                <span class="checkbox-brand-name">Xử lí đơn hàng bởi Shop</span>
                                            </label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="content-main">
                                <div class="content-main-brand">Địa điểm</div>
                                <div class="content-main-detail">
                                    <div class="content-main-detail-brand-list">
                                        <a href="#" class="content-main-detail-brand-item">
                                            <label for="" class="checkbox-brand">
                                                <input type="checkbox" value="OEM">
                                                <span class="checkbox-brand-inner"></span>
                                                <span class="checkbox-brand-name">Nội địa</span>
                                            </label>
                                        </a>
                                        <a href="#" class="content-main-detail-brand-item">
                                            <label for="" class="checkbox-brand">
                                                <input type="checkbox" value="OEM">
                                                <span class="checkbox-brand-inner"></span>
                                                <span class="checkbox-brand-name">Nước ngoài</span>
                                            </label>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>



      <!-- footer -->
      <div class="footer">
        <div class="footer-first">
            
        </div>
        <div class="footer-second">
            <div class="grid footer-second-content">
                <div class="footer-second-1">
                    <div class="footer-second-1-title">CÁCH THỨC THANH TOÁN</div>
                    <div class="footer-second-1-icon payment-visa"></div>
                    <div class="footer-second-1-icon payment-mastercard"></div>
                    <div class="footer-second-1-icon payment-jcb" ></div>
                    <div class="footer-second-1-icon payment-cash-on"></div>
                    <div class="footer-second-1-icon payment-napas" ></div>
                    <div class="footer-second-1-icon payment-logo"></div>
                    <div class="footer-second-1-icon payment-zalo"></div>
                    <div class="footer-second-1-icon payment-momo"></div>
                </div>
                <div class="footer-second-2">
                    <div class="footer-second-2-1">
                    <div class="footer-second-2-1-title">DỊCH VỤ GIAO HÀNG</div>
                    <div class="footer-second-2-1-list">
                        <span class="footer-second-2-1-item"></span>
                        <span class="footer-second-2-1-item"></span>
                        <span class="footer-second-2-1-item"></span>
                        <span class="footer-second-2-1-item"></span>
                        <img class="footer-second-2-1-img" src="images/best-express.png" alt="" >
                        <img class="footer-second-2-1-img" src="images/ahamove.png" alt="">
                    </div>
                    </div>
                    <div class="footer-second-2-1">
                        <div class="footer-second-2-1-title">CHỨNG NHẬN</div>
                        <div class="footer-second-2-1-1-a">
                            <img class="footer-second-2-1-1-img logo-pci" src="images/pcidss.png" alt="">
                            <img class="footer-second-2-1-1-img logo-fake" src="images/noikhonghanggia.png" alt="">
                            <img class="footer-second-2-1-1-img logo-iso" src="images/iso.png" alt="">
                        </div>
                        <div class="footer-second-2-1-1-b">
                            <img class="footer-second-2-1-1-img" src="images/dangky-bocongthuong.png" alt="">
                            <img class="footer-second-2-1-1-img" src="images/dathongbao-bocongthuong.png" alt="">
                            <img class="footer-second-2-1-1-img" src="images/dangky-bocongthuong.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-third">
            <div class="grid">
                <div class="footer-third-title">
                    <div class="footer-third-title-1">
                        <span>Lazada Southeast Asia</span>
                        <a class="footer-third-title-1-link laz-southeast-1" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-2" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-3" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-4" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-5" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-6" href="#"></a>
                    </div>
                    <div class="footer-third-title-2">
                        <span>Kết nối với chúng tôi</span>
                        <a class="footer-third-title-1-link connection-1" href="#"></a>
                        <a class="footer-third-title-1-link connection-2" href="#"></a>
                        <a class="footer-third-title-1-link connection-3" href="#"></a>
                        <a class="footer-third-title-1-link connection-4" href="#"></a>
                        <a class="footer-third-title-1-link connection-5" href="#"></a>
                        <a class="footer-third-title-1-link connection-6" href="#"></a>
                    </div>
                    <div class="footer-third-title-2 c-lazada">© Shop ABC</div>
                </div>
            </div>
        </div>
    </div> 
    <!-- end web -->
  </div>
</body>