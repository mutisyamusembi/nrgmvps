<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "id16319181_mutisya";
$dbPassword = "9p+[p4lwaq^GsB(S";
$dbName     = "id16319181_nrgmvps";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$statusMsg = '';

// File upload path for pictures
$targetDirPic = "photos/";
$fileNamePic = basename($_FILES["img"]["name"]);
$targetFilePathPic = $targetDirPic . $fileNamePic;
$fileTypePic = pathinfo($targetFilePathPic,PATHINFO_EXTENSION);

// File upload path for Media
$targetDirMedia = "media/";
$fileNameMedia = basename($_FILES["file"]["name"]);
$targetFilePathMedia = $targetDirMedia . $fileNameMedia;
$fileTypeMedia = pathinfo($targetFilePathMedia,PATHINFO_EXTENSION);

if(isset($_POST["submit"])){

    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['number']);
    $link = mysqli_real_escape_string($db, $_POST['link']);
   

    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePathMedia) && move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePathPic) ){
        $query = "INSERT INTO submissions (name, email, phone, profile_photo, link, media)
        VALUES('$name','$email','$phone', '$fileNamePic', '$link','$fileNameMedia')";
        if (mysqli_query($db, $query)) {
            header('location: success.php');
           
        }
    }

}





?>