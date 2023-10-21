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
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 8px;
        width: 100%;
    }

    /* Style the submit button */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    /* Style the link */
    .text-primary {
        color: #007bff;
    }
</style>
</head>
<body>
<form method="post" action="register-processor">
<div class="container d-flex flex-column">
      <div class="row align-items-center justify-content-center p-5">
        <div class="col-12 col-md-8 col-lg-4">
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="mb-4">
              <h3 class="text-primary text-center">Create Account</h3>
              
<div class="form-group">
    <label for="text"><i class="fas fa-user"></i> First Name:</label>
    <input type="text" class="form-control" name="FNAME" required>
</div>

<div class="form-group">
    <label for="text"><i class="fas fa-user"></i> Last Name:</label>
    <input type="text" class="form-control" name="LNAME" required>
</div>

<div class="form-group">
    <label for="email"><i class="fas fa-envelope"></i> Email address:</label>
    <input type="email" class="form-control" name="EMAIL" required>
</div>


<div class="form-group">
    <label for="PHONE"><i class="fas fa-phone"></i> Phone Number:</label>
    <input type="tel" class="form-control" name="PHONE" required>
</div>

<div class="form-group">
    <label for="FACEBOOK"><i class="fab fa-facebook"></i> Facebook:</label>
    <input type="url" class="form-control" placeholder="http://facebook.com/user" name="facebook">
</div>

<div class="form-group">
    <label for="TWITTER"><i class="fab fa-twitter"></i> Twitter:</label>
    <input type="url" class="form-control" placeholder="http://twitter.com/user" name="twitter">
</div>

<div class="form-group">
    <label for="INSTAGRAM"><i class="fab fa-instagram"></i> Instagram:</label>
    <input type="url" class="form-control" placeholder="http://instagram.com/user" name="instagram">
</div>



<div class="form-group">
    <label for="PASSWORD"><i class="fas fa-lock"></i> Password:</label>
    <input type="password" class="form-control" name="PASSWORD" required>
</div>

<div class="form-group">
    <label for="PASSWORD"><i class="fas fa-lock"></i> Confirm Password:</label>
    <input type="password" class="form-control" name="CONFIRM_PASSWORD" required>
</div>

<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" required>
    <label class="form-check-label" for="check1">I agree to all <a href="#">Terms of Service</a></label>
</div>

<div class="d-grid gap-2">
    <button type="submit" name="sent" class="btn btn-primary"><i class="fas fa-user-plus"></i> Create Account</button>
</div>

<p class="text-center mt-1">Already have an account?
    <a href="login"><span class="text-primary">Sign in</span></a>
</p>
            </div>
          </div>
        </div>
      </div>
</div>
</form>



<!-- jQuery library -->   
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
ob_end_flush();
?>
</body>
</html>