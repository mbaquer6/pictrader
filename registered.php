<?php
session_start();
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
                        
                $user  = $_POST["User"];
                $pass  = $_POST["Password"]; 
                include 'connect.php';
                mysql_select_db('pictrader', $connection);
                $sql = "select count(User) from Tbl_Users where User = '$user'";
                
                $initial_query = mysql_query($sql) or die("SQL error");
                $num_sql = mysql_fetch_array($initial_query);
                $numrows = $num_sql[0];
                mysql_free_result($initial_query);

                
                if ($numrows!= 0)
                {
                    header('location: alreadyexists.php');
                }
                else
                {
                    $sql = "INSERT INTO tbl_Users (ID, User, Password, Firstname, Lastname) VALUES (NULL,     '" . $user . "', '" . $pass . "', '" . $pass . "', '" . $pass . "');";
                    mysql_query($sql);                  
                    header('location: registrationsuccess.php');
                    
                }
                mysql_close($connection);
?>