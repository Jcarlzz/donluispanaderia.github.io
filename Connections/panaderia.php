<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_panaderia = "localhost";
$database_panaderia = "panaderia";
$username_panaderia = "root";
$password_panaderia = "root";
$panaderia = mysql_pconnect($hostname_panaderia, $username_panaderia, $password_panaderia) or trigger_error(mysql_error(),E_USER_ERROR); 
?>