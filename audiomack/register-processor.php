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

$errors = array(); // Initialize an array to hold error messages

if (isset($_POST['sent'])) {
    $fname = mysqli_real_escape_string($connection, $_POST['FNAME']);
    $lname = mysqli_real_escape_string($connection, $_POST['LNAME']);
    $email = mysqli_real_escape_string($connection, $_POST['EMAIL']);
    $phone = mysqli_real_escape_string($connection, $_POST['PHONE']);
    $facebook = mysqli_real_escape_string($connection, $_POST['facebook']);
    $twitter = mysqli_real_escape_string($connection, $_POST['twitter']);
    $instagram = mysqli_real_escape_string($connection, $_POST['instagram']);
    $password = mysqli_real_escape_string($connection, $_POST['PASSWORD']);
    $confirmPassword = mysqli_real_escape_string($connection, $_POST['CONFIRM_PASSWORD']);

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $errors[] = "Oops... Passwords do not match.";
    } else {
        // Check for duplicate registration
        $duplicateCheckQuery = "SELECT * FROM `user` WHERE EMAIL='$email'";
        $duplicateCheckResult = mysqli_query($connection, $duplicateCheckQuery);

        if (mysqli_num_rows($duplicateCheckResult) > 0) {
            $errors[] = "Oops... This email is already registered.";
        } else {
            // Hash the password (for security) before storing it in the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Perform the database insertion
            $query = "INSERT INTO `user` (FNAME, LNAME, EMAIL, PHONE, PASSWORD, facebook, twitter, instagram ) VALUES ('$fname', '$lname', '$email', '$phone', '$hashedPassword', '$facebook', '$twitter', '$instagram')";
            $result = mysqli_query($connection, $query);

            if ($result) {
                $_SESSION['registration_success'] = true;
                header("Location: login.php");
                exit();
            } else {
                $errors[] = "Oops... Something went wrong. Please try again.";
            }
        }
    }
}

mysqli_close($connection);
?>


<!-- Display error messages if any -->
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach ($errors as $error): ?>
            <?php echo $error; ?><br>
        <?php endforeach; ?>
        <a href="login.php"> Login </a>
    </div>
<?php endif; ?>

<!-- jQuery library -->   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
ob_end_flush();
?>
</body>
</html>
