<?php
require "../models/database.php";

if(isset($_GET['id'])){

    $user_id = $_GET['id'];

        // print_r($user_id) and die();
        // print_r("select id from orders where id_users=$user_id ORDER BY created_at DESC LIMIT 1;") and die();
        
}
?>
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

            <div class="content contentThree">

                <h3>Your Profile Picture</h3>
                <div class="image-control">
                    <img src="../public/image/pic-1.png" class="main-home-image" alt="">
                    <div class="btns">
                        <a href="#" class="btn">Change Photo <i class="fa fa-pen"></i></a>
                        <a href="#" class="btn">Remove <i class="fa fa-trash"></i></a>
                    </div>
                </div>

                <hr>

                <form action="" class="book">

                    <div class="name general">
                        <label for="name">Name</label>
                        <input type="text" placeholder="your name" class="box" id="name" name="name">
                    </div>

                    <div class="email general">
                        <label for="email">Email</label>
                        <input type="email" placeholder="your email" class="box" id="email" name="email">
                    </div>

                    <div class="phone general">
                        <label for="phone">Phone Number</label>
                        <input type="number" placeholder="your number" class="box" id="phone" name="phone">
                    </div>

                    <div class="bio general">
                        <label for="bio">Bio</label>
                        <textarea name="" placeholder="your message" class="box" cols="30" rows="10" id="bio" name="bio"></textarea>
                    </div>
                    <input type="submit" value="Save Changes" class="btn" name="submit">
                </form>
                <h1 class="heading"> <span>my last order</span> </h1>

                <table class="table table-hover table-striped table-bordered text-center" style="margin-top:2.5rem;">
                    <thead>
                        <tr class="bg-primary">
                            <th scope="col">Image Product</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $result = $conn->query("select id from orders where id_users=$user_id ORDER BY created_at DESC LIMIT 1;");                        
                        $result = $result->fetch(PDO::FETCH_ASSOC);


                        $pro = $conn->query("select id_products from product_orders where id_orders='{$result['id']}';");
                        $pro = $pro->fetchAll(pdo::FETCH_ASSOC);

                        var_dump($pro);

                        foreach ($pro as $product) {
                            $product_info = $conn->query("select name ,image ,price from products where id='{$product['id_products']}'; ");
                            $product_info = $product_info->fetchAll(pdo::FETCH_ASSOC);
                            foreach ($product_info as $row) {
                        ?>
                                <tr>
                                    <td><img src="../public/images/<?php echo $row['image'] ?>" style="height:10rem ;"></td>
                                    <td><?php echo $row['name']; ?> </td>
                                    <td><?php echo $row['price']; ?></td>
                                </tr>
                         <?php }} ?>

                    </tbody>
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