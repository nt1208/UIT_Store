<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
$isLoggedIn = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);

?>
<?php
    include_once "product_list.php";

include 'connect.php';
if (isset($_GET['tukhoa'])) {
    $tukhoa = $_GET['tukhoa'];

    // Kết nối đến cơ sở dữ liệu
    $conn = connectdb();

    // Kiểm tra kết nối
    if ($conn === null) {
        die("Không thể kết nối đến cơ sở dữ liệu.");
    }

    // Câu truy vấn SQL
    $sql = "SELECT * FROM tbl_product WHERE product_name LIKE CONCAT('%', :keyword, '%')";

    // Tiếp tục truy vấn
    $querry = $conn->prepare($sql);
    $querry->bindParam(':keyword',  $tukhoa , PDO::PARAM_STR);

    try {
        $querry->execute();

        // Lấy kết quả
        $results = $querry->fetchAll(PDO::FETCH_ASSOC);

        // Xử lý kết quả theo ý muốn
        foreach ($results as $result) {
          
        }
    } catch (PDOException $e) {
        // Xử lý nếu có lỗi trong quá trình thực hiện truy vấn
        echo "Lỗi thực hiện truy vấn: " . $e->getMessage();
    }

    // Đóng kết nối sau khi sử dụng
    $conn = null;
}
?>

<!DOCTYPE html>
<html lang = "en" class="hydrated">
    <head>
        <meta charset= "UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/8306bb466f.js" crossorigin="anonymous"></script>
        <link rel = "stylesheet" href="../style.css">
        <title>FootballKit</title>

    </head>
    <body>
        <header>
            <div class="logo">
                <a href="../index.php">
                    <img src="../img/logouit.png" width="75" height="50">
                </a>
                
            </div>
            <div class="menu">
                <li><a href="giohang.php">Giáo trình</a>
                   
                </li>
                <li><a href="giohang.php">Thiết bị điện tử</a>

                </li>
                <li><a href="giohang.php">Quần áo</a>

                </li>
            </div>
            <div class="others">
                 
                 <li>
                <form action="search.php" method="GET" >
                    
                    <input placeholder="Tìm kiếm" type="text" name="tukhoa" > 
                    <button class="search-button"><i class="fas fa-search"></i></button>
                </form>
                 </li>
                    <li><a href="../cart.php"><span class="bag"><ion-icon name="bag-handle"></ion-icon></span></a></li>
                    <li><button class="btnLogin-popup"><span><ion-icon name="person"></ion-icon></span></button></li>
                    
                   
            </div>
            <style>
body {
    background-image: url('../img/background.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.search-button {
    background-color: transparent; 
    border: none;
    vertical-align: top; 
}

.search-button i {
    color: #333; 
    font-size: 16px;
}
.search-button:hover i {
    color: #007bff;
}
/*responsive*/
/* Desktop */
@media only screen and (min-width: 1024px) {
  /* Styles for desktop */
  #slide{
    padding-top:70px;
  }
}

/* Tablet */ 
@media only screen and (max-width: 1023px) and (min-width: 768px) {
    
    #slide{
    padding-top:70px;
  }
}

/* Mobile L */
@media only screen and (max-width: 767px) and (min-width: 480px) {
    .logo {
    flex:1;
  }
  .menu {
    flex:10;
    
}
.menu > li{
    padding:15px;
    position: relative;
}
  .others{
    flex:5;
    flex-direction:column;
    
  }
  #slide{
    padding-top:70px;
  }
}


@media only screen and (max-width: 479px) {
  /* Styles for mobile portrait */
  .header{
    padding:5px 5px;
  }
  .logo {
    flex:1;
  }
  .menu {
    flex:10;
    
}
.menu > li{
    padding:5px;
    position: relative;
}
  .others{
    flex:5;
    flex-direction:column;
    
  }
  #slide{
    padding-top:70px;
  }
}

            </style>
        </header>
        <!--                       GioHang                              -->
        <section class="cartegory">
            <div class="container">
                <div class="cartegory-top row">
                    <p>Trang chủ</p> <span>&#10230;</span> <p><?php echo $tukhoa?></p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="cartegory-left">
                        <ul>
                            <li class="cartegory-left-li"><a href="#">Áo</a>
                            <ul>
                                <li><a href="">Áo mới</a></li>
                                <li><a href="">Áo 1</a></li>
                            </ul>
                            </li>
                            <li class="cartegory-left-li"><a href="#">Quần</a>
                                <ul>
                                    <li><a href="">Quần mới</a></li>
                                    <li><a href="">Quần 1</a></li>
                                </ul>
                            </li>
                            <li class="cartegory-left-li"><a href="#">Bộ</a>
                                <ul>
                                    <li><a href="">Bộ mới</a></li>
                                    <li><a href="">Bộ 1</a></li>
                                </ul>
                            </li>
                            <li class="cartegory-left-li"><a href="#">CLB</a>
                                <ul>
                                    <li><a href="">CLB mới</a></li>
                                    <li><a href="">CLB 1</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="cartegory-right row">
                        <div class="cartegory-right-top-item">
                            <p>SẢN PHẨM MỚI NHẤT</p>
                        </div>
                        <div class="cartegory-right-top-item">
                            <button><span>Bộ lọc</span><i class="fas fa-sort-down"></i></button>
                        </div>
                        <div class="cartegory-right-top-item">
                            <select name="" id="">
                                <option value="">Sắp xếp</option>
                                <option value="">Cao-Thấp</option>
                                <option value="">Thấp-Cao</option>
                            </select>
                        </div>
                        
                        <div class="cartegory-right-content row">
                        <?php
                    
                        
                        // Kiểm tra xem có sản phẩm nào hay không
                        if (!empty($results)) {
                            foreach ($results as $result)     {
                                $product_id = $result["product_id"];
                                $product_name = $result["product_name"];
                                $product_img = $result["product_img"];
                                $product_price = $result["product_price"];
                                
                                // Hiển thị thông tin sản phẩm
                                echo '<div class="cartegory-right-content-item">';
                                echo '<a href="../product.php?product_id=' . $product_id . '">';
                                echo '<img src="../admin/uploads/' . $product_img . '" alt="">';
                                echo '<h1>' . $product_name . '</h1>';
                                echo '<p>' . $product_price . '<sup>đ</sup></p>';
                                echo '</a>';
                                echo '</div>';
                                
                                
                            }
                        }
                        $products = get_new_product();

// Kiểm tra và bỏ qua sản phẩm trùng lặp
if (!empty($products)) {
    foreach ($products as $product) {
        $product_id = $product["product_id"];
        $product_name = $product["product_name"];
        $product_img = $product["product_img"];
        $product_price = $product["product_price"];

        // Kiểm tra nếu product_id không trùng với các product_id từ kết quả tìm kiếm
        $skipProduct = false;
        foreach ($results as $result) {
            if ($product_id == $result["product_id"]) {
                $skipProduct = true;
                break; // Thoát khỏi vòng lặp khi tìm thấy trùng
            }
        }

        // Nếu không trùng, hiển thị thông tin sản phẩm
        if (!$skipProduct) {
            echo '<div class="cartegory-right-content-item">';
            echo '<a href="../product.php?product_id=' . $product_id . '">';
            echo '<img src="../admin/uploads/' . $product_img . '" alt="">';
            echo '<h1>' . $product_name . '</h1>';
            echo '<p>' . $product_price . '<sup>đ</sup></p>';
            echo '</a>';
            echo '</div>';
        }
    }
} else {
    echo '<p>Không có sản phẩm mới nào.</p>';
}
                        ?>
                           
                          
                           
                         
                           
                        </div>
                      

                      <!--  <div class="cartegory-right-bottom row">
                            <div class="cartegory-right-bottom-items">
                                <p>Hiển thị 2 <span>|</span> 4 sản phẩm  </p>
                            </div>
                            <div class="cartegory-right-bottom-items">
                                <p><span>&#171;</span>1 2 3 4 5<span>&#187;</span>Trang cuối</p>
                            </div>
                        </div>
                    -->

                    </div>

                </div>
            </div>


            
        </section>


       <!--                  login                          -->
     
<div class="wrapper">
    <span class="icon-close"><ion-icon name="close"></ion-icon></span>

    <?php
    if ($isLoggedIn) {
        // Nếu đã đăng nhập, hiển thị thông tin người dùng và nút đăng xuất
        echo '<div class="form-box login">
                <h2>User Information</h2>
                <a href="informationuser.php?user_id=' . $_SESSION['user_id'] . '"><p>Welcome, ' . $_SESSION['user_name'] . '!</p></a>
                <form action="admin/logout.php" method="post"> 
                    <button type="submit" id="dangxuat" name="dangxuat" style="background-color: #ff0000; color: #fff; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px; display: flex;">Log Out</button>
                </form>
                <style>
                    #dangxuat {
                        background-color: #ff0000; 
                        color: #fff; 
                        padding: 10px 15px; 
                        border: none; 
                        cursor: pointer; 
                        border-radius: 5px; 
                    }
                
                    #dangxuat:hover {
                        background-color: #cc0000; 
                    }
                </style>

                <div class="login-register">
                    <p>Don\'t have an account? <a href="#" class="register-link">Register</a></p>
                </div>
            </div>';
    } else {
        // Nếu chưa đăng nhập, hiển thị biểu mẫu đăng nhập và nút đăng ký
        echo '<div class="form-box login">
        <h2>Login</h2>
        <form action="admin/login.php" method="post">
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="pass" required>
                <label>Password</label>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" id="dangnhap" name="dangnhap" class="btn">Login</button><br> <br>


            <div class="login-register">
                <p>Don\'t have an account? <a href="#" class="register-link">Register</a></p>
            </div>
        </form>
    </div>';
    }
    ?>

            <div class="form-box register">
                <h2>Registration</h2>
                <form action="admin/register.php" method="post">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="text" name="username" required>
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox">I agree to the terms & conditions</label>
                    </div>
                    <button type="submit" name="dangky" class="btn">Register</button>
                    <div class="login-register">
                        <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                    </div>
                </form>
            </div>
        </div>



        <!--                Footer                            -->
        <section class="footer">
            <div class="footer-container">
                <div class="footer-top">
                    <li><a href=""><img src="../img/logouit.png" width="75" height="50" alt=""></a></li>
                    <li><a href=""></a>Liên hệ</li>
                    <li><a href=""></a>Tuyển dụng</li>
                    <li><a href=""></a>Giới thiệu</li>
                    <li>
                       <a href="" class="fab fa-facebook-f"></a>
                       <a href="" class="fab fa-twitter"></a>
                       <a href="" class="fab fa-youtube"></a>
                   </li>
       
               </div>
               <div class="footer-center">
                   <p>
                       Email liên hệ : 21522456@gm.uit.edu.vn <br>
                      
                       Đặt hàng online : <b>0123456789</b>
                   </p>
               </div>
               <div class="footer-bottom">
                   UIT STORE
               </div>
            </div>
        </section>


       


        <script src="slider.js"></script>
        <script src="script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
    
</html>