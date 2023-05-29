<?php 
 
include 'php/connect.php';
 

 
session_start();
 
if (isset($_SESSION['name'])) { 
    header("Location: index.php");
}
 
if ($_POST['submit']) {
    $username = $_POST['name'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM user WHERE name='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $test = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $test['name'];
   
        header("Location: index.php");
    } else {
       
        header("Location: index.php");
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.css" rel="stylesheet" />
    <style>
        .login {
            border: 1px solid black;
            padding: 30px;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="row d-flex justify-content-center pt-5">
        <div class="col-md-4 login">
            <h1 class="text-center text-black fw-bold">ODT Corps</h1><br>
            <form method="post" action="">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input name="name" type="text" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input name="password" type="password" id="form2Example2" class="form-control" />
                    <label class="form-label" for="form2Example2">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->


                <!-- Submit button -->
                <input name="submit" type="submit" class="btn btn-primary btn-block mb-4">

                <!-- Register buttons -->

            </form>
        </div>
    </div>

</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.1/mdb.min.js"></script>

</html>