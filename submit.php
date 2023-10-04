<?php

session_start();

$db = mysqli_connect('localhost', 'root', '', 'webmafiyacpp') or die("Database ia not connected !");

$password = $_POST["password"];
$email = $_POST["email"];
echo $_POST["email"];
$sql = "select * from  loginsignup where ( username='$email' OR email = '$email') and password='$password'  ";

$result = mysqli_query($db, $sql);
$post = mysqli_fetch_array($result);

if ($result) {
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $result1 = mysqli_query($db, "SELECT * from loginsignup WHERE ( username='$email' OR email = '$email') and password='$password' ");
        $post1 = mysqli_fetch_array($result1);
        echo '<script>alert("login succesfully")</script>';
        $_SESSION["username"]= $post1['username'];
        $_SESSION["password"]=$password;

        header("Location: index.php");

    } else {
        ?>

        
                <script>
                    alert("Someone already register using this email");
                    window.location = "loginsignup.php";
                </script>
                <?php
        
    }

}

?>