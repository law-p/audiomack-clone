<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<title>Audiomack | Free Music Sharing and Discovery</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script src="https://kit.fontawesome.com/5c74e339b7.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<style>
     .upload-icon {
            font-size: 5em;
            color: #3498db;
             align-items: center;
        }
        .upload_song{
             font-size: 1em;
             text-align: center;
             font-weight: bold;
        }
</style>

 <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (!document.cookie.includes('refreshed')) {
                document.cookie = 'refreshed=true; max-age=5'; // Set a cookie for 5 seconds
                setTimeout(function() {
                    location.reload();
                }, 2000); // Refresh the page after 5 seconds 
            }
        });
    </script>
</head>


<body>
 <?php
// servername, username, password, database name
$host = "localhost";
$username = "bookworm_store";
$password = "1998.1989lawp";
$database = "bookworm_data";


// Check connection
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($connection, $database);
if (mysqli_errno($connection)) {
    echo(mysqli_error($connection));
    die();
} 


$sql = "SELECT * FROM user";

        
$result = mysqli_query($connection, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Access data using $row['column_name']
    $fname = $row['FNAME'];
    $lname = $row['LNAME'];
    $phone = $row['PHONE'];
    $email = $row['EMAIL'];
    $facebook = $row['facebook'];
    $twitter = $row['twitter'];
    $instagram = $row['instagram'];
    }
} else {
    echo "Error: " . mysqli_error($connection);
}


?>
   
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://bookworms.com.ng/audiomack/images/myprofile.png" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h6 class="my-3">Hello!</h6>
             <h5 class="my-3"><?php echo $fname . ' ' . $lname; ?></h5>
            </div>
          </div>
        </div>
        
         <div class="col-lg-2">
        <div class="card mb-4">
          <div class="card-body">
              <p class="upload_song">UPload Your song!</p>
            <hr>
            <div class="row">
              <div class="col-sm-9">
                  <a href="section"> <div class="upload-icon text-center">
                      <div class="text-center">
    <i class="fa fa-upload"></i>
</div>

                  </div></a>
              </div>
            </div>
            <hr>
            </div>
             </div>
              </div>
              
        <div class="col-lg-8">
        <div class="card mb-12">
          <div class="card-body">
             <p class="mb-4"><span class="text-primary font-italic me-2"></span>Your Content
                </p>
                 <hr>
<?php

// Check if the user is logged in
if(isset($_SESSION['ID'])) {
    // servername, username, password, database name
    $host = "localhost";
    $username = "bookworm_store";
    $password = "1998.1989lawp";
    $database = "bookworm_data";

    // Connect to the database
    $connection = mysqli_connect($host, $username, $password, $database);
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_select_db($connection, $database);
    if (mysqli_errno($connection)) {
        echo(mysqli_error($connection));
        die();
    } 

    $user_id = $_SESSION['ID'];

    $sql = "SELECT audio.*, user.*
            FROM audio
            JOIN user ON audio.user_id = user.ID
            WHERE user.ID = $user_id";

    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $song_title = $row['song_title'];
            $cover_image = $row['cover_image'];
            $audio_path = $row['audio_path'];
            $fname = $row['FNAME'];
            $lname = $row['LNAME'];
            $email = $row['EMAIL'];
            $phone = $row['PHONE'];
            $facebook = $row['facebook'];
            $twitter = $row['twitter'];
            $instagram = $row['instagram'];

            echo '<div class="col-lg-8 mx-auto">';
            echo '<figure>';
            echo '<p>Title <a href="#">' . $song_title . '</a></p>';
            echo '<img class="col-lg-8 img" src="' . $cover_image . '" alt="' . $fname . ' ' . $lname . '" />';
            echo '<figcaption>';
            echo '<audio controls class="col-lg-8">';
            echo '<source src="' . $audio_path . '" type="audio/mpeg">';
            echo 'Your browser does not support the audio element.';
            echo '</audio>';
            echo '</figcaption>';
            echo '</figure>';
            echo '</div>';
        }
    } else {
        echo "No content found.";
    }

    $connection->close();
} else {
    echo "User is not logged in.";
}
?>



            </div>
             </div>
              </div>
              
      
    </div>
  </div>
</section>

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
