<?php 
include './include/connection.php';
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];


if(isset($_POST['submit'])){
    
    $sql = "INSERT INTO users(firstName, lastName, email) VALUES ('$firstName','$lastName','$email')";

    if(empty($firstName)){
        echo 'please enter the first name';
    }elseif(empty($lastName)){
        echo 'please enter last name';
    }elseif(empty($email)){
        echo 'please enter your email';   
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        /* email validateion  */
        echo 'enter correct email';
    }else{
        if(mysqli_query($connection,$sql)){
            header('Location: index.php');
            echo 'success';
        }else{
            echo 'error: ' . mysqli_error($connection);
        }  
    }

       
}


?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="text" name="firstName" id="firstName" placeholder="first name">
            <input type="text" name="lastName" id="lastName" placeholder="Last Name">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="submit" name="submit" value="send">
        </form>
        
        <script src="./js/script.js" async defer></script>
    </body>
</html>