<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Your Video </title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Custom CSS for styling */
        body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }
        
         ul {
        list-style: none;
        padding: 0;
    }
    </style>
</head>
<body>
    <h1 class="mb-4 text-center">Upload Your Song!</h1>
    <div class="text-center">
    <h5>Supported Audio File Types:</h5>
    <ul>
        <li>MP3</li>
        <li>WAV</li>
        <li>AIFF</li>
        <li>OGG</li>
        <li>FLAC</li>
        <li>M4A</li>
    </ul>
</div>

<div class="text-center">
    <h5>Supported Image File Types:</h5>
    <ul>
        <li>JPG</li>
        <li>PNG</li>
        <li>GIF</li>
        <li>SVG</li>
    </ul>
</div>

<div class="text-center">
    <span>File Size: Up to 20MB per file.</span>
</div>

  <div id="progress" class="progress mt-4" style="display: none;">
    <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>

    <form action="upload" method="POST" enctype="multipart/form-data" class="container">
                        <div class="form-group">
                <label for="song_title"><i></i> Song Title:</label>
                <input type="text" class="form-control" id="song_title" name="song_title" required>
              </div>
              
    <div class="form-group">
    <label for="audio_path"><i class="fas fa-video"></i> Select audio File:</label>
    <input type="file" class="form-control" id="audio_file" name="audio_file" accept="audio/*" required>
</div>
     
            <div class="form-group">
                <label for="cover_image"><i class="fas fa-image"></i> Cover Image:</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*" required>
              </div>
              
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Upload Video</button>
        </div>
    </form>
    
   
<script>
 $(document).ready(function() {
    $('form').submit(function(e) {
        e.preventDefault(); // Prevent form submission

        var formData = new FormData(this);

        $.ajax({
            url: 'upload.php', //  upload endpoint
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        $('#progress').show();
                        $('#progress-bar').width(percentComplete + '%').attr('aria-valuenow', percentComplete).text(Math.round(percentComplete) + '%');

                        if (percentComplete === 100) {
                            // Redirect to the profile page
                            window.location.href = 'https://bookworms.com.ng/audiomack/dashboard/profile';
                        } 
                    }
                }, false);
                return xhr;
            },
            success: function(data) {
                if (data === 'success') {
                    // database insertion were successful
                    alert('Upload successful!');
                } 
                  setTimeout(function() {
                        location.reload(); // Refresh the page
                    }, 2000); // Wait for 2 seconds 
            }
        });
    });
});
</script>


    <?php
    ob_end_flush();
    ?> 
</body>
</html>

