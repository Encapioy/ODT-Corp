<?php 
 
include 'connect.php';
 

 
session_start();
 
if (isset($_SESSION['username'])) { 
    header("Location: ../home.php");
}
 
if ($_POST['submit']) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM ustadz WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $test = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $test['username'];
        $_SESSION['id'] = $test['id'];
        $_SESSION['ustadz_name'] = $test['ustadz_name'];
        $_SESSION['class'] = $test['class'];
        header("Location: ../home.php");
    } else {
       
        header("Location: ../index.php");
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>