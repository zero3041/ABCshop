<?php
    session_start();
    include("lib_db.php");
    $sql = "select * from trangchu limit 6";
    $resultOther = select_list($sql);
    //print_r($resultOther);exit(); 
    $sqll = "select * from chuyenmuc";
    $list = select_list($sqll);
    // print_r($list).exit();
    // foreach($list as $items){
    //   $danhmuc = "SELECT * FROM trangchu where cid={$item["id"]}";
    //   $items = select_one($danhmuc);
    //   // print_r($items).die("ok");
    // }
    
    // print_r($list["id"]).exit();
    // print_r($danhmuc).exit();
    
    // print_r($items).exit();
?>
<!DOCTYPE html>
<html lang="vi" >
<head>
    <meta charset="UTF-8">
    <title>Bài tập Lớn</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- <script src="https://kit.fontawesome.com/a76384134c.js" crossorigin="anonymous"></script>  -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" >
    <link rel="stylesheet" href="css/fontawesome-free-5.15.4-web/css/all.css">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap/js/bootstrap.js"></script>
</head>

<body>
    <div class="weblazada">
        <!-- Phan dau -->
        <div class="header">
            <div class="grid">
                <nav class="header_navbar navbar-expand-sm">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon">a</span>
                 </button>
                  <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="header_navbar-list navbar-nav">
                          <li class="header_navbar-item nav-item">
                            <a href="#" class="header_navbar-link header_navbar-link-active">
                              TIẾT KIỆM HƠN VỚI ỨNG DỤNG
                            </a>
                            <li class="header_navbar-item nav-item">
                              <a href="#" class="header_navbar-link header_navbar-link-active"
                              >
                                BÁN HÀNG CÙNG ABC
                              </a>
                            </li>
                            <li class="header_navbar-item nav-item">
                              <a href="#" class="header_navbar-link ">
                                CHĂM SÓC KHÁCH HÀNG
                              </a>
                            </li>
                            <li class="header_navbar-item nav-item">
                              <a href="#" class="header_navbar-link">
                                KIỂM TRA ĐƠN HÀNG
                              </a>
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
                            
                            <li class="header_navbar-item nav-item">
                              <a href="#" class="header_navbar-link">
                                CHANGE LANGUAGE
                              </a>
                            </li>
                        </li>
                    </ul>
                  </div>
                </nav>
                              
            </div>
             <div class="header-body ">
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
           </div>
        </div>
            
        <!-- Phan than -->
        <div class="container ">
            <div class="container_header-bgc">
                <div class="grid container_header">
                    <div class="container_header-menu">
                        <ul class="header-menu_list">
                        <!-- <li class="header-menu_item">
                            <a href="chuyen-muc.php?id=1" class="header-menu_link">Thời Trang Nữ</a>
                            <i class="fas fa-angle-right"></i>
                            <ul class="header-menu_list-two">
                              <li class="header-menu_item_two">
                                <a href="#">Thời Trang Nam</a>
                              </li>
                            </ul>
                        </li>
                        <li class="header-menu_item">
                            <a href="chuyen-muc.php?id=2" class="header-menu_link">Thời Trang Nam</a>
                            <i class="fas fa-angle-right"></i>
                        </li>
                        <li class="header-menu_item">
                            <a href="#" class="header-menu_link">Thời Trang Cho Bé</a>
                            <i class="fas fa-angle-right"></i>
                        </li>
                        <li class="header-menu_item">
                            <a href="#" class="header-menu_link">Phụ Kiện Xinh</a>
                            <i class="fas fa-angle-right"></i>
                        </li>
                        <li class="header-menu_item">
                            <a href="#" class="header-menu_link">Giày Dép</a>
                            <i class="fas fa-angle-right"></i>
                        </li>
                        <li class="header-menu_item">
                            <a href="#" class="header-menu_link">Hàng Quốc Tế</a>
                            <i class="fas fa-angle-right"></i>
                        </li>
                        <li class="header-menu_item">
                            <a href="#" class="header-menu_link"
                            >Hàng Đại Hạ Giá</a>
                            <i class="fas fa-angle-right"></i>
                        </li>
                        <li class="header-menu_item">
                            <a href="#" class="header-menu_link">Danh Mục Bán Chạy</a>
                            <i class="fas fa-angle-right"></i>
                        </li>
                        <li class="header-menu_item">
                            <a href="#" class="header-menu_link">Hàng Đặt Trước</a>
                            <i class="fas fa-angle-right"></i>
                        </li>
                        <li class="header-menu_item">
                            <a href="#" class="header-menu_link">Phụ Kiện Thời Trang</a>
                            <i class="fas fa-angle-right"></i>
                        </li>
                        <li class="header-menu_item">
                            <a href="#" class="header-menu_link">Đồ Ngủ</a>
                            <i class="fas fa-angle-right"></i>
                        </li>
                        <li class="header-menu_item">
                            <a href="#" class="header-menu_link">Quần Áo Thể Thao</a>
                            <i class="fas fa-angle-right"></i>
                        </li> -->

                        <?php
                          foreach($list as $items){
                            // print_r($list).die("ok");
                            $mid = $items;
                            // print_r($items).die("ok");
                            $danhmuc = "SELECT * FROM trangchu where cid={$items["id"]}";
                            // print_r($danhmuc);
                            $items = select_one($danhmuc);
                            // print_r($items).die("ok");
                        ?>
                          <li class="header-menu_item">
                            <a href="chuyen-muc.php?id=<?php echo $items['id'] ?>" class="header-menu_link">
                              <span><?php echo $mid["name"]?></span> 
                            </a>
                            <i class="fas fa-angle-right"></i>
                        </li>
                        <?php } ?>     
                          
                        </ul>
                    </div>
                    <div class="container_header-slide">
                      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner slider-height">
                          <div class="carousel-item active">
                            <img src="images/banner-sale.jpg" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="images/banner-sale-3.jpg" class="d-block w-100" alt="...">
                          </div>
                          <div class="carousel-item">
                            <img src="images/banner-sale-5.jpg" class="d-block w-100" alt="...">
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                    </div>
                </div>
            </div>
          <!-- Phan than chung -->
            <div class="grid container_content">
                <!-- lazmail ...... -->
                <div class="content_menu">
                    <ul class="content_menu-list">
                        <li class="content_menu-item">
                            <a href="#" class="content_menu-link" style="--text-color-hover:#ff426e">
                            <img src="images/lazzmail.png" alt="lazadamail">
                            <span>ShopMail</span>
                            </a>
                        </li>
                        <li class="content_menu-item">
                            <a href="#" class="content_menu-link" style="--text-color-hover:#ff426e">
                                <img src="images/mgg.png" alt="lazadamail">
                                <span>Mã Giảm Giá</span>
                            </a>
                        </li>
                        <li class="content_menu-item">
                            <a href="#" class="content_menu-link" style="--text-color-hover:#ff426e">
                                <img src="images/napthe-voucher.png" alt="lazadamail">
                                <span>Ví Của Bạn</span>
                            </a>
                        </li>
                        <li class="content_menu-item">
                            <a href="#" class="content_menu-link" style="--text-color-hover:#ff426e">
                                <img src="images/global.png" alt="lazadamail">
                                <span>ShopGlobal</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Phan Deal -->
                <section class="grid">
                    <div class="content_deal ">
                      <span class="content_deal-title">Deal Chớp Nhoáng</span>
                      <div class="content-header">
                        <div class="content-header_status">
                          <div class="status">Đang bán</div>
                          <div class="timesale">Kết thúc trong</div>
                          <a href="#" class="content-deal-button-all">
                            MUA SẮM TOÀN BỘ SẢN PHẨM
                          </a>
                        </div>
                      </div>
                      <div class="deal-content row ">
                      <!-- ap dung php -->

                        <?php foreach($resultOther as $item) {?>
                          <div class="col-lg-2 col-md-4 col-sm-6">
                          <div href="#" class="deal-content_card col">
                            <a href="chi-tiet.php?id=<?php echo($item["id"]) ?>"><img class="imgdeal" src="<?php echo $item["img"] ?>/1.webp" alt=""></a>
                            <div class="card-name">
                              <a href="chi-tiet.php?id=<?php echo($item["id"]) ?>" class="card-text" ><?php echo $item["cardname"] ?></a>
                            </div>
                            <div class="card-price"><?php echo $item["cardprice"] ?></div>
                            <div class="card-price-current">
                              <span class="current-price"><?php echo $item["currentprice"] ?></span>
                              <span class="current-safeoff"><?php echo $item["currentsaleoff"] ?></span>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                        

                       <!--  -->
                      </div>
                    </div>
                  </section>
                <!-- Phan tim kiem pho bien -->
                <div class="content_topsearch">
                    <div class="content_topsearch-title">Tìm kiếm phổ biến</div>
                    <div class="grid topsearch-content ">
                      <div class="topsearch-content_col">
                        <div class="topsearch-main_item ">
                          <div class="topsearch-main_item-img">
                            <img
                              src="images/maychoigame-topserach.webp"
                              alt=""
                            />
                          </div>
                          <div class="topsearch-main_item-desc">
                            <div class="desc_name">Quần Áo Cho Bé</div>
                            <div class="desc_quatity">165,521 Sản phẩm</div>
                          </div>
                        </div>
                      </div>
                      <div class="topsearch-content_col-list">
                        <div class="col-list_item">
                          <div class="col-list_img">
                            <img
                              src="images/iphone-topsearch1.webp"
                              alt=""
                            />
                          </div>
                          <div class="col-list_desc">
                            <div class="col-list_desc-name">Thời Trang Nữ</div>
                            <div class="col-list_desc-quantity">997,156 Sản phẩm</div>
                          </div>
                        </div>
                        <div class="col-list_item">
                          <div class="col-list_img">
                            <img
                              src="images/iphone-topsearch1.webp"
                              alt=""
                            />
                          </div>
                          <div class="col-list_desc">
                            <div class="col-list_desc-name">Thời Trang Nữ</div>
                            <div class="col-list_desc-quantity">997,156 Sản phẩm</div>
                          </div>
                        </div>
                        <div class="col-list_item">
                          <div class="col-list_img">
                            <img
                              src="images/iphone-topsearch1.webp"
                              alt=""
                            />
                          </div>
                          <div class="col-list_desc">
                            <div class="col-list_desc-name">Thời Trang Nữ</div>
                            <div class="col-list_desc-quantity">997,156 Sản phẩm</div>
                          </div>
                        </div>
                        <div class="col-list_item">
                          <div class="col-list_img">
                            <img
                              src="images/iphone-topsearch1.webp"
                              alt=""
                            />
                          </div>
                          <div class="col-list_desc">
                            <div class="col-list_desc-name">Thời Trang Nữ</div>
                            <div class="col-list_desc-quantity">997,156 Sản phẩm</div>
                          </div>
                        </div>
                        <div class="col-list_item">
                          <div class="col-list_img">
                            <img
                              src="images/iphone-topsearch.webp"
                              alt=""
                            />
                          </div>
                          <div class="col-list_desc">
                            <div class="col-list_desc-name">Thời Trang Nam</div>
                            <div class="col-list_desc-quantity">997,156 Sản phẩm</div>
                          </div>
                        </div>
                        <div class="col-list_item">
                          <div class="col-list_img">
                            <img
                              src="images/iphone-topsearch.webp"
                              alt=""
                            />
                          </div>
                          <div class="col-list_desc">
                            <div class="col-list_desc-name">Thời Trang Nam</div>
                            <div class="col-list_desc-quantity">997,156 Sản phẩm</div>
                          </div>
                        </div>
                        <div class="col-list_item">
                          <div class="col-list_img">
                            <img
                              src="images/iphone-topsearch.webp"
                              alt=""
                            />
                          </div>
                          <div class="col-list_desc">
                            <div class="col-list_desc-name">Thời Trang Nam</div>
                            <div class="col-list_desc-quantity">997,156 Sản phẩm</div>
                          </div>
                        </div>
                        <div class="col-list_item">
                          <div class="col-list_img">
                            <img
                              src="images/iphone-topsearch.webp"
                              alt=""
                            />
                          </div>
                          <div class="col-list_desc">
                            <div class="col-list_desc-name">Thời Trang Nam</div>
                            <div class="col-list_desc-quantity">997,156 Sản phẩm</div>
                          </div>
                        </div>
                        
                      </div>
                  </div>
                </div>
                <!-- bo suu tap -->
                <div class="collection">
                    <div class="collection-header">
                      <h3 class="collection-header-title">Bộ sưu tập</h3>
                      <a href="#" class="collection-header-link">
                        <span>Xem thêm</span> <i class="fas fa-angle-right fa-1x" ></i>
                      </a>
                    </div>
                    <div class="collection-list">
                      <div class="collection-items">
                        <a href="#" class="collection-items-list-link">
                          <div class="collection-items-title">Phụ Kiện 5 Sao ></div>
                          <div class="collection-items-subtitle">10,123 Sản phẩm</div>
                          <div class="collection-items-img-list">
                            <div class="collection-items-img-item">
                              <img src="images/sac-cl.jpg" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk-1.webp" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk2.webp" alt="" class="collection-items-img">
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="collection-items">
                        <a href="#" class="collection-items-list-link">
                          <div class="collection-items-title">Phụ Kiện 5 Sao ></div>
                          <div class="collection-items-subtitle">10,123 Sản phẩm</div>
                          <div class="collection-items-img-list">
                            <div class="collection-items-img-item">
                              <img src="images/sac-cl.jpg" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk-1.webp" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk2.webp" alt="" class="collection-items-img">
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="collection-items">
                        <a href="#" class="collection-items-list-link">
                          <div class="collection-items-title">Phụ Kiện 5 Sao ></div>
                          <div class="collection-items-subtitle">10,123 Sản phẩm</div>
                          <div class="collection-items-img-list">
                            <div class="collection-items-img-item">
                              <img src="images/sac-cl.jpg" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk-1.webp" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk2.webp" alt="" class="collection-items-img">
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="collection-items">
                        <a href="#" class="collection-items-list-link">
                          <div class="collection-items-title">Phụ Kiện 5 Sao ></div>
                          <div class="collection-items-subtitle">10,123 Sản phẩm</div>
                          <div class="collection-items-img-list">
                            <div class="collection-items-img-item">
                              <img src="images/sac-cl.jpg" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk-1.webp" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk2.webp" alt="" class="collection-items-img">
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="collection-items">
                        <a href="#" class="collection-items-list-link">
                          <div class="collection-items-title">Phụ Kiện 5 Sao ></div>
                          <div class="collection-items-subtitle">10,123 Sản phẩm</div>
                          <div class="collection-items-img-list">
                            <div class="collection-items-img-item">
                              <img src="images/sac-cl.jpg" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk-1.webp" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk2.webp" alt="" class="collection-items-img">
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="collection-items">
                        <a href="#" class="collection-items-list-link">
                          <div class="collection-items-title">Phụ Kiện 5 Sao ></div>
                          <div class="collection-items-subtitle">10,123 Sản phẩm</div>
                          <div class="collection-items-img-list">
                            <div class="collection-items-img-item">
                              <img src="images/sac-cl.jpg" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk-1.webp" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk2.webp" alt="" class="collection-items-img">
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="collection-items">
                        <a href="#" class="collection-items-list-link">
                          <div class="collection-items-title">Phụ Kiện 5 Sao ></div>
                          <div class="collection-items-subtitle">10,123 Sản phẩm</div>
                          <div class="collection-items-img-list">
                            <div class="collection-items-img-item">
                              <img src="images/sac-cl.jpg" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk-1.webp" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk2.webp" alt="" class="collection-items-img">
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="collection-items">
                        <a href="#" class="collection-items-list-link">
                          <div class="collection-items-title">Phụ Kiện 5 Sao ></div>
                          <div class="collection-items-subtitle">10,123 Sản phẩm</div>
                          <div class="collection-items-img-list">
                            <div class="collection-items-img-item">
                              <img src="images/sac-cl.jpg" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk-1.webp" alt="" class="collection-items-img">
                            </div>
                            <div class="collection-items-img-item">
                              <img src="images/pk2.webp" alt="" class="collection-items-img">
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                  <!-- danh muc  -->
                  <div class="categories">
                    <div class="categories-header">
                      <h3 class="categories-header-title">Danh mục ngành hàng</h3>
                    </div>
                    <div class="categories-content">
                      <div class="categories-detail-list">
                        <?php
                          foreach($list as $items){
                            // print_r($list).die("ok");
                            $mid = $items;
                            // print_r($items).die("ok");
                            $danhmuc = "SELECT * FROM trangchu where cid={$items["id"]}";
                            // print_r($danhmuc);
                            $items = select_one($danhmuc);
                            // print_r($items).die("ok");
                        ?>
                        <div class="categories-detail-item">
                          <a href="chuyen-muc.php?id=<?php echo $items['id'] ?>" class="categories-detail-item-content">
                            <div class="categories-detail-item-img">
                              <img src="<?php echo $items["img"] ?>/1.webp" alt="">
                            </div>
                            <div class="categories-detail-item-name">
                              <span class="item-name-text"><?php echo $mid["name"] ?></span>
                            </div>
                          </a>
                        </div>
                        <?php } ?>
                        <!-- ngan cach phan ko dung php -->
                        <div class="categories-detail-item">
                          <a href="#" class="categories-detail-item-content">
                            <div class="categories-detail-item-img">
                              <img src="images/dock.webp" alt="">
                            </div>
                            <div class="categories-detail-item-name">
                              <span class="item-name-text">Giày, Dép</span>
                            </div>
                          </a>
                        </div>
                        <div class="categories-detail-item">
                          <a href="#" class="categories-detail-item-content">
                            <div class="categories-detail-item-img">
                              <img src="images/dock.webp" alt="">
                            </div>
                            <div class="categories-detail-item-name">
                              <span class="item-name-text">Giày, Dép</span>
                            </div>
                          </a>
                        </div>
                        <div class="categories-detail-item">
                          <a href="#" class="categories-detail-item-content">
                            <div class="categories-detail-item-img">
                              <img src="images/dock.webp" alt="">
                            </div>
                            <div class="categories-detail-item-name">
                              <span class="item-name-text">Giày, Dép</span>
                            </div>
                          </a>
                        </div>
                        <div class="categories-detail-item edit-items">
                          <a href="#" class="categories-detail-item-content">
                            <div class="categories-detail-item-img">
                              <img src="images/dock.webp" alt="">
                            </div>
                            <div class="categories-detail-item-name">
                              <span class="item-name-text">Giày, Dép</span>
                            </div>
                          </a>
                        </div>
                        <div class="categories-detail-item">
                          <a href="#" class="categories-detail-item-content">
                            <div class="categories-detail-item-img">
                              <img src="images/dock.webp" alt="">
                            </div>
                            <div class="categories-detail-item-name">
                              <span class="item-name-text">Giày, Dép</span>
                            </div>
                          </a>
                        </div>
                        <div class="categories-detail-item">
                          <a href="#" class="categories-detail-item-content">
                            <div class="categories-detail-item-img">
                              <img src="images/dock.webp" alt="">
                            </div>
                            <div class="categories-detail-item-name">
                              <span class="item-name-text">Giày, Dép</span>
                            </div>
                          </a>
                        </div>
                        <div class="categories-detail-item">
                          <a href="#" class="categories-detail-item-content">
                            <div class="categories-detail-item-img">
                              <img src="images/dock.webp" alt="">
                            </div>
                            <div class="categories-detail-item-name">
                              <span class="item-name-text">Giày, Dép</span>
                            </div>
                          </a>
                        </div>
                        <div class="categories-detail-item">
                          <a href="#" class="categories-detail-item-content">
                            <div class="categories-detail-item-img">
                              <img src="images/dock.webp" alt="">
                            </div>
                            <div class="categories-detail-item-name">
                              <span class="item-name-text">Giày, Dép</span>
                            </div>
                          </a>
                        </div>
                        <div class="categories-detail-item">
                          <a href="#" class="categories-detail-item-content">
                            <div class="categories-detail-item-img">
                              <img src="images/dock.webp" alt="">
                            </div>
                            <div class="categories-detail-item-name">
                              <span class="item-name-text">Giày, Dép</span>
                            </div>
                          </a>
                        </div>
                        <div class="categories-detail-item">
                          <a href="#" class="categories-detail-item-content">
                            <div class="categories-detail-item-img">
                              <img src="images/dock.webp" alt="">
                            </div>
                            <div class="categories-detail-item-name">
                              <span class="item-name-text">Giày, Dép</span>
                            </div>
                          </a>
                        </div>
                        <div class="categories-detail-item">
                          <a href="#" class="categories-detail-item-content">
                            <div class="categories-detail-item-img">
                              <img src="images/dock.webp" alt="">
                            </div>
                            <div class="categories-detail-item-name">
                              <span class="item-name-text">Giày, Dép</span>
                            </div>
                          </a>
                        </div>
                        <div class="categories-detail-item edit-items">
                          <a href="#" class="categories-detail-item-content">
                            <div class="categories-detail-item-img">
                              <img src="images/dock.webp" alt="">
                            </div>
                            <div class="categories-detail-item-name">
                              <span class="item-name-text">Giày, Dép</span>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                
        </div>

        
        <!-- Phan cuoi -->
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
                            <span style="display: block;">Lazada Southeast Asia</span>
                            <a class="footer-third-title-1-link laz-southeast-1" href="#"></a>
                            <a class="footer-third-title-1-link laz-southeast-2" href="#"></a>
                            <a class="footer-third-title-1-link laz-southeast-3" href="#"></a>
                            <a class="footer-third-title-1-link laz-southeast-4" href="#"></a>
                            <a class="footer-third-title-1-link laz-southeast-5" href="#"></a>
                            <a class="footer-third-title-1-link laz-southeast-6" href="#"></a>
                        </div>
                        <div class="footer-third-title-2">
                            <span style="display: block;">Kết nối với chúng tôi</span>
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
    </div>
  </body>
</html>