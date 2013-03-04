<?php
session_start();
$_SESSION['timeout']=time();
	if ((strlen($_REQUEST['User'])!=0)||(strlen($_REQUEST['User'])!=NULL)) {
                $user = $_REQUEST['User'];
                $Password = $_REQUEST['Password'];
                if ($Password != NULL)
                {
                    include 'connect.php';
                    mysql_select_db('pictrader', $connection);
                    $_SESSION['myRequest']=8;
                    $sql = "select Password from Tbl_Users where User = '$user'";
                    $initial_query = mysql_query($sql) or die("SQL error");
                    $num_sql = mysql_fetch_array($initial_query);
                    $query = $num_sql[0];
                    if($query==$Password)
                    {
                        $_SESSION['User'] = $_POST['User'];
                        header('location: upload.php');
                        
                    }
                mysql_free_result($initial_query);
                }
                
                if($query!=$Password)
                {
                    header('location: LoginError.php');
                }
                if ($Password == NULL)
                {
                    header('location: LoginError.php');
                }
        }

?>