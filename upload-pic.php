<?php 
require_once 'lib/init.php';

if (!Access::check('interface','100')) {
    UI::access_denied();
    exit();
}

UI::show_header();

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $file = preg_replace('/\s+/', '_',basename($_FILES["fileToUpload"]["name"]));
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir. time().$file)) {
        echo "Uploaded Successfully";
        echo '<form action="'.AmpConfig::get('web_path').'/admin/users.php?action=show_upload_photos" name="form">
                <input type="submit" value="Upload More Images" name="submit"/></form>';
        // require_once AmpConfig::get('prefix') . UI::find_template('photo_upload.inc.php');
        // foreach(glob($target_dir.'*.*') as $file) {
        //     $file = AmpConfig::get('web_path').'/'.$file;
        //     echo $file;
        //     echo "<img src='". $file."' width='20%' height='20%' style='margin:20px;' />";
        // }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

/* Show the footer */
UI::show_footer();
?>