<?php
    // session_start();
    include("lib_db.php");
	include("suanh.php");
  $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
	if ($id<  1) return ;

    $sql = "SELECT * FROM chuyenmuc ";
    $cates = select_list($sql);
    $sq= "SELECT * FROM trangchu WHERE id={$id}";
    $c = select_one($sq);
    // $last = end($c);
    // print_r($last).die('ok');
    // $dem = $last['id'] + 1;
    // print_r($dem).die('ok');
    if(isset($_COOKIE['username'])){
        if($_COOKIE['level']!=md5(1)){
            return header("location:index.php");
        }
        
    }else header("location:login.php");
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/form.css">
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

      <!-- container -->
        <div class="container"> 
            <div class="row">
                <div class="add-menu">
                    <h1 class="add-menu-title">THÊM SẢN PHẨM</h1>
                </div>
                <form class="form form-sets" action="edit_exec.php" method="post"  enctype="multipart/form-data">
                    <label class="form-label">Chọn chuyên mục</label>
                    <input name="id" type="hidden" value="<?php echo $c['id'] ?>">
                    <select class="form-select form-select-lg" name="cid">
                        <option value="">Chọn chuyên mục</option>
                    <?php foreach ($cates as $item) {?>
                    
                        <option value="<?php echo $item["id"]?>" <?php if ($item["id"] == $c["cid"]){?>selected<?php } ?>><?php echo $item["name"]?></option>
                    <?php } ?>
                    </select>
                        
                    <div class="clear-both"></div>
                    <label class="form-label">Chọn ảnh ( Lưu ý đổi tên thành 1,2,3 ....)</label>
                    <input class="form-control .form-control-lg" type="file" name="img" value="<?php echo $c['img'] ?>"/>
                    <div class="clear-both"></div>
                    <label class="form-label">Tiêu đề sản phẩm</label>
                    <textarea class="form-control .form-control-lg" name="cardname" value=""><?php echo $c['cardname'] ?></textarea>
                    <div class="clear-both"></div>
                    <label class="form-label">Giá bán</label>
                    <input class="form-control .form-control-lg" name="cardprice" value="<?php echo $c['cardprice'] ?>"/>
                    <div class="clear-both"></div>
                    <label class="form-label">Giá gốc</label
                    ><input class="form-control .form-control-lg" name="currentprice" value="<?php echo $c['currentprice'] ?>"/>
                    <div class="clear-both"></div>
                    <label class="form-label">Giảm giá</label>
                    <input class="form-control .form-control-lg" name="currentsaleoff" value="<?php echo $c['currentsaleoff'] ?>"></input>
                    
                    <div class="clear-both"></div>
                    <button class="btn btn-success btn-lg " >Sửa</button>
                    
                    <a href="./admin.php" class="btn btn-primary btn-lg xoa-cl">Quản lí</a>
                    <!-- <a class="btn btn btn-danger btn-lg quanli-cl">Xóa</a> -->
                    
                </form>
                

            </div>                    
        </div>


      <!-- footter -->
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
                    <!-- <div class="footer-third-title-1">
                        <span >Lazada Southeast Asia</span>
                        <a class="footer-third-title-1-link laz-southeast-1" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-2" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-3" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-4" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-5" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-6" href="#"></a>
                    </div> -->
                    <div class="footer-third-title-2">
                        <span >Kết nối với chúng tôi</span>
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