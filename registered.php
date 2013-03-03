<html>
<head>
</head>
<body>
    <?php
session_start();
try
        {
                if ((strlen($_POST['User']) === 0) || $_POST['User'] === null)
                        {
                                throw new Exception("No username given", 12);
                        }
                if ((strlen($_POST['Password']) < 6))
                        {
                                throw new Exception("Password most be 6 chars min", 13);
                        }
                if ((strlen($_POST['ConfPass']) === 0) || $_POST['ConfPass'] === null)
                        {
                                throw new Exception("Confirm password", 14);
                        }
                if ($_POST['Password'] != $_POST['ConfPass'])
                        {
                                throw new Exception("Passwords doesn't match", 15);
                        }
                
                
                include 'connect.php';
                mysql_select_db('pictrader', $connection);
                
                $user  = $_POST["User"];
                $pass  = $_POST["Password"];
                $pass2 = $_POST["ConfPass"];
                
                if ($pass == $pass2)
                        {
                                
                                $sql = "INSERT INTO tbl_Users (ID, User, Password, Firstname, Lastname) VALUES (NULL,     '" . $user . "', '" . $pass . "', '" . $pass . "', '" . $pass . "');";
                                mysql_query($sql);
                        }
        }
catch (Exception $e)
        {
                $_SESSION['error']  = $e->getMessage();
                $_SESSION['errorn'] = $e->getCode();
                header('location: errores.php');
        }
?>

    </body>
</html>