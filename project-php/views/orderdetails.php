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


                $getOrder = $conn->query("select orders.id as id ,orders.created_at ,orders.ext , users.name , room.room_number from orders
            JOIN users ON orders.id_users = users.id
            JOIN room ON orders.id_room = room.id order by orders.id");

                $getOrder_Fetch = $getOrder->fetchAll(PDO::FETCH_ASSOC);

                ?>

                <!-- <a href="addNewUser.php" class="text-font-light" style="background-color:#337AB7; borderre padding:1rem 3.5rem; color:white; margin:10px 0 "></a> -->
                <div class="container" style="width: 100%; padding:0 0;font-size:1.5rem; margin-top:2.5rem;">
                    <table class="table table-hover table-striped table-bordered text-center  w-75">
                        <h3 class="text-center">Orders Details</h3>
                        <thead>
                            <tr class="bg-primary">
                                <!-- <th scope="col">Order ID</th> -->
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_order = 0;
                            if (isset($_GET['id'])) {
                                $getProduct_Order = $conn->query("SELECT id_orders,products.image,products.price,quantity,products.name  from product_orders  JOIN products ON product_orders.id_products = products.id
                            JOIN orders ON product_orders.id_orders = orders.id order by id_orders");

                                $getProduct_Order_Fetch = $getProduct_Order->fetchall(PDO::FETCH_ASSOC);

                                $current_order_details_rows = array_filter(
                                    $getProduct_Order_Fetch,
                                    fn ($order_product)  =>  $order_product['id_orders'] == $_GET['id']
                                );


                                $count = count($current_order_details_rows);

                                // $total_order=0;

                                foreach ($current_order_details_rows as $value) {

                            ?>
                                    <tr>
                                        <!-- <td rowspan="<?php echo $count ?>"><?php echo $value['id_orders']; ?> </td> -->
                                        <td><?php echo $value['name']; ?> </td>
                                        <td><?php echo $value['quantity']; ?> </td>
                                        <td><?php echo $value['price']; ?></td>
                                        <td><?php echo $value['image']; ?></td>
                                        <td>
                                            <?php
                                            echo $totalPrice = $value['price'] * $value['quantity'];
                                            @$totalOrder += $totalPrice;
                                            ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </tbody>
                        <tfoot class="bg bg-primary">
                            <tr>
                                <td colspan="4">Total Price Of Order</td>
                                <td><?php echo $totalOrder; ?></td>
                            </tr>
                        </tfoot>
                    </table>
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