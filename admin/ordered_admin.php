<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
$isLoggedIn = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
?>
  <!--                  login                          -->
  <div class="wrapper">
            <span class="icon-close"><ion-icon name="close"></ion-icon></span>

            <?php
    if ($isLoggedIn) {
        // Nếu đã đăng nhập, hiển thị thông tin người dùng và nút đăng xuất
        echo '<div class="form-box login">
                <h2>User Information</h2>
                <p>Welcome, ' . $_SESSION['user_name'] . '!</p>
                <form action="logout.php" method="post"> 
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

              
            </div>';
    } 

    if ($_SESSION['role'] != 1) {
        // Người dùng không có quyền truy cập, có thể chuyển hướng hoặc thực hiện các hành động khác
        echo 'Bạn không có quyền truy cập trang admin.';
        exit;
    }
    ?>
<?php
include "header.php";
include "slider.php";
include "class/ordered_admin.php";
?>
<?php
$order = new order;
$showorder = $order->show_order();
?>

<div class="admin-content-right">
<div class="admin-content-right-cartegory_list">
                <h1>Tình trạng xử lý đơn hàng</h1>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>Mã đơn hàng</th>
                        <th>Giá trị đơn hàng</th>
                        <th>Phương thức thanh toán</th>
                        <th>Địa chỉ nhận hàng</th>
                        <th>Tình trạng đơn hàng</th> 
                        <th>Thao tác</th> 
                    </tr>
                    <?php
                    if($showorder){$i=0;
                        while($result = $showorder->fetch_assoc()){$i++;
                    
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['madh'] ?></td>
                        <td><?php echo $result['tongdonhang'] ?></td>
                        <td><?php echo $result['pttt'] ?></td>
                        <td><?php echo $result['address'] ?></td>
                        <td style="color: <?php echo $result['tinhtrang'] == 0 ? 'red' : 'green'; ?>">
                    <?php echo $result['tinhtrang'] == 0 ? 'Chưa xử lý' : 'Đã xử lý'; ?>
                         </td>
                         
                         <?php if ($i == 1) { ?>
                    <td rowspan="<?php echo $showorder->num_rows; ?>"><a href="ordered_admin_update.php?tinhtrang=<?php echo $result['tinhtrang'] ?>">Xử lý</a></td>
                <?php } ?>
                        
                    </tr>
                    <?php
                    }
                }
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>