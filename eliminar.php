<?php require_once('Connections/panaderia.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if ((isset($_POST['eliminar'])) && ($_POST['eliminar'] != "")) {
  $deleteSQL = sprintf("DELETE FROM productos WHERE IDProducto=%s",
                       GetSQLValueString($_POST['eliminar'], "int"));

  mysql_select_db($database_panaderia, $panaderia);
  $Result1 = mysql_query($deleteSQL, $panaderia) or die(mysql_error());

  $deleteGoTo = "consultageneral.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['los'])) {
  $colname_Recordset1 = $_GET['los'];
}
mysql_select_db($database_panaderia, $panaderia);
$query_Recordset1 = sprintf("SELECT * FROM productos WHERE IDProducto = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $panaderia) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eliminar</title>
<link rel="stylesheet" type="text/css" href="css/modstyle3.css">
</head>
<body>
<div class="container">
<img src="images/191.png" />
<table width="200" border="0" align="center">
  <tr>
    <td height="46">ID Producto</td>
    <td><form id="form1" name="form1" method="post" action="">
      <label for="textfield"></label>
      <input name="textfield" type="text" id="textfield" value="<?php echo $row_Recordset1['IDProducto']; ?>" />
    </form></td>
  </tr>
  
  <tr>
    <td height="27">Nombre</td>
    <td><form id="form2" name="form2" method="post" action="">
      <label for="textfield2"></label>
      <input name="textfield2" type="text" id="textfield2" value="<?php echo $row_Recordset1['Nombre']; ?>" />
    </form></td>
  </tr>
  <br/>
  <tr>
    <td height="30">Precio</td>
    <td><form id="form3" name="form3" method="post" action="">
      <label for="textfield3"></label>
      <input name="textfield3" type="text" id="textfield3" value="<?php echo $row_Recordset1['Precio']; ?>" />
    </form></td>
  </tr>
  <tr>
    <td height="29">Descrpcion</td>
    <td><form id="form4" name="form4" method="post" action="">
      <label for="textfield4"></label>
      <input name="textfield4" type="text" id="textfield4" value="<?php echo $row_Recordset1['Descripcion']; ?>" />
    </form></td>
  </tr>
  <tr>
    <td height="30">Imagen</td>
    <td><form id="form5" name="form5" method="post" action="">
      <label for="textfield5"></label>
      <input name="textfield5" type="text" id="textfield5" value="<?php echo $row_Recordset1['imagen']; ?>" />
    </form></td>
  </tr>
  <tr>
    <td height="84"><form id="form6" name="form6" method="post" action="">
      <input name="eliminar" type="hidden" id="eliminar" value="<?php echo $row_Recordset1['IDProducto']; ?>" />
      <input type="submit" name="button" id="button" value="Eliminar" class="bin-send"/>
    </form></td>
    <td><form id="form7" name="form7" method="post" action="consultageneral.php">
      <input type="submit" name="button2" id="button2" value="Cancelar"  class="bin-send"/>
    </form></td>
  </tr>
</table>

</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
