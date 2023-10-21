<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<style>
    .myspace{
        margin-Top: 10px;
    }
    audio {
  width: 80%; /* Make the audio player take up the full width of its container */
  margin-top: 10px; /* Add some space between the audio player and other elements */
}

/* Style the audio controls */
audio::-webkit-media-controls-panel {
  background-color: #f8f8f8; /* Background color of the controls */
  color: #333; /* Color of the controls */
  border-radius: 8px; /* Rounded corners for the controls */
  font-size: 14px; /* Font size of the controls */
  padding: 10px; /* Padding around the controls */
}

/* Style the individual control buttons */
audio::-webkit-media-controls-play-button,
audio::-webkit-media-controls-pause-button {
  background-color: #333; /* Background color of play/pause button */
  border: none; /* Remove border */
  border-radius: 50%; /* Make it a circle */
  cursor: pointer;
}

/* Style the time display */
audio::-webkit-media-controls-current-time-display,
audio::-webkit-media-controls-time-remaining-display {
  font-size: 12px; /* Font size of the time display */
  color: #333; /* Color of the time display */
}

  .v-play {
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        .v-play img {
            max-width: 100%;
            height: auto;
        }
        
        .v-play audio {
            width: 100%;
        }
</style>
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

mysqli_close($connection);
?>
 
 
  <header>
  <div class="drawer" id="drawer">
    <i class="bi bi-x" onclick="toggleDrawer()"></i>
    <div class="logo-icon">
       <img src="/audiomack/images/audio-logo.png"/>
    </div>
    <ul class="custom-list">
    <li class="custom-list-item"><i class="bi bi-house-door"></i> Home</li>
    </ul>
    <ul class="custom-list">
    <li class="custom-list-item"><i class="bi bi-cloud-upload"></i> Upload Song</li>
    </ul>
    <ul class="custom-list">
    <li class="custom-list-item"><i class="bi bi-music-note-list"></i> Top Songs</li>
    </ul>
    <ul class="custom-list">
    <li class="custom-list-item"><i class="bi bi-record"></i> Top Albums</li>
    </ul>
    <ul class="custom-list">
        <li class="custom-list-item"><i class="bi bi-person"></i> My Account</li>
    </ul>
    <ul class="custom-list">
    <li class="custom-list-item"><i class="bi bi-question"></i> Support</li>
    </ul>
</div>

<div class="drawer-toggler" onclick="toggleDrawer()">
    <i class="bi bi-list"></i>
</div>


      
      <div class="search-bar">
        <i class="bi bi-search"></i>
        <input type="search" class="form-control hide-placeholder"/>
      </div>
      <div class="all">
        <div class="login">
          <a href="login.php">Login</a>
          <p>/</p>
          <a href="register.php">Create Account</a>
        </div>
      </div>
      
      <div class="btn">
         <a href="login.php">
              <i class="bi bi-cloud-arrow-up upload"></i>
          <p>upload</p>
         </a>
        </div>
    </header>


    <section class="hero">
      <h1>Audiomack is here to <br />move music forward</h1>
      <p>
        Audiomack is a <b>FREE</b>, limitless music sharing and discovery
        <br />platform for <b>artists,tastemakers, labels and fans.</b>
      </p>
      <br />
      <div class="btns">
        <a href="#"><img src="./images/appstore.png" alt="" /></a>
        <a href="#"><img src="./images/googleplay.png" alt="" /></a>
      </div>
      <br />
      <div class="explore">
        <b>EXPLORE FEATURES FOR:</b>
        <ul>
          <li class="first"><a href="#">Artists</a></li>
          <li><a href="#">Listeners</a></li>
          <li><a href="#">Labels</a></li>
          <li><a href="#">Podcasters</a></li>
        </ul>
      </div>
    </section>


    <section class="verified-playlists">
      <div class="verified-play">
        <i class="bi bi-fire"></i>
        <b>Top Songs</b>
      </div>
      <div class="very-play">
        <?php
$host = "localhost";
$username = "bookworm_store";
$password = "1998.1989lawp";
$database = "bookworm_data";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT user.*, audio.audio_path, audio.cover_image, audio.song_title
        FROM user
        INNER JOIN (
            SELECT MAX(audio_id) as latest_audio_id, user_id
            FROM audio
            GROUP BY user_id
        ) latest_audio ON user.ID = latest_audio.user_id
        INNER JOIN audio ON latest_audio.latest_audio_id = audio.audio_id
        LIMIT 4";
        
$result = mysqli_query($connection, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $fname = $row['FNAME'];
    $lname = $row['LNAME'];
    $phone = $row['PHONE'];
    $email = $row['EMAIL'];
    $facebook = $row['facebook'];
    $twitter = $row['twitter'];
    $instagram = $row['instagram'];
    $audio_path = $row['audio_path'];
    $cover_image = $row['cover_image'];
    $song_title = $row['song_title'];
    
  
echo '<div class="v-play">';
echo '<figure>';
echo '<img class="img" src="dashboard/' . $cover_image . '" alt="' . $fname . ' ' . $lname . '" />';
echo '<figcaption>';
echo '<b>Verified: music</b>';
echo '<p>Title <a href="#">' . $song_title . '</a></p>';
echo '<p>By <a href="#">' . $fname . ' ' . $lname . '</a></p>';
// Embedding the audio element
echo '<audio controls>';
echo '<source src="dashboard/' . $audio_path . '" type="audio/mpeg">';
echo 'Your browser does not support the audio element.';
echo '</audio>';
echo '</figcaption>';
echo '</figure>';
echo '</div>';

}

mysqli_close($connection);
?>
</div>
</section>

    <section class="myspace">  </section>

    <section class="hero">
    <div class="verified-play">
        <i class="bi bi-fire"></i>
        <b>Verified Series</b>
        <p>Playlists</p>
      </div>
      <div class="very-play">
        <div class="v-play">
          <figure>
            <img src="./images/hippop.jpeg" alt="" />
            <figcaption>
              <b>Verified: Hip-Hop</b>
              <p>Total Songs:<a href="#">105</a></p>
              <p>by<a href="#">Audiomack Hip-Hop</a></p>
            </figcaption>
          </figure>
        </div>
        <div class="v-play">
          <figure>
            <img src="./images/afro-sounds.jpeg" alt="" />
            <figcaption>
              <b>Verified: Afrosounds</b>
              <p>Total Songs:<a href="#">100</a></p>
              <p>by<a href="#">Audiomack Africa</a></p>
            </figcaption>
          </figure>
        </div>
        <div class="v-play">
          <figure>
            <img src="./images/musica.jpeg" alt="" />
            <figcaption>
              <b>Verified: Musica Urban</b>
              <p>Total Songs:<a href="#">103</a></p>
              <p>by<a href="#">Audiomack Hip-Latin</a></p>
            </figcaption>
          </figure>
        </div>
        <div class="v-play">
          <figure>
            <img src="./images/R&B.jpeg" alt="" />
            <figcaption>
              <b>Verified: R&B</b>
              <p>Total Songs:<a href="#">102</a></p>
              <p>by<a href="#">Audiomack R&B</a></p>
            </figcaption>
          </figure>
        </div>
      </div>
    </section>

    <section class="f-links">
      <div class="ff-links">
        <div class="f-link1">
          <a href="#" id="image"
            ><img src="./images/Audio-logo.png" alt=""
          /></a>
          <p>Copyright © 2023</p>
          <p>648 Broadway 3rd Floor <br />New York, NY 10012</p>
        </div>
        <div class="f-link1">
          <b>Browse</b> <br />
          <a href="#">Home</a>
          <a href="#">Trending</a>
          <a href="#">Top Songs</a>
          <a href="#">Top Albums</a><a href="#">Supporter</a>
          <a href="#">Playlists</a>
          <a href="#">Accounts for You</a>
          <a href="#">Recently Added</a>
        </div>
        <div class="f-link1">
          <b>About</b> <br />
          <a href="#">Contact/Support</a>
          <a href="#">About</a>
          <a href="#">Wordpress</a>
          <a href="#">Report a Vulnerability</a>
          <a href="#">Blog</a>
        </div>
        <div class="f-link1">
          <b>Resources</b> <br />
          <a href="#">Legal & DMCA</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Service</a>
          <a href="#">Press Kit</a>
          <a href="#">Style Guide</a>
        </div>
      </div>
    </section>
    <footer>
      <div class="foot">
        <div class="foot1">
          <b>Follow Us:</b>
          <a href="#"><i class="bi bi-facebook social"></i></a>
          <a target="_blank" href="https://twitter.com/therealobiora"
            ><i class="bi bi-twitter social"></i
          ></a>
          <a target="_blank" href="https://www.instagram.com/therealobiora_/"
            ><i class="bi bi-instagram social"></i
          ></a>
          <a href="#"><i class="bi bi-whatsapp social"></i></a>
        </div>
        <div class="foot2">
          <div class="footimg1">
            <a href="#"><img src="./images/appstore.png" alt="" /></a>
          </div>
          <div class="footimg2">
            <a href="#"><img src="./images/googleplay.png" alt="" /></a>
          </div>
        </div>
      </div>
    </footer>
<script>
function toggleDrawer() {
    const drawer = document.getElementById('drawer');
    drawer.style.left = (drawer.style.left === '0px') ? '-250px' : '0';
}

function toggleDrawer() {
    const drawer = document.getElementById('drawer');
    drawer.style.left = (drawer.style.left === '0px') ? '-250px' : '0';
}

</script>
</script>
<!-- Bootstrap JS (and Popper JS) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php
ob_end_flush();
?>
  </body>
</html>