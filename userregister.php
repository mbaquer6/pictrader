<?php

if ($conexion = mysql_connect('192.168.2.61','admin','12345678')){
  echo "Usuario nuevo creado";
  mysql_select_db('pictrader',$conexion);

 $userName = $_POST["nombre"];
 $pass = $_POST["password"];
 $pass2 = $_POST["password2"];

 if ($pass == $pass2){
   $sql = "INSERT INTO tbl_Users (ID, User, Password, Firstname, Lastname) VALUES (NULL, 	'".$userName."', '".$pass."', '".$pass."', '".$pass."');" ;
   mysql_query($sql);

 }else{
   echo "Las contraseñas no coinciden.";
}

  
}else{
  echo "Problema conexión base de datos.";

}


?>