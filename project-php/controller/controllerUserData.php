<?php 
session_start();
require "models/database.php";
require "views/mail.php";
$email = "";
$name = "";
$errors =array();

//if user signup button
if(isset($_POST['signup'])){
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $cpassword  = $_POST['cpassword'];
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM users WHERE email = '$email'";
    $res = $conn->query($email_check) or die('query falied');
    if($res->rowCount() > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO users (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = $conn->query($insert_data) or die('query falied');
        if($data_check){
            $sender  = $mail->setFrom('hookshamosiba2015555@gmail.com', 'Hooksha');
            $mail->addAddress($email);
            $subject  = $mail->Subject = "Email Verification Code";
            $message  = $mail->Body    = "Your verification code is $code";
            $sendDone = $mail->send();

            if($sendDone){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = $_POST['otp'];
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = $conn->query($check_code) or die("query falide");
        if($code_res->rowCount() > 0){
            $fetch_data = $code_res->fetch(PDO::FETCH_ASSOC);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = $conn->query($update_otp) or die("query falide");
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email       = $_POST['email'];
        $password    = $_POST['password'];
        $radio       = $_POST['radio'];

        if ($radio == "admin") {
            $data = $conn->query("select email, password from admin where email = '$email' and password = '$password'");
            $result = $data->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) == 0) {

                $errors['email'] = "email or password is incorrect <br>";
                 header("location:../views/login-user.php");

            }
            else header("location:../index.php");
        }
    
        if($radio == "user"){

            $check_email = "SELECT * FROM users WHERE email = '$email'";
            $res = $conn->query($check_email) or die('query failed');
            if($res->rowCount() > 0){
                $fetch=$res->fetch(PDO::FETCH_ASSOC);                
                $fetch_pass = $fetch['password'];            
                if(password_verify($password, $fetch_pass)){
                    $_SESSION['email'] = $email;
                    $status = $fetch['status'];
                    if($status == 'verified'){
                      $_SESSION['email'] = $email;
                      $_SESSION['password'] = $password;
                        header('location:../../project-php/index.php');
                    }else{
                        $info = "It's look like you haven't still verify your email - $email";
                        $_SESSION['info'] = $info;
                        header('location:user-otp.php');
                    }
                }else{
                    $errors['email'] = "Incorrect email or password!";
                }
            }else{
                $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";

            }
        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = $_POST['email'];
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $run_sql = $conn->query($check_email) or die("query falied");
        if($run_sql->rowCount() > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
            $run_query = $conn->query($insert_code) or die("query failed");
            if($run_query){
                $sender  = $mail->setFrom('hookshamosiba2015555@gmail.com', 'Hooksha');
                $mail->addAddress($email);
                $subject = $mail->Subject = "Password Reset Code";
                $message = $mail->Body    = "Your password reset code is $code";
                $sendDone   = $mail->send();

                if($sendDone){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = $_POST['otp'];
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = $conn->query($check_code) or die("query failed");
        if( $code_res->rowCount() > 0){
            $fetch_data = $code_res->fetch(PDO::FETCH_ASSOC);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password =  $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE users SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = $conn->query($update_pass) or die("query failed");
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
?>