<?php
session_start();

if(isset($_SESSION["isLogin"])&& $_SESSION["isLogin"]){
  if($_SESSION['level']=='admin'){
    header("location:./admin/admin.php");
  }
  elseif($_SESSION['level']=='customer'){
    header("location:./customer/customer.php");
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/signin.css">
  <title>Hello, world!</title>
</head>

<body class="text-center">
<main class="form-signin">
  <form action="check.php" method="POST">
    <img class="mb-2" src="./assets/image/logo2.png" alt="" width="100" height="80">
    <h1 class="mb-3 fw-arial">E-TIX</h1>

    <div class="form-floating">
      <input type="text" class="form-control text-secondary" id="floatingInput" name="username" placeholder="Masukkan username Anda">
      <label for="username">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control text-secondary" id="floatingPassword" name="password" placeholder="Masukkan password Anda">
      <label for="password">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-50 btn btn-lg btn-dark mb-2" type="submit" value="login">Login</button>
    <h6 class="mb-2">Or</h6>
    <a href="./customer/registrasi_cus.php" class="w-50 btn btn-lg btn-warning" type="submit" value="login">Register</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </form>
</main>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
