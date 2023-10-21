<?php
ob_start();
session_start();

$host = "localhost";
$username = "bookworm_store";
$password = "1998.1989lawp";
$database = "bookworm_data";

$connection = mysqli_connect($host, $username, $password);

if (mysqli_connect_errno()) {
    echo(mysqli_connect_error());
    die();
}

mysqli_select_db($connection, $database);
if (mysqli_errno($connection)) {
    echo(mysqli_error($connection));
    die();
}

if (!isset($_SESSION['ID'])) {
    header('Location: https://bookworms.com.ng/audiomack/login.php');
    exit;
}

$userId = $_SESSION['ID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['audio_file']) && $_FILES['audio_file']['error'] === UPLOAD_ERR_OK && isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['audio_file']['tmp_name'];
        $destination = "audio/" . $_FILES['audio_file']['name'];

        if (move_uploaded_file($file_tmp, $destination)) {
            $audio_path = mysqli_real_escape_string($connection, $destination);

            $cover_image_tmp = $_FILES['cover_image']['tmp_name'];
            $cover_image_destination = "cover_images/" . $_FILES['cover_image']['name'];

            if (move_uploaded_file($cover_image_tmp, $cover_image_destination)) {
                $cover_image = mysqli_real_escape_string($connection, $cover_image_destination);
                 $song_title = mysqli_real_escape_string($connection, $_POST['song_title']);

                $sql = "INSERT INTO audio (audio_path, cover_image, user_id, song_title) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_prepare($connection, $sql);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "ssis", $audio_path, $cover_image, $userId, $song_title);

                    if (mysqli_stmt_execute($stmt)) {
                        header('Location: https://bookworms.com.ng/audiomack/dashboard/profile');
                        exit;
                    } else {
                        echo "Error uploading audio.";
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error preparing SQL statement.";
                }
            } else {
                echo "Error moving the uploaded cover image file.";
            }
        } else {
            echo "Error moving the uploaded audio file.";
        }
    } else {
        echo "Error uploading the files.";
    }
}

mysqli_close($connection);
ob_end_flush();
?>
