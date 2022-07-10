<?php

    require '../../models/database.php';

    session_start();
    $_SESSION['id'] =41;

    //error1
    if(!isset($_GET['dateFrom']) && !isset($_GET['dateTo'])){
        $error = 'ERROR: You did not select date or user';
        header("location:../../views/checksUser.php?error=".$error);
    }

    //error2
    if(isset($_GET['dateFrom']) && !isset($_GET['dateTo'])){
        $error = 'ERROR: Please select date from And date to';
        header("location:../../views/checksUser.php?error=".$error);
    }

    //error3
    if(!isset($_GET['dateFrom']) && isset($_GET['dateTo'])){
        $error = 'ERROR: Please select date from And date to';
        header("location:../../views/checksUser.php?error=".$error);
    }


    //when admin select only dates
    if(isset($_GET['dateFrom']) && isset($_GET['dateTo'])){
        //get the selected user
        $sql = "select product_orders.quantity, products.name as productName , products.price , product_orders.id_orders , orders.date , users.name as userName , product_orders.quantity*products.price as TOTAL from orders ,users , product_orders, products   where users.id = orders.id_users AND products.id = product_orders.id_products AND orders.id = product_orders.id_orders  AND date BETWEEN '{$_GET['dateFrom']}' AND '{$_GET['dateTo']}' AND users.id = {$_SESSION['id']}";

        $stm = $conn->prepare($sql);
        $stm->execute();
        $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
        $users = $stm->fetchAll();
        $jUsers = json_encode($users);
        header("location:../../views/checks.php?users=$jUsers");

       
    }          
            
?>
