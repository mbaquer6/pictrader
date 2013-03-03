<?php
$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG","JPEG", "GIF" );
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
        $shafilename = sha1_file($_FILES["file"]["tmp_name"])."." . $extension;
	$path = "../pics/";
	$imagename = $_FILES["file"]["name"];
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Temp file: " . $shafilename . "<br>";

        if (file_exists("../pics/" .$shafilename))
        {
            echo $shafilename. " already exists. ";
        }
        else
        {
                include 'connect.php';
                mysql_select_db('pictrader',$connection);
                $sql = "INSERT INTO tbl_ImageList (ID, UserID, ImageName, Date,FS_location)
                VALUES (NULL, 2, '".$imagename."',CURRENT_TIMESTAMP,'".$path.$shafilename."');";
                mysql_query($sql);
                mysql_close($connection);
                move_uploaded_file($_FILES["file"]["tmp_name"], $path .$shafilename);
                echo "Stored in: " . "../pics/" .$shafilename;
        }
    }
}
else
{
    echo "Invalid file";
}      }
      
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