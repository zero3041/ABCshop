<?php
    session_start() ;
    include("connect.php");
	include("lib_db.php");
    // include('check.php');
	$q = isset($_REQUEST["q"]) ? $_REQUEST["q"] : '';
	$qsessionname = "___Q___";
	//print_r($qsessionname).die("ok");
	if (!isset($_REQUEST["q"])){
		$q = isset($_SESSION[$qsessionname]) ? $_SESSION[$qsessionname] : '';
	}else{
		$_SESSION[$qsessionname] = $q;
	}
	$cond = "";
	$searchfields = array("","");
	if ($q){
		$sq = sql_str($q);
		$cond = "where ";
		$cond .= " cardname like '%{$sq}%' ";
		// $cond .= " or description like '%{$sq}%' ";
	}
	//print_r($_SESSION).die("ok");
	$sql = "select * from trangchu {$cond} order by id desc ";
	// echo $sql;exit();
	//thuc thi cau lenh sql
	$result = select_list($sql);
	// print_r($result);exit();
    //phan trang
    // $sql = "select * from trangchu";
    $tin = mysqli_query($conn,$sql);
    // print_r($tin).exit();

    $row_per_page= 5 ; //Số dòng trên 1 trang
	//tính số dòng cần hiển thị
	$rows=mysqli_num_rows($tin);
	//tính số trang cần để hiển thị
	if ($rows>$row_per_page) $page=ceil($rows/$row_per_page); 
	else $page=1; //nếu số dòng trong CSDL nhỏ hơn hoặc bằng số dòng trên 1 trang thì chỉ có 1 trang để hiển thị
	if(isset($_GET['start']) && (int)$_GET['start'])
		 $start=$_GET['start']; //dòng bắt đầu từ nơi ta muốn lấy
	else $start=0;

   
    // print_r($tim).exit();

	$sql="select * from trangchu {$cond} order by id asc limit $start,$row_per_page"; //bắt đầu lấy dữ liệu (^)_(^)
    // print_r($sql).exit();
    $sqll = select_list($sql);
    $result = select_list($sql);
    // print_r($sqll).exit();
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
        <link rel="stylesheet" href="css/admin.css">
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
                <h1 class="text-center">Menu ADMIN</h1> 
                <div class="col-xl-12 "> 
                    <div class="panel panel-default panel-table"> 
                        <div class="panel-heading"> 
                            <div class="row form-space"> 
                                <div class="col col-xl-2"> 
                                    <h3 class="panel-title">Danh sách mặt hàng</h3> 
                                </div> 
                                <div class="col col-xl-8">
                                    <form class="form-set" action="admin.php" method="GET">
                                        <input placeholder="Nhập tên sản phẩm cần tìm" class="form-control form-edit" name="q" value=""/>
                                        <button class="btn btn-outline-success button-edit btl-lg">Tìm kiếm</button>
                                    </form> 
                                </div>  
                                <div class="col col-xl-2 text-right"> 
                                    <a href="./add.php"><button type="button" class="btn btn-lg btn-primary btn-create button-right">Thêm mới</button> </a>
                                </div> 
                            </div> 
                        </div> 
                        <div class="panel-body">
                                                     
                            <table class="table table-striped table-bordered table-list"> 
                                <thead> 
                                    <tr> 
                                        <th><em class="fa fa-cog"></em>
                                        </th> 
                                        <th class="hidden-xs">ID</th> 
                                        <th>Cid</th> 
                                        <th>Ảnh</th> 
                                        <th>Tên sản phẩm</th> 
                                        <th>Giá</th> 
                                        <th>Giá gốc</th> 
                                        <th>Sale</th> 
                                    </tr> 
                                </thead> 
                                <tbody>
                                    <?php foreach ($result as $item) {?>
                                    <tr> 
                                        <td  align="center">
                                            <a href="./edit.php?id=<?php echo $item['id'] ?>" class="btn btn-primary">
                                                <em class="fas fa-pencil-alt"></em>
                                            </a> 
                                            <a href="./delete.php?id=<?php echo $item['id'] ?>" class="btn btn-danger">
                                                <em class="fa fa-trash"></em>
                                            </a>
                                        </td> 
                                        <td class="hidden-xs"><?php echo $item['id'] ?></td> 
                                        <td class="col-cid"><?php echo $item['cid'] ?></td> 
                                        <td class="col-img"><?php echo $item['img'] ?></td> 
                                        <td class="col-cardname"><?php echo $item['cardname'] ?></td> 
                                        <td class="col-price"><?php echo $item['cardprice'] ?></td> 
                                        <td class="col-price"><?php echo $item['currentprice'] ?></td> 
                                        <td class="col-sale"><?php echo $item['currentsaleoff'] ?></td> 
                                    </tr>
                                    <?php } ?>                                     
                                </tbody>
                            </table> 
                        </div> 
                        <div class="page-edit">
                            <?php
                            // bắt đầu phân trang
                            $page_cr=($start/$row_per_page)+1;
                            for($i=1;$i<=$page;$i++)
                            {
                                if ($page_cr!=$i) echo "<div class='phantrang'>"."<a href='admin.php?start=".$row_per_page*($i-1)."'>$i&nbsp;</a>"."</div>";
                                    else echo "<div class='phantrang'>".$i." "."</div>";
                            }
                            ?>
                        </div>
                        
                        
                        <!-- <div class="panel-footer"> 
                            <div class="row"> 
                                <div class="col col-xs-4">Trang 1 của 5 </div> 
                                <div class="col col-xs-8"> 
                                    <ul class="pagination hidden-xs pull-right"> 
                                        <li>
                                            <a href="#">1</a>
                                        </li> 
                                    </ul> 
                                    <ul class="pagination visible-xs pull-right"> 
                                        <li>
                                            <a href="#">«</a>
                                        </li> 
                                        <li>
                                            <a href="#">»</a>
                                        </li> 
                                    </ul> 
                                </div> 
                            </div> 
                        </div>  -->
                    </div> 
                </div> 
            </div>
        </div>


      <!-- footter -->
      <div class="footer">
        <div class="footer-first">
            <div class="grid">
                <!-- <div class="footer-card">
                    <div class="footer-card-list row">
                        <img
                            class="footer-card-img col-sm-7 col-lg-4"
                            src="images/img-ad-footer-1.png"
                            alt=""
                        />
                        <img
                            class="footer-card-img col-sm-7 col-lg-4"
                            src="images/img-ad-footer-2.png"
                            alt=""
                        />
                        <img
                            class="footer-card-img col-sm-7 col-lg-4"
                            src="images/img-ad-footer-3.png"
                            alt=""
                        />
                    </div>
                </div> -->
                <div class="footer-contact">
                    <div class="footer-contact_1">
                        <div class="footer-contact_1-1">
                            <span>LIÊN HỆ VỚI LAZADA</span>
                            <ul class="contact_1-1-list">
                            <li class="contact_1-1-item">
                                <a href="" class="contact_1-1-link">
                                Thứ 2 đến CN: 9h - 18h (Hotline), 7h - 22h (chat trực
                                tuyến)
                                </a>
                            </li>
                            <li class="contact_1-1-item">
                                <a href="" class="contact_1-1-link">
                                Trung tâm hỗ trợ
                                </a>
                            </li>
                            <li class="contact_1-1-item">
                                <a href="" class="contact_1-1-link">
                                Hướng dẫn đặt hàng
                                </a>
                            </li>
                            <li class="contact_1-1-item">
                                <a href="" class="contact_1-1-link">
                                Giao hàng & Nhận hàng
                                </a>
                            </li>
                            <li class="contact_1-1-item">
                                <a href="" class="contact_1-1-link">
                                Chính sách hàng nhập khẩu
                                </a>
                            </li>
                            <li class="contact_1-1-item">
                                <a href="" class="contact_1-1-link">
                                Hướng dẫn đổi trả hàng
                                </a>
                            </li>
                            </ul>
                        </div>
                        <div class="footer-contact_1-1">
                            <span>LAZADA VIỆT NAM</span>
                            <ul class="contact_1-1-list">
                                <li class="contact_1-1-item">
                                    <a href="" class="contact_1-1-link">
                                    Về Lazada Việt Nam
                                    </a>
                                </li>
                                <li class="contact_1-1-item">
                                    <a href="" class="contact_1-1-link">
                                    Bán hàng cùng Lazada
                                    </a>
                                </li>
                                <li class="contact_1-1-item">
                                    <a href="" class="contact_1-1-link">
                                    Chương trình Lazada Afﬁliate
                                    </a>
                                </li>
                                <li class="contact_1-1-item">
                                    <a href="" class="contact_1-1-link">
                                    Tuyển dụng
                                    </a>
                                </li>
                                <li class="contact_1-1-item">
                                    <a href="" class="contact_1-1-link">
                                    Điều khoản mua bán hàng hóa
                                    </a>
                                </li>
                                <li class="contact_1-1-item">
                                    <a href="" class="contact_1-1-link">
                                    Chính sách bảo mật
                                    </a>
                                </li>
                                <li class="contact_1-1-item">
                                    <a href="" class="contact_1-1-link">
                                    Báo chí
                                    </a>
                                </li>
                                <li class="contact_1-1-item">
                                    <a href="" class="contact_1-1-link">
                                    Bảo vệ quyền sở hữu trí tuệ
                                    </a>
                                </li>
                                <li class="contact_1-1-item">
                                    <a href="" class="contact_1-1-link">
                                    Quy chế hoạt động sàn Lazada
                                    </a>
                                </li>
                                <li class="contact_1-1-item">
                                    <a href="" class="contact_1-1-link">
                                    Điều Khoản Công Cụ Tương Tác
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-contact_2">
                        <div class="footer-contact_2-header">
                            <div class="footer-contact_2-info-img logo-small-footer"></div>
                            <div class="footer-contact_2-info-contact">
                            <span class="go-where" >Go where your heart beats</span
                            >
                            <span class="tai-app-lzd" >Tải App Lazada</span>
                            </div><img class="footer-contact_2-info-download"src="images/img-app-1.png"alt=""/>
                                  <img class="footer-contact_2-info-download" src="images/img-app-2.png" alt=""/>
                              </div>
                        <div class="footer-contact_2-info">
                            <div>CÔNG TY TNHH RECESS</div>
                            <div>
                            Giấy CNĐKDN: 0308808576 – Ngày cấp: 06/5/2009, được sửa đổi
                            lần thứ 19 ngày 15/8/2019.
                            </div>
                            <div>
                            Cơ quan cấp: Phòng Đăng ký kinh doanh – Sở kế hoạch và Đầu
                            tư TP.HCM
                            </div>
                            <div>
                            Địa chỉ đăng ký kinh doanh: Tầng 19, Tòa nhà Saigon Centre –
                            Tháp 2, 67 Lê Lợi, Phường Bến Nghé, Quận 1, Tp. Hồ Chí Minh,
                            Việt Nam.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                    <div class="footer-third-title-2 c-lazada">© Lazada 2020</div>
                </div>
            </div>
        </div>
    </div> 
    <!-- end web -->
  </div>
</body>