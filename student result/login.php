<?php
  include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="stylesheet.css" rel="stylesheet">
    <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/helix.js"></script>
</head>
<body>
<section class="vh-100 ">
  <div class="container-fluid ">
    <div class="row ">
      
      <div class="col-sm-6 text-white bg-dark " style="padding-bottom:em;">

        <div class="px-5 ms-xl-4">
          
          <span class="h1 fw-bold mb-0">
            <l-helix
            size="60"
            speed="6.7"
            color="hsla(228, 100%, 50%, 1)" 
          ></l-helix>
        </span>
        </div>

        <div class="d-flex align-items-center px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form style="width: 23rem;" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Admin</h3>

            <div data-mdb-input-init class="form-outline mb-4">
              <input type="text" id="form2Example18" class="form-control form-control-lg" name="username"/>
              <label class="form-label" for="form2Example18" >Username</label>
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" name="password"/>
              <label class="form-label" for="form2Example28" >Password</label>
              <?php
              include("auth.php");
              ?>
            </div>
            
            <div class="pt-1 mb-4">
              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" type="submit" name="submit" value="login">Login</button>
            </div>
          </form>

        </div>

      </div>
      
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="pxfuel.jpg"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
