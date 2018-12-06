<?php
  $allowedExts = array("gif", "jpeg", "jpg", "png");
  $temp = explode(".", $_FILES["file"]["name"]);
  $extension = end($temp);
  $extension = strtolower($extension);
  $uploadFolder = dirname(__FILE__) . "/uploadimages";
  echo $_FILES["file"]["name"] . "<br>";
  echo "<hr>";
  if ((($_FILES["file"]["type"] == "image/gif")
      || ($_FILES["file"]["type"] == "image/jpeg")
      || ($_FILES["file"]["type"] == "image/jpg")
      || ($_FILES["file"]["type"] == "image/pjpeg")
      || ($_FILES["file"]["type"] == "image/png"))
      && ($_FILES["file"]["size"] < 500000)
      && in_array($extension, $allowedExts)) {
            if ($_FILES["file"]["error"] > 0) {
                        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
            } else {
                        if (file_exists("uploadimages/" . $_FILES["file"]["name"])) {
                                    echo '<p><hr>';
                                    echo $_FILES["file"]["name"] . " already exists. ";
                                    echo '<p><hr>';
                                    $offpic = "NULL";
                        } else {
                                    move_uploaded_file($_FILES["file"]["tmp_name"],"uploadimages/" . $_FILES["file"]["name"]);
                                    $offpic = "upload/" . $_FILES["file"]["name"];
                        } // end of else
            } // end of else
     } else {
           echo "Invalid file";
            if ($_FILES["file"]["size"] > 500000) {
                echo "<h1> Your image is too large! </h1>";
            }
            $offpic = "NULL";

    } //end of else
?>
