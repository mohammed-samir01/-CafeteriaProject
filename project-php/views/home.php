<?php require_once "../controllers/controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $run_Sql = $conn->query($sql) or die("query failed");
    if ($run_Sql) {
        $fetch_info = $run_Sql->fetch(PDO::FETCH_ASSOC);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if ($status == "verified") {
            if ($code != 0) {
                header('Location: reset-code.php');
            }
        } else {
            header('Location: user-otp.php');
        }
    }
} else {
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        nav {
            padding-left: 100px !important;
            padding-right: 100px !important;
            background: #6665ee;
            font-family: 'Poppins', sans-serif;
        }

        nav a.navbar-brand {
            color: #fff;
            font-size: 30px !important;
            font-weight: 500;
        }

        button a {
            color: #6665ee;
            font-weight: 500;
        }

        button a:hover {
            text-decoration: none;
        }

    </style>
</head>

<body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">Cafeteria</a>
        <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    </nav>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row align-items-center">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $fetch_info['name'] ?></span><span class="text-black-50"><span>Email: <?php echo $fetch_info['email'] ?></span></span><span> </span></div>
            </div>
            <div class="col-md-9 border-left text-center">
                <h1 class="m-5">Welcome <?php echo $fetch_info['name'] ?></h1>
                <a class="btn btn-primary" href="../index.php">Go To Home</a>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>