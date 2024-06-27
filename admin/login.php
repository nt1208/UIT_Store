<?php
    session_start();
    ob_start();
    include "class/user_class.php";
    $user = new User;

    if (isset($_POST["dangnhap"])) {
        $email = $_POST['email']; 
        $password = $_POST['pass'];
        $user_info = $user->check_user($email, $password);

        
        
        if ($user_info && $user_info['role'] == 1) {
            // Nếu là admin, chuyển hướng đến trang cartegoryadd.php
            $_SESSION['user_id'] = $user_info['user_id'];
            $_SESSION['user_name'] = $user_info['username'];
            $_SESSION['role'] = $user_info['role'];
            header('Location: cartegoryadd.php');
            exit();
        } elseif ($user_info && $user_info['role'] == 0) {
            // Nếu là user, chuyển hướng đến trang index.php
            $_SESSION['user_id'] = $user_info['user_id'];
            $_SESSION['user_name'] = $user_info['username'];
            $_SESSION['role'] = $user_info['role'];

            header('Location: ../giohang.php');
            exit();
        } else {
            // Nếu thông tin không chính xác, có thể hiển thị thông báo lỗi hoặc xử lý khác
            //echo "Invalid email or password";
          echo "
                <script>
                    alert('Thông tin đăng nhập không chính xác. Vui lòng thử lại.');
                    window.location.href = '../index.php'; // Chuyển hướng người dùng sau khi nhấn OK
                </script>";
          
        }
        
    }
    $isLoggedIn = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
    
?>
<script>
    // Hàm để hiển thị/ẩn nút đăng nhập và đăng xuất
    function toggleLoginLogoutButtons(isLoggedIn) {
        const loginBtn = document.getElementById('dangnhap');
        const logoutBtn = document.getElementById('dangxuat');

        if (isLoggedIn) {
            loginBtn.style.display = 'none';
            logoutBtn.style.display = 'block';
        } else {
            loginBtn.style.display = 'block';
            logoutBtn.style.display = 'none';
        }
    }

    // Gọi hàm để cập nhật trạng thái ban đầu của nút
    toggleLoginLogoutButtons(<?php echo $isLoggedIn ? 'true' : 'false'; ?>);
</script>

<!DOCTYPE html>
<html lang = "en" class="hydrated">
    <head>
        <meta charset= "UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/8306bb466f.js" crossorigin="anonymous"></script>
        <link rel = "stylesheet" href="../style.css">
        <title>UIT STORE</title>

    </head>
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
    <body>
        <header>
            <div class="logo">
                <a href="login.php">
                    <img src="../img/logouit.png" width="75" height="75">
                </a>
                
            </div>
            <div class="menu">
                <li><a href="">Giáo trình</a>
                   
                </li>
                <li><a href="">Thiết bị điện tử</a>

                </li>
                <li><a href="">Quần áo</a>

                </li>
            </div>
            <div class="others">
                <li> <input placeholder="Tìm kiếm" type="text"> <a href="giohang.php"><i class="fas fa-search"></i></a> </li>
                    <li><a href="cart.php"><span class="bag"><ion-icon name="bag-handle"></ion-icon></span></a></li>
                    <li><button class="btnLogin-popup"><span><ion-icon name="person"></ion-icon></span></button></li>
                    
                   
            </div>
        </header>
        <!--               slider                    -->
        <section id="slide">
            <div class="aspect-ratio-169">
            <img src="../img/1.png" alt="1">
                <img src="../img/2.png" alt="2">
                <img src="../img/3.png" alt="3">
                <img src="../img/4.png" alt="4">
                <img src="../img/5.png" alt="5">
            </div>
        </section>

        <!--                  login                          -->
        <div class="wrapper">
            <span class="icon-close"><ion-icon name="close"></ion-icon></span>

            <div class="form-box login">
                <h2>Login</h2>
                <form action="login.php" method="post">
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
                        <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                    </div>
                </form>
            </div>

            <div class="form-box register">
                <h2>Registration</h2>
                <form action="register.php" method="post">
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
                    <li><a href=""><img src="../img/logouit.png" width="50" height="50" alt=""></a></li>
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
                       Email liên hệ : 21522456@gm.uit.edu.vn <br>
                       Đặt hàng online : <b>0123456789</b>
                   </p>
               </div>
               <div class="footer-bottom">
                   UIT STORE
               </div>
            </div>
        </section>


       


        <script src="../slider.js"></script>
        <script src="../script.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
    
</html>