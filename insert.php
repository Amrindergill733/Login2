<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'webmafiyacpp') or die("Database ia not connected !");
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
if (!empty($username) || !empty($password) || !empty($email)) {
    $SELECT = "SELECT email FROM loginsignup WHERE email = '$email' Limit 1";
    $INSERT = "INSERT INTO loginsignup(email, username, `password`) VALUES ('$email','$username','$password')";
    //prepare statement
    $numRows = mysqli_query($db, $SELECT);
    if (mysqli_num_rows($numRows) == 0) {
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $insert_run = mysqli_query($db, $INSERT);
        echo '<script>alert("login succesfully")</script>';
       
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