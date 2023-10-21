<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css" rel="stylesheet">
<title>Audiomack | Free Music Sharing and Discovery</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="https://kit.fontawesome.com/5c74e339b7.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
<style>
  * {
  margin: 0%;
  padding: 0%;
  font-family: "Poppins", sans-serif;
}

body {
  background-color: #0d0d0d;
  width: 100%;
  height: 100%;
}

.bi-yellow {
    color: yellow !important;
}
.input-group-text{
  background-color: black;
}

</style>
</head>
<body>

<form method="post" action="loginprocessor" class="mt-5">
  <div class="container d-flex flex-column align-items-center">
    <div class="card shadow-sm">
      <div class="card-body p-5">
        <h4 class="text-primary text-center mb-4">Login Now</h4>
        <div class="form-group">
          <label for="EMAIL">Email address</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="bi bi-envelope bi-yellow"></i></span>
            </div>
            <input type="email" class="form-control" name="EMAIL" required>
          </div>
        </div>
        <div class="form-group">
          <label for="PASSWORD">Password</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="bi bi-lock bi-yellow"></i></span>
            </div>
            <input type="password" class="form-control" name="PASSWORD" required>
          </div>
        </div>
        <p class="text-center mt-4">Don't have an account?
          <a href="register"><span class="text-primary">Sign Up</span></a>
        </p>
        <a href="forgot-password.php"><p class="text-center text-primary">Forgot your password?</p></a>
        <button type="submit" name="sent" class="btn btn-dark btn-block mt-4">Submit</button>
      </div>
    </div>
  </div>
</form>


 
<!-- jQuery library -->   
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<?php
ob_end_flush();
?>
</body>
</html>