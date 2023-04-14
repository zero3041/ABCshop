<?php
    include("lib_db.php");
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
	if ($id<  1) return ;
    $sql = "SELECT * FROM trangchu where id=$id";

    $result = select_one($sql);
    // print_r($result).die("ok");
    $cm = "SELECT * FROM chuyenmuc WHERE id={$result["cid"]}";
    $cmo = select_one($cm);
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/chi-tiet.css">
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
                <a href="chuyen-muc.php?id=<?php echo $result['id'] ?>" class="breadcrumb-edit">
                  <span><?php echo $cmo['name'] ?></span>
                  <div class="right-arrow"></div>
                </a>
              </span>
            </li>
            <li class="nav-breadcrumb-item">
              <span class="nav-breadcrumb-item-text">
                <a href="#" class="breadcrumb-edit">
                  <span><?php echo $result['cardname'] ?></span>
                  <div class="right-arrow"></div>
                </a>
              </span>
            </li>
          </ul>
        </div>
      </div>
      <!-- container -->
      <div class="container">
        <div class="container-main">
          <div class="information">
            <div class="group-images">
              <div class="gallery">
                <div class="gallery-item">
                  <div class="gallery-item-preview">
                      <div class="gallery-item-content">
                          <div class="mySlides">
                              <img src="<?php echo $result["img"] ?>/1.webp">
                          </div>
                          
                          <div class="mySlides">
                              <img src="<?php echo $result["img"] ?>/2.webp">
                          </div>
                              
                          <div class="mySlides">
                              <img src="<?php echo $result["img"] ?>/3.webp">
                          </div>
                          
                          <div class="mySlides">
                              <img src="<?php echo $result["img"] ?>/4.webp">
                          </div>
                              
                          <div class="mySlides">
                              <img src="<?php echo $result["img"] ?>/5.webp">
                          </div>
                      </div>
                      <a class="prev" onclick="plusSlides(-1)">❮</a>
                      <a class="next" onclick="plusSlides(1)">❯</a>    
                  </div>
                      <div class="rows">                      
                          <div class="columns pre-edit">
                              <img class="demo cursor" src="<?php echo $result["img"] ?>/1.webp" onclick="currentSlide(1)" alt="">
                          </div>
                          <div class="columns pre-edit">
                              <img class="demo cursor" src="<?php echo $result["img"] ?>/2.webp" onclick="currentSlide(3)" alt="">
                          </div>
                          <div class="columns pre-edit">
                              <img class="demo cursor" src="<?php echo $result["img"] ?>/3.webp" onclick="currentSlide(4)" alt="">
                          </div>
                          <div class="columns pre-edit">
                              <img class="demo cursor" src="<?php echo $result["img"] ?>/4.webp" onclick="currentSlide(5)" alt="">
                          </div>    
                          <div class="columns pre-edit">
                              <img class="demo cursor" src="<?php echo $result["img"] ?>/5.webp" onclick="currentSlide(6)" alt="">
                          </div>
                      </div> 
                      <script src="js/chi-tiet.js" ></script> 
                </div>            
              </div>
            </div>
            <div class="information-main">
                <div class="information-main-detail">
                        <div class="product-tittle">
                            <div class="product-title-one">
                                <div class="product-tittle-wrapper">
                                    <h1 class="product-title-wrapper-badge"><?php echo $result["cardname"] ?></h1>
                                </div>
                            </div>
                        </div>
                        <div class="ratting-summary">
                            <div class="rating-question">
                                <div class="product-review-star">
                                    <div class="review-summary">
                                        <div class="review-summary-star">
                                            <img src="images/star.png" alt="" class="star">
                                            <img src="images/star.png" alt="" class="star">
                                            <img src="images/star.png" alt="" class="star">
                                            <img src="images/star.png" alt="" class="star">
                                            <img src="images/star.png" alt="" class="star">
                                        </div>
                                        <a href="#" class="review-summary-link">Không có đánh giá</a>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="ratting-share">
                                <div class="block-share">
                                    <div class="share-button">
                                        <span class="share-button-icon">
                                            <div class=""><i class="fas fa-share-alt fa-2x lzd-icon-share"></i></div>
                                        </span>
                                    </div>
                                </div>
                                <div class="block-wish">
                                    <div class="wish-button">
                                        <span class="wish-button-icon">
                                            <div><i class="far fa-heart fa-2x"></i></div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="product-brand">
                          <div class="product-brand-block">
                            <span class="product-brand-name">Thương hiệu:</span>
                            <a href="#" class="product-brand-link">OEM</a>
                            <div class="product-brand-deliver"></div>
                            <a href="#" class="product-brand-suggestion-link">Xem thêm phụ kiện máy tính OEM</a>
                          </div>
                        </div>
                        <div class="product-price">
                          <div class="product-price-set">
                            <span class="buy-price"><?php echo $result["cardprice"] ?></span>
                            <div class="discount-block">
                              <span class="price-sale"><?php echo $result["currentprice"] ?></span>
                              <span class="price-discount"><?php echo $result["currentsaleoff"] ?></span>
                            </div>
                          </div>
                        </div>
                        <div class="product-tag">
                          <div class="product-promotion">
                            <h6 class="promotion-title">Ưu đãi</h6>
                            <div class="promotion-content">
                              <div class="promotion-tag">
                                <div class="promotion-tag-item">
                                  <div class="tag-name">
                                    GIẢM 300K cho đơn từ  1 triệu với Thẻ tín dụng Lazada Citi Platinum
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-quantity">
                          <div class="quantity">
                            <h6 class="quantity-title">Số lượng</h6>
                            <div class="quantity-content">
                              <div class="quantity-number">
                                <div class="number-picker">
                                  <div class="buttons_added">
                                    <input class="minus is-form" type="button" value="-">
                                    <input aria-label="quantity" class="input-qty" max="10" min="1" name="" type="number" value="1">
                                    <input class="plus is-form" type="button" value="+">
                                  </div>
                                <script>
                                  $('input.input-qty').each(function() {
                                    var $this = $(this),
                                      qty = $this.parent().find('.is-form'),
                                      min = Number($this.attr('min')),
                                      max = Number($this.attr('max'))
                                    if (min == 0) {
                                      var d = 0
                                    } else d = min
                                    $(qty).on('click', function() {
                                      if ($(this).hasClass('minus')) {
                                        if (d > min) d += -1
                                      } else if ($(this).hasClass('plus')) {
                                        var x = Number($this.val()) + 1
                                        if (x <= max) d += 1
                                      }
                                      $this.attr('value', d).val(d)
                                    })
                                  })
                                </script>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="product-add">
                          <div class="add-to-card">
                            <button class="add-buy-now buy-now-yellow">
                              <span class="add-text">Mua ngay</span>
                              
                            </button>
                            
                            <script>
                              $(document).ready(function(){
                                  $('[name="btn_add_cart"]').click(function(){
                                    $.ajax({
                                      data:{
                                        id: $('[name="id_get"]').val(),
                                      },
                                      method: 'post',
                                      url: 'cart.php',
                                    }).done(function(res){
                                      alert('Đã thêm vào giỏ hàng');
                                    });
                                  })
                              });
                            </script>
                            <?php 
                              if(isset($_COOKIE['level']) ){
                                if ($_COOKIE['level'] == md5(0)){
                                  // echo md5(0);
                                  echo '<button name="btn_add_cart" class="add-buy-now buy-now-orange" >
                                            <span class="add-text">Thêm vào giỏ hàng</span>
                                        </button>';
                                }else{
                                  echo '<button class="add-buy-now buy-now-orange" >
                                          <span class="add-text">Thêm vào giỏ hàng</span>
                                      </button>';
                                }
                                
                              }else {
                                echo '<button class="add-buy-now buy-now-orange" >
                                          <span class="add-text">Thêm vào giỏ hàng</span>
                                      </button>';
                              }
                            ?>
                            <input type="hidden" name="id_get" value="<?php echo $id ?>">
                            <!-- <button name="btn_add_cart" class="add-buy-now buy-now-orange" >
                              <span class="add-text">Thêm vào giỏ hàng</span>
                            </button> -->
                          </div>
                        </div>
                  </div>
                <div class="information-main-seller">
                  <div class="seller-delivery">
                    <div class="delivery">
                      <div class="delivery-header">
                        <div class="delivery-header-title">Tùy chọn giao hàng</div>
                      </div>
                      <div class="delivery-header-two">
                        <div class="delivery-location">
                          <div class="location-body">
                            <img src="images/location.png" alt="icon-vitri">
                            <div class="location-address">Hồ Chí Minh, Quận 1, Phường Phạm Ngũ Lão</div>
                            <div class="location-change">
                              <a href="#" class="location-link">THAY ĐỔI</a>
                            </div>
                          </div>
                        </div>
                        <div class="delivery-options">
                          <div class="delivery-option">
                            <div class="delivery-option-body">
                              <img src="images/xuly.PNG" alt="">
                              <div class="delivery-option-item">
                                <div class="delivery-option-item-title">Xử lý đơn hàng bởi Lazada</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="delivery-content">
                        <div class="delivery-option">
                          <div class="delivery-option-body">
                            <img src="images/gh.PNG" alt="">
                            <div class="delivery-option-item">
                              <div class="delivery-option-item-title">GH tiêu chuẩn</div>
                              <div class="delivery-option-item-time">8 - 11 Ngày</div>
                            </div>
                            <div class="delivery-option-item-discount">11.000 đ</div>
                          </div>
                        </div>
                        <div class="delivery-option">
                          <div class="delivery-option-body">
                            <img src="images/ghht.PNG" alt="">
                            <div class="delivery-option-item">
                              <div class="delivery-option-item-title">Giao Hàng Hỏa Tốc</div>
                              <div class="delivery-option-item-time">Ngày Mai</div>
                            </div>
                            <div class="delivery-option-item-discount">25.000 đ</div>
                          </div>
                        </div>
                        <div class="delivery-option">
                          <div class="delivery-option-body">
                            <img src="images/ghht.PNG" alt="">
                            <div class="delivery-option-item">
                              <div class="delivery-option-item-title">Thanh toán khi nhận hàng. (Không được đồng kiểm)</div>
                            </div>
                          </div>
                        </div>       
                      </div>
                    </div>                 
                  </div>
                  <div class="warranty">
                    <div class="warranty-header">
                      <div class="warranty-header-title">Đổi trả bảo hành</div>
  
                    </div>
                    <div class="warranty-options">
                      <div class="warranty-options-item">
                        <div class="warranty-options-body">
                          <i class="warranty-options-item-icon">
                            <img src="images/check.png" alt="">
                          </i>
                          <div class="warranty-options-item-info">
                            <div class="warranty-options-item-title">100% Chính hãng</div>
                          </div>
                        </div>
                      </div>
                      <div class="warranty-options-item">
                        <div class="warranty-options-body">
                          <i class="warranty-options-item-icon">
                            <img src="images/check.png" alt="">
                          </i>
                          <div class="warranty-options-item-info">
                            <div class="warranty-options-item-title">15 ngày trả hàng</div>
                            <div class="warranty-options-item-subtitle">Được trả hàng với lý do "Không vừa ý" (Sản phẩm chưa qua sử dụng và còn nguyên tem mạc)</div>
                          </div>
                        </div>
                      </div>
                      <div class="warranty-options-item">
                        <div class="warranty-options-body">
                          <img src="images/baove.PNG" alt="">
                          <div class="warranty-options-item-info">
                            <div class="warranty-options-item-title">Bằng Hóa đơn mua hàng 12 months</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="applzd">
                    <div class="applzd-guide">
                      <div class="applzd-qrcode">
                        <img src="images/qrcode.PNG" alt="">
                      </div>
                      <div class="guide-app">
                        <img src="images/lzd.png" alt="">
                        <p>Tải ngay ứng dụng để được miễn phí vận chuyển!</p>
                      </div>
                    </div>
                    <p>
                      <i class="guide-app-mobile"></i>
                      Quét mã QR để tải app
                    </p>
                  </div>
                  <div class="seller-info">
                    <div class="seller-container">
                      <div class="seller-name">
                        <div class="seller-name-wrapper">
                          <div class="seller-name-title">Được bán bởi</div>
                          <div class="seller-name-detail">
                            <a href="#" class="seller-name-detail-name">Apple Flagship Store</a>
                            <a href="#">
                              <img src="images/lzdmail.png" class="seller-name-detail-img" alt="">
                            </a>
                          </div>
                        </div>
                        <div class="seller-ib-wrapper">
                          <span class="seller-ib-content">
                            <span class="seller-ib-icon">
                              <img src="images/ib.PNG" alt="">
                            </span>
                            <span>Chat</span>
                          </span>
                        </div>
                      </div>
                      <div class="seller-info-rate">
                        <div class="seller-info-content">
                          <div class="seller-info-title">Đánh giá tích cực</div>
                          <div class="seller-info-rating">93%</div>
                        </div>
                        <div class="seller-info-content">
                          <div class="seller-info-title">Giao đúng hạn</div>
                          <div class="seller-info-rating">100%</div>
                        </div>
                        <div class="seller-info-content">
                          <div class="seller-info-title">Tỷ lệ phản hồi</div>
                          <div class="seller-info-rating">100%</div>
                        </div>
                      </div>
                      <div class="seller-link">
                        <a href="#" class="link-seller">ĐẾN GIAN HÀNG</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
  
        </div>
        <!-- thông tin thêm -->
        <!-- <div class="add-information">
          <div class="description">
            <div class="product-detail">
              <div class="product-detail-wrapper">
                <h2 class="description-title">
                  Mô tả sản phẩm Củ Sạc Nhanh Apple PD 20W (Sạc Nhanh iPhone/Apple Watch) - Hàng Chính Hãng
                </h2>
                <div class="description-product-detail">
                  <div class="product-desc">
                    <div class="message-type">
                      <div class="message-img">
                        <img src="images/nof.PNG" alt="">
                      </div>
                      <div class="message-text">
                        <div class="message-item">Đây là sản phẩm được bán và xuất hóa đơn bởi Lazada.</div>
                      </div>
                    </div>
                    <div class="desc-content">
                      <ul>
                        <li>Cốc sạc nhanh Apple 20W Type-C Power Delivery 20W chính hãng được thiết kế siêu nhỏ gọn, tinh tế giúp bạn có thể mang đến bất cứ nơi đâu. Chất liệu cao cấp cùng màu trắng nổi bật mang đến sự sang trọng và độ bền bỉ cùng với thời gian.</li>
                        <li>Củ sạc còn có khả năng bảo vệ sản phẩm tránh quá dòng, quá điện áp hay hiện tượng mạch điện bị chập và quá nhiệt trong quá trình sạc. Sản phẩm được kiểm định khắt khe và được cấp chứng chỉ an toàn cháy nổ: ROSH, CE, FCC giúp đảm đảm an toàn cho người sử dụng.</li>
                        <li>Cốc sạc nhanh Apple 20W Type-C Power Delivery 20W chính hãng có công suất lên đến 20W. Công nghệ sạc nhanh Power Delivery (PD) này giúp người dùng có thể tiết kiệm được nhiều thời gian dành cho việc chờ đợi pin đầy.</li>
                        <li>Ngoài ra, sạc còn được trang bị cổng Type-C mang đến sự thuận tiện khi sử dụng. Công nghệ Power Delivery (PD) có thể sạc trên các thiết bị như iPhone 12, iPhone 12 Mini, iPhone 12 Pro, iPhone 12 Pro max hay các dòng điện thoại iPhone 11 Series, Apple Watch SE, Series 6, Series 5,...</li>
                        <li>BẢO HÀNH CHÍNH HÃNG 12 THÁNG BẰNG HÓA ĐƠN</li>
                        <li>Mã sản phẩm: MHJE3ZA/A</li>
                      </ul>
                    </div>
                  </div>
                  <div class="expand-button">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
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
                    <div class="footer-third-title-1">
                        <span >Lazada Southeast Asia</span>
                        <a class="footer-third-title-1-link laz-southeast-1" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-2" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-3" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-4" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-5" href="#"></a>
                        <a class="footer-third-title-1-link laz-southeast-6" href="#"></a>
                    </div>
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