<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
$isLoggedIn = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
if (!$isLoggedIn) {
    header('Location: index.php');
}
if (!isset($_SESSION['order']) || !is_array($_SESSION['order'])) {

    $_SESSION['order'] = [];
}
?>
<!DOCTYPE html>
<html lang = "en" class="hydrated">
    <head>
        <meta charset= "UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/8306bb466f.js" crossorigin="anonymous"></script>
        <link rel = "stylesheet" href="style.css">
        <title>UIT STORE</title>

    </head>
    <body>
        <header>
            <div class="logo">
                <a href="index.php">
                    <img src="img/logouit.png" width="75" height="50">
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
                <form action="model/search.php" method="GET" >
                    
                    <input placeholder="Tìm kiếm" type="text" name="tukhoa" > 
                    <button class="search-button"><i class="fas fa-search"></i></button>
                </form>
                 </li>
                    <li><a href="cart.php"><span class="bag"><ion-icon name="bag-handle"></ion-icon></span></a></li>
                    <li><button class="btnLogin-popup"><span><ion-icon name="person"></ion-icon></span></button></li>
                    
                   
            </div>
            <style>
body {
    background-image: url('img/background.png');
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
        <!--                        ordered                      -->

        <?php
                        if (isset($_GET['tongdonhang'])) {
                            $tongdonhang = $_GET['tongdonhang'];
                            $fullname = $_GET['fullname'];
                            $address = $_GET['address'];
                            $email = $_GET['email'];
                            $phone = $_GET['phone'];
                            $madh = $_GET['madh'];
                            $pttt = $_GET['pttt'];
                            $user_id = $_GET['user_id'];
                            $product_name = $_GET['product_name'];
                            $product_img = $_GET['product_img'];
                            $order = array("tongdonhang"=>$tongdonhang,"fullname"=>$fullname,"address"=>$address,"email"=>$email,"phone"=>$phone,"madh"=>$madh,"pttt"=>$pttt,"user_id"=>$user_id,"product_name"=>$product_name,"product_img"=>$product_img);
                            array_push($_SESSION["order"], $order);
                            

                        }
                            ?>
                 
        <div style="margin: 75px" class="cart-content-left">
                        <table>
                            <tr>
                                <th>MÃ ĐƠN HÀNG</th>
                                <th>HỌ VÀ TÊN</th>
                                <th>SĐT</th>
                                <th>EMAIL</th>
                                <th>PHƯƠNG THỨC THANH TOÁN</th>
                                <th>TỔNG TIỀN</th>
                                <th>SẢN PHẨM</th>
                                <th>HÌNH ẢNH</th>
                                <th>XÓA</th>
                                <?php
                            if($isLoggedIn) {
                            $i=0;
                            foreach($_SESSION["order"] as $order) {
                                $tongdonhang_numeric = floatval(str_replace(',', '.', str_replace('.', '', $tongdonhang)));
                                $linkdel="ordered.php?del=".$i;
                            echo '<tr>
                                <td><p>'. $order['madh'] .'</p></td>
                                <td><p>'. $fullname .'</p></td>
                                <td><p>'. $phone .'</p></td>
                                <td><p>'. $email .'</p></td>
                                <td><p>'. $pttt .'</p></td>
                                <td><p>'. number_format($tongdonhang_numeric, 0, ',', '.').'</p></td>
                                <td><p>'. $product_name .'</p></td>
                                <td><img style="width:20%" src="admin/uploads/'.$product_img.'" alt=""></td>
                                <td><a href="'.$linkdel.'"><span>X</span></a></td>
                            </tr>';
                            $i++;
                            }
                             }else{
                            $i=0;
                            foreach($_SESSION["order"] as $order) {
                                $tongdonhang_numeric = floatval(str_replace(',', '.', str_replace('.', '', $tongdonhang)));
                                $linkdel="ordered.php?del=".$i;
                            echo '<tr>
                                <td><p>'. $madh .'</p></td>
                                <td><p>'. $fullname .'</p></td>
                                <td><p>'. $phone .'</p></td>
                                <td><p>'. $email .'</p></td>
                                <td><p>'. $pttt .'</p></td>
                                <td><p>'. number_format($tongdonhang_numeric, 0, ',', '.').'</p></td>
                                <td><p>'. $product_name .'</p></td>
                                <td><img style="width:20%" src="admin/uploads/'.$product_img.'" alt=""></td>
                                <td><a href="'.$linkdel.'"><span>X</span></a></td>
                            </tr>';
                            $i++;
                                }
                            }
                    if(isset($_GET['del']) && ($_GET['del'] >=0))  {
                        array_splice($_SESSION['order'], $_GET['del'],1);
                        header('Location: ordered.php ');
                    }
                    if(isset($_GET['del']) && ($_GET['del']==-1))  {
                        $_SESSION['order']=[];
                        header('Location: ordered.php ');
                    }     
                            ?>  
                             
                            </tr>
                            
                            
                        </table>
                        <div class="cart-content-left">
                            <table>
                        <th><a style="font_size =20px" href="ordered.php?del=-1">Xóa hết</a></th>
                      <?php
                         
                        ?>
                        </table>
                        </div>
                    </div>
        
            
        </div>
    </div>
    

    <!-- Add more order items as needed -->


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
                    <li><a href=""><img src="img/logouit.png" width="75" height="50" alt=""></a></li>
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
