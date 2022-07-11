<?php require "../models/database.php";  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usn</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="../public/image/favicon_io/android-chrome-512x512.png" type="image/x-icon">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../public/css/profile.css">

</head>

<body>

    <!-- header section starts  -->
    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="../index.php" class="logo"> Cafeteria <i class="fas fa-mug-hot"></i> </a>

        <nav class="navbar">
            <a href="../index.php#home">home</a>
            <a href="../index.php#about">about</a>
            <a href="../index.php#menu">menu</a>
            <a href="../index.php#review">review</a>
            <a href="checks.php">Checks Orders</a>
            <a href="cart.php">Cart</a>
            <a href="profile.php">Profile</a>
        </nav>

        <a href="../index.php#book" class="btn">book a room</a>


    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="row">
            <div class="contentThree">
                <?php
                $sql = "SELECT DISTINCT orders.date FROM orders;";
                $stm = $conn->prepare($sql);
                $stm->execute();
                $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
                $orders = $stm->fetchAll();
                ?>
                <!-- <a href="addNewUser.php" class="text-font-light" style="background-color:#337AB7; borderre padding:1rem 3.5rem; color:white; margin:10px 0 "></a> -->
                <form action="../controller/userController/checkController.php" method="get" style="display:flex ;justify-content:space-evenly; margin:3rem 0">
                    <!-- date from -->
                    <select name="dateFrom" style="padding:1rem 3rem">
                        <option disabled selected> DATE FROM </option>
                        <?php
                        foreach ($orders as $order) {
                            echo "<option value=" . $order['date'] . ">" . $order['date'] . "</option>";
                        }
                        ?>
                    </select>
                    <select name="dateTo" style="padding:1rem 3rem">
                        <option disabled selected> DATE To </option>
                        <?php
                        foreach ($orders as $order) {
                            echo "<option value=" . $order['date'] . ">" . $order['date'] . "</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" value="filter" style="padding:1rem 3rem">
                </form>


                <table class="table table-hover table-striped table-bordered text-center" style="margin-top:2.5rem;">
                    <thead>
                        <tr class="bg-primary">
                            <th scope="col">Order Number</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Order date</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $totalorder = 0;
                        if (isset($_GET['users'])) {
                            $users = json_decode($_GET['users'], true);
                            $sql = "select * from orders ";
                            $stm = $conn->prepare($sql);
                            $stm->execute();
                            $stm->setFetchMode(PDO::FETCH_ASSOC);   //delete the repeat
                            $orders = $stm->fetchAll();
                            $orderTotal = 0;
                            foreach ($orders as $order) {


                                $current_order_details_rows = array_filter(
                                    $users,
                                    fn ($order_product)  =>  $order_product['id_orders'] == $order['id']
                                );


                        ?>
                                <?php

                                foreach ($current_order_details_rows as $current_order_details_row) {
                                ?>
                                    <tr>
                                        <td><?php echo $current_order_details_row['id_orders'] ?> </td>
                                        <td><?php echo $current_order_details_row['userName']; ?> </td>
                                        <td><?php echo $current_order_details_row['date']; ?> </td>
                                        <td><?php echo $current_order_details_row['productName']; ?></td>
                                        <td><?php echo $current_order_details_row['price']; ?></td>
                                        <td><?php echo $current_order_details_row['quantity']; ?></td>
                                        <td><?php echo $current_order_details_row['TOTAL'];
                                            $totalorder += $current_order_details_row['TOTAL'];

                                            ?>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">Total Price Of Order</td>
                            <td><?php echo $totalorder; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>







        </div>
    </section>



    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>Our Branches</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i> Zagazig </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> Mansoura </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> Cairo </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> Giza </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> France </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> Italy</a>
                <a href="#"> <i class="fas fa-arrow-right"></i> Qena</a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="../index.php#home"> <i class="fas fa-arrow-right"></i> home </a>
                <a href="../index.php#about"> <i class="fas fa-arrow-right"></i> about </a>
                <a href="../index.php#menu"> <i class="fas fa-arrow-right"></i> menu </a>
                <a href="../index.php#review"> <i class="fas fa-arrow-right"></i> review </a>
                <a href="checks.php"> <i class="fas fa-arrow-right"></i> check orders</a>
                <a href="cart.php"> <i class="fas fa-arrow-right"></i> cart </a>
                <a href="profile.php"> <i class="fas fa-arrow-right"></i> profile </a>

            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +123-456-7890 </a>
                <a href="#"> <i class="fas fa-phone"></i> +111-222-3333 </a>
                <a href="#"> <i class="fas fa-envelope"></i> cafe@gmail.com </a>
                <a href="#"> <i class="fas fa-envelope"></i> Mansoura, Egypt = 35511 </a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
            </div>

        </div>

        <div class="credit"> created by <span>KINGS TEAM</span> | all rights reserved </div>

    </section>

    <!-- footer section ends -->

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="../public/js/script.js"></script>
</body>

</html>