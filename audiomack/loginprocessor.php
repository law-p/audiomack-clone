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
</head>
<body>
<?php
include 'db.php'; 

if (isset($_POST['sent'])) {
    $email = mysqli_real_escape_string($connection, $_POST['EMAIL']);
    $password = mysqli_real_escape_string($connection, $_POST['PASSWORD']);
    
    $sql = "SELECT * FROM `user` WHERE EMAIL='$email'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($password, $row['PASSWORD'])) {
        $_SESSION["ID"] = $row['ID'];
        $_SESSION["EMAIL"] = $row['EMAIL'];
        $_SESSION["PASSWORD"] = $row['PASSWORD'];
        header("Location: dashboard/profile");
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">
        Oops... Invalid Email/Password. Please try again.
        <a href="login.php">Login</a>
        </div>';
    }
}

// commit the current transaction for the specified database connection
   mysqli_commit($connection);
//roll back the current transaction for the specified database connection
   mysqli_rollback($connection);
//close connection
   mysqli_close($connection);
?>

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

