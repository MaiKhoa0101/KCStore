<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>
    Trang thanh toán
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/gio_hang.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  
</head>
<body>
    <?php 
      session_start();
      if (isset($_SESSION['account'])) {
        $let_Account = $_SESSION['account'];
      } else {
        $let_Account = null; // Hoặc giá trị mặc định nếu không đăng nhập
      }
      if (isset($_SESSION['name'])) {
        $let_Name = $_SESSION['name'];
        $let_TK = $_SESSION['tendangnhap'];
      } else {
        $let_Name = null; // Hoặc giá trị mặc định nếu không đăng nhập
      }
      if (isset( $_SESSION['diachi'])) {
        $let_DiaChi =  $_SESSION['diachi'];
      } else {
        $let_DiaChi = null; // Hoặc giá trị mặc định nếu không đăng nhập
      }
      if (isset($_SESSION['sdt'])) {
       $let_SDT = $_SESSION['sdt'];
      } else {
       $let_SDT = null; // Hoặc giá trị mặc định nếu không đăng nhập
      }
    ?>
    <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.php">
          <span>
            <img src="https://img.upanh.tv/2023/07/12/Suit_able_auto_x2.jpg" alt="Suit_able_auto_x2.jpg" border="0">
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse innerpage_navbar" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="nhan.php">
                Nhẫn
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="daychuyen.php">
                Dây chuyền
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bongtai.php">
                Bông tai
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vonglac.php">
                Vòng & Lắc
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bosuutap.php">
                bộ sưu tập
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lienhe.php">liên hệ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">chăm sóc khách hàng</a>
              <ul class="sub-menu1">
                <li><a class="nav-link" href="doitra.php">Chính sách đổi trả</a></li>
                <li><a class="nav-link" href="baohanh.php">Chính sách bảo hành</a></li>
                <li><a class="nav-link" href="thanhvien.php">Chính sách thành viên</a></li>
                <li><a class="nav-link" href="vanchuyen.php">Chính sách vận chuyển</a></li>
                <li><a class="nav-link" href="muahang.php">Hướng dẫn mua hàng</a></li>
                <li><a class="nav-link" href="baoquan.php">Hướng dẫn bảo quản</a></li>
            </ul>
            </li>
          </ul>
          <div class="user_option">
          <?php
                          
                           // Kiểm tra xem người dùng đã đăng nhập hay chưa
                           if (isset($_SESSION['loged'])) {
                             echo '<span class="welcome-msg"> Xin chào ' . $_SESSION['name'] . ' <button><a href="logout.php">Đăng xuất</a></button> </span>';
                           }
                           else {
                               // Nếu chưa đăng nhập, hiển thị nội dung đăng nhập và đăng ký
                               echo '
                                   <a href="login.php">
                                       <i class="fa fa-user" aria-hidden="true"></i>
                                       <span>
                                           Đăng nhập
                                       </span>
                                   </a>
                                   <a href="register.php">
                                       <i class="fa fa-user2" aria-hidden="true"></i>
                                       <span>
                                           Đăng kí
                                       </span>
                                   </a>';
                           }
                          ?>
            <!-- Giỏ hàng -->
            <div class="header__cart">
              <div class="header__cart-wrap">
                  <i class="fa fa-shopping-bag" ></i>
                  <span class="header__cart-notice">
                  <?php
                    include "connect.php";
                      $sql = "SELECT  Count(id) AS soLuong FROM tb_giohang";
                      $result = mysqli_query($conn, $sql);
                      $row1 = mysqli_fetch_assoc($result);
                        echo$row1['soLuong'];
                      ?>
                  </span>
                  <!-- No cart: header__cart-list--no-cart -->
                  <div class="header__cart-list">
                      <img src="./no-cart.png" alt="" class="header__cart-no-cart-img">
                      <span class="header__cart-list-no-cart-msg">
                          Chưa có sản phẩm
                      </span>

                      <h4 class="header__cart-heading">Sản phẩm đã thêm</h4>
                      <ul class="header__cart-list-item">
                          <!-- cart item -->
                          <?php
                             include "connect.php";
                             $id_xoa_sp =0;
                             $sql = "SELECT *,giaca*(1-giamgia) as tongtien FROM  tb_giohang gh
                             INNER JOIN sanpham sp ON sp.masp = gh.masp WHERE gh.taikhoanID = '$let_Account'";
                             $result = mysqLi_query($conn, $sql);
                             while($row = mysqLi_fetch_array($result)){ 
                              $id_xoa_sp = $row['id'] ?>
                              
                          <li class="header__cart-item">
                              <img src=<?php echo$row['hinhanh1']?> alt="" class="header__cart-img">
                              <div class="header__cart-item-info">
                                  <div class="header__cart-item-head">
                                      <h5 class="header__cart-item-name"><?php echo$row['tensp']?></h5>
                                      <div class="header__cart-item-price-wrap">
                                          <span class="header__cart-item-price"><?php echo$row['tongtien']?></span>
                                          <span class="header__cart-item-multiply">x</span>
                                          <span class="header__cart-item-qnt"><?php echo$row['SoLuong']?></span>
                                      </div>
                                  </div>
                                  <div class="header__cart-item-body">
                                      <span class="header__cart-item-description">
                                          Phân loại: <?php echo$row['loai']?>
                                      </span>
                                      <form action="index.php" method='post' enctype='multipart/form-data'>
                                        <span class="header__cart-item-remove">
                                        <input type='hidden' id='xoa_SP' name='id_xoa_sp' value="<?php echo$id_xoa_sp ?>">
                                        <button class="btn nav_delete-btn" name='xoa_sp' type="submit">
                                            Xóa
                                        </button>
                                        </span>
                                      </form>
                                  </div>
                              </div>
                          </li>

                          <?php    } ?>
                      </ul>
                      <a href="gio-hang.php" class="header__cart-view-cart btn btn--primary">Xem giỏ hàng</a >
                  </div>
              </div>
          
              
            </div>
            <form action="search.php" method="get" class="form-inline">        
                <input type="text" value="" placeholder="Nội dung tìm kiếm" name="noidungtimkiem" id="Timkiem" style="font-size: 12px; border: none; padding: 6px; margin-right: 12px;">                   
                <button class="btn nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
          </div>
        </div>
      </nav>
    </header>
        
      </div>
      <!-- end hero area -->
      <form action="gio-hang.php" method='post' enctype='multipart/form-data'>
        <div class="container_thong_tin_khach">
          <h2>Nhập Thông Tin Khách Hàng</h2>
        
          <label for="ho_ten">Họ và tên:</label>
          <input type="text" id="ho_ten" name="ho_ten" value='<?php echo$let_Name ?>' required><br>

          <label for="dia_chi">Địa chỉ:</label>
          <input type="text" id="dia_chi" name="dia_chi" value='<?php echo$let_DiaChi ?>' required><br>

          <label for="so_dien_thoai">Số điện thoại:</label>
          <input type="tel" id="so_dien_thoai" name="so_dien_thoai" value='<?php echo$let_SDT ?>'  required><br>
        </div>

        <div class="container_san_pham_da_them">
          <h2>Giỏ hàng của bạn</h2>
          <table>
            <tr class="table_san_pham">
              <th>Sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Size</th>
              <th>Màu chọn</th>
              <th>Tổng cộng</th>
            </tr>
            <?php
              include "connect.php";
              $sql = "SELECT *,giaca*(1-giamgia) as tongtien, SoLuong *giaca*(1-giamgia) AS tongtien1 FROM  tb_giohang gh
              INNER JOIN sanpham sp ON sp.masp = gh.masp WHERE gh.taikhoanID = '$let_Account'";
              $result = mysqLi_query($conn, $sql);
              while($row = mysqLi_fetch_array($result)){  ?>
            <tr class="table_san_pham">
              <td><?php echo$row['tensp']?></td>
              <td><?php echo$row['tongtien']?></td>
              <td><?php echo$row['SoLuong']?></td>
              <td><?php echo$row['Size']?></td>
              <td><?php echo$row['mausac']?></td>
              <td><?php echo$row['tongtien1']?></td>
            </tr>
            <?php    } ?>
          </table>
            <button  class="checkout-btn" name='them_don_hang' type="submit" href="index.php">Thanh toán</button>
        </form>
      </div>
  <?php
    if (isset($_POST['ho_ten'])&&isset($_POST['dia_chi'])&&isset($_POST['so_dien_thoai'])){
    $let_Name=$_POST['ho_ten'];
    $let_DiaChi=$_POST['dia_chi'];
    $let_SDT=$_POST['so_dien_thoai'];
    }
    include "connect.php";
    $sql = "SELECT  COUNT(id) AS count_id FROM tb_giohang";
    $result = mysqli_query($conn, $sql);
    $row1 = mysqli_fetch_assoc($result);
    // $them_don_hang_sql = "INSERT INTO tb_donhang (ID_DonHang, tenKhachHang, diaChi, SDT, sanPham, soLuong, size, tien) VALUES (, '$magh', '$let_Name', '$let_DiaChi,'$let_SDT', sp, sl, soze, tien)";
    $sp='';
    $solg=0;
    $size='';
    $sum_tien=0;
    $flag = 0;
    $delete_sql='DELETE FROM tb_giohang';
             
    if (isset($_POST['them_don_hang'])) {
      $flag = 1;
      $sql2 = "SELECT *, gh.SoLuong * sp.giaca * (1 - sp.giamgia) AS tongtien1 
         FROM tb_giohang gh
         INNER JOIN sanpham sp ON sp.masp = gh.masp 
         WHERE gh.taikhoanID = '$let_Account'";
      $result2 = mysqli_query($conn, $sql2);
      while ($row2 = mysqli_fetch_array($result2)) {
          $sp = $row2['tensp'];
          $solg = $row2['SoLuong'];
          $size = $row2['Size'];
          $sum_tien = $row2['tongtien1'];
          $mausac = $row2['mausac'];
          $ngay_lap_don_hang = date('Y-m-d');
          if($size == NULL){
            echo("lỗi thiếu thông tin size sản phẩm");

          } else if ($mausac == NULL){
            echo("lỗi thiếu thông tin màu sắc sản phẩm");
          } 
          else {
            $them_don_hang_sql = "INSERT INTO tb_donhang (ID_DonHang,tentaikhoan, tenKhachHang, diaChi, SDT, sanPham, soLuong, size, mausac,ngaylap, tien, trangthai) 
                VALUES (NULL, '$let_TK', '$let_Name', '$let_DiaChi', '$let_SDT', '$sp', $solg, '$size', '$mausac', '$ngay_lap_don_hang', $sum_tien, 'Chờ duyệt')";
  
          $check_sql_don_hang = "SELECT * FROM tb_donhang WHERE tenKhachHang = '$let_Name' AND diaChi = '$let_DiaChi' AND SDT = '$let_SDT' AND sanPham = '$sp' AND soLuong = $solg AND size = '$size' AND tien = $sum_tien";
          $check_result_don_hang = mysqli_query($conn, $check_sql_don_hang);
          if (mysqli_num_rows($check_result_don_hang) > 0) {
              // Xóa bản ghi trước đó nếu cần thiết
              $delete_sql_don_hang = "DELETE FROM tb_donhang WHERE tenKhachHang = '$let_Name' AND diaChi = '$let_DiaChi' AND SDT = '$let_SDT' AND sanPham = '$sp' AND soLuong = $solg AND size = '$size' AND tien =  $sum_tien";
              $delete_result = mysqli_query($conn, $delete_sql_don_hang);
              // xóa giỏ hàng
              $delete_sql = "DELETE FROM tb_giohang";
              
          }
  
          // Thêm đơn hàng
          $check_result = mysqli_query($conn, $them_don_hang_sql);
          // xóa giỏ hàng
          $delete_result12 = mysqli_query($conn, $delete_sql);
          echo "<script> alert('Đã đặt hàng thành công, chúng tôi sẽ liên hệ bạn sớm nhất'); </script>";
          echo "<script> window.location.href = 'trangchu.php'; </script>";
          } 
      }
  }
  
    
    ?>

    <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="https://www.facebook.com/profile.php?id=100094763028645&mibextid=ZbWKwL">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="https://twitter.com/Shop_Suit_Able">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="https://instagram.com/shopsuit_able?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              SuitAble
            </h6>
            <p>
              Thời trang trẻ trung, năng động, phong cách.
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Người dùng mới
              </h5>
              <form action="register.php">
                <input type="email" placeholder="Enter your email">
                <button>
                  Đăng kí ngay
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              Hỗ trợ
            </h6>
            <p>
              Đội ngũ của chúng tôi sẽ hỗ trợ tư vấn mọi thắc mắc, khó khăn của bạn trong thời gian sớm nhất có thể
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              Liên hệ
            </h6>
            <div class="info_link-box">
              <a>
                <p>  Quận 12, Thành phố Hồ Chí Minh </p>
              </a>
              <a>
                <p>0123 456 789</p>
              </a>
              <a>
                <p> shopsuitable.uth@gmail.com</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    include "connect.php";
    if(isset($_POST['xoa_sp'])){
      $id_sp = $_POST['id_xoa_sp'];
      $account = $_SESSION['account'];
      $xoa_sp = "DELETE FROM tb_giohang WHERE id = '$id_sp'";
      $check_result = mysqli_query($conn, $xoa_sp);
      }
        
    ?>
  </section>

  <!-- end info section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>
</body>

</html>