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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE productos SET Nombre=%s, Precio=%s, Descripcion=%s, imagen=%s WHERE IDProducto=%s",
                       GetSQLValueString($_POST['textfield'], "text"),
                       GetSQLValueString($_POST['textfield2'], "double"),
                       GetSQLValueString($_POST['textfield3'], "text"),
                       GetSQLValueString($_POST['textfield4'], "text"),
                       GetSQLValueString($_POST['IDProducto'], "int"));

  mysql_select_db($database_panaderia, $panaderia);
  $Result1 = mysql_query($updateSQL, $panaderia) or die(mysql_error());

  $updateGoTo = "consultageneral.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['car'])) {
  $colname_Recordset1 = $_GET['car'];
}
mysql_select_db($database_panaderia, $panaderia);
$query_Recordset1 = sprintf("SELECT * FROM productos WHERE IDProducto = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $panaderia) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset1 = "-1";
if (isset($_GET['car'])) {
  $colname_Recordset1 = $_GET['car'];
}
mysql_select_db($database_panaderia, $panaderia);
$query_Recordset1 = sprintf("SELECT * FROM productos WHERE IDProducto = %s ORDER BY IDProducto ASC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $panaderia) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

$colname_Modificar = "-1";
if (isset($_GET['M'])) {
  $colname_Modificar = $_GET['M'];
}
mysql_select_db($database_panaderia, $panaderia);
$query_Modificar = sprintf("SELECT * FROM productos WHERE IDProducto = %s ORDER BY IDProducto ASC", GetSQLValueString($colname_Modificar, "int"));
$Modificar = mysql_query($query_Modificar, $panaderia) or die(mysql_error());
$row_Modificar = mysql_fetch_assoc($Modificar);
$colname_Modificar = "-1";

 
mysql_select_db($database_panaderia, $panaderia);
$query_Modificar = sprintf("SELECT * FROM productos WHERE IDProducto = %s ORDER BY IDProducto ASC", GetSQLValueString($colname_Modificar, "int"));
$Modificar = mysql_query($query_Modificar, $panaderia) or die(mysql_error());
$row_Modificar = mysql_fetch_assoc($Modificar);
$totalRows_Modificar = "-1";
if (isset($_GET['M'])) {
  $totalRows_Modificar = $_GET['M'];
}
$colname_Modificar = "-1";

mysql_select_db($database_panaderia, $panaderia);
$query_Modificar = sprintf("SELECT * FROM productos WHERE IDProducto = %s ORDER BY IDProducto ASC", GetSQLValueString($colname_Modificar, "int"));
$Modificar = mysql_query($query_Modificar, $panaderia) or die(mysql_error());
$row_Modificar = mysql_fetch_assoc($Modificar);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar</title>
<link rel="stylesheet" type="text/css" href="css/modstyle2.css">
</head>

<body>
<div class="container">
<img src="images/191.png" />
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <div class="form-input">
  <p>
    <label for="IDProducto3">ID producto</label>
    <input name="IDProducto" placeholder="ID Producto" type="text" id="IDProducto3" value="<?php echo $row_Recordset1['IDProducto']; ?>" />
  </p>
  <p>
    <label for="textfield11">Nombre</label>
        <input name="textfield" placeholder="Nombre" type="text" id="textfield11" value="<?php echo $row_Recordset1['Nombre']; ?>" />
  </p>
  <p>
    <label for="textfield12">Precio</label>
    <input name="textfield2" placeholder="Precio" type="text" id="textfield12" value="<?php echo $row_Recordset1['Precio']; ?>" />
  </p>
  <p>
    <label for="textfield13">Descripcion</label>
    <input name="textfield3" placeholder="Descripcion" type="text" id="textfield13" value="<?php echo $row_Recordset1['Descripcion']; ?>" />
  </p>
  <p>
    <label for="textfield14">Imagen</label>
    <input name="textfield4" placeholder="Imagen" type="text" id="textfield14" value="<?php echo $row_Recordset1['imagen']; ?>" />
  </p>
  <p>
    <input name="modificar" type="hidden" id="modificar" value="<?php echo $row_Recordset1['IDProducto']; ?>" />
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Enviar" class="bin-send" />
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <input type="hidden" name="MM_update" value="form1" />
</form>
</div>
</div>



</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
