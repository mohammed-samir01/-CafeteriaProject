<?php
     //data for connection
  

    // orderID
    $orderId = $_GET['order_id'];
    // var_dump($_GET['order_id']);





     //database connection
     require '../../models/db.php';
   
     $sqlDelete = "DELETE from orders where id = $orderId";
     $conn->exec($sqlDelete);

     $sqlSelect = "select orders.id ,orders.created_at ,orders.order_status, users.name , product_orders.quantity*products.price as TOTAL from orders ,users , product_orders, products  where users.id = orders.id_users AND products.id = product_orders.id_products AND orders.id = product_orders.id_orders  AND created_at BETWEEN '{$_GET['dateFrom']}' AND '{$_GET['dateTo']}'";
     $stm = $conn->prepare($sqlSelect);
     $stm->execute();
     $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
     $users = $stm->fetchAll();
     $jUsers = json_encode($users);
     header("location:../../views/checksUser.php?users=$jUsers");
?>