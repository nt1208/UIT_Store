<?php
include "class/ordered_admin.php";
$order = new order;

    $update_order = $order->update_order($tinhtrang);
     echo "<script>window.location = 'ordered_admin.php'</script>";
?>

