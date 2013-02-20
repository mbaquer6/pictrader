<?php
$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/jpg"))
&& ($_FILES["file"]["size"] < 200000000)
&& in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        $shafilename = sha1_file($_FILES["file"]["name"])."." . $extension;
	$path = "/Users/miguelbaquero/files/";
	$imagename = $_FILES["file"]["name"];
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Temp file: " . $shafilename . "<br>";

        if (file_exists("/Users/miguelbaquero/files/" .$shafilename))
        {
            echo $shafilename. " already exists. ";
        }
        else
        {
            if($conexion = mysql_connect('192.168.2.61', 'admin', '12345678'))
            {
                mysql_select_db('pictrader',$conexion);
                $sql = "INSERT INTO tbl_ImageList (ID, UserID, ImageName, Date,FS_location)
                VALUES (NULL, 2, '".$imagename."',CURRENT_TIMESTAMP,'".$path.$shafilename."');";
                mysql_query($sql);
                move_uploaded_file($_FILES["file"]["tmp_name"], $path .$shafilename);
                echo "Stored in: " . "/Users/miguelbaquero/files/" .$shafilename;
            }
      
            else
            {
                echo "Problema conexión base de datos.";
            }
        }
    }
}
else
{
    echo "Invalid file";
}