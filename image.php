<?php
    $imageID = $_GET['id'];
 
    // Get the image from the database
    $conexion = mysql_connect('localhost', 'root', '');
    mysql_select_db('pictrader',$conexion);
    $result = mysql_query("SELECT FS_location from tbl_ImageList where ID = $imageID;") or die(mysql_error());
    //$result = "../pics/d6242e437e07ffc682690d54e845c50bbfca3417.jpg";

    //$result = mysql_query("SELECT * FROM my_image_table WHERE imageID = $imageID;") or die(mysql_error());
    //$image = mysql_fetch_array($result);
    $image = "../pics/d6242e437e07ffc682690d54e845c50bbfca3417.jpg";
    // assign some variables to make it prettier to read
    $name = $image['imageName'];
    $mime = $image['imageMime'];
    $data = $image['imageData'];
    $size = $image['imageSize'];
 
    // tell the browser what kind of file we're dealing with
    header("Content-type: $mime");
    header('Content-Disposition: attachment; filename="'.$name.'"');
    header("Content-Length: $size");
 
    // output the image
    print $data;
?>