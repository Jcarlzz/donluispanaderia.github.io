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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO productos (IDProducto, Nombre, Precio, Descripcion, imagen) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['textfield'], "int"),
                       GetSQLValueString($_POST['textfield2'], "text"),
                       GetSQLValueString($_POST['textfield3'], "double"),
                       GetSQLValueString($_POST['textfield4'], "text"),
                       GetSQLValueString($_POST['textfield5'], "text"));

  mysql_select_db($database_panaderia, $panaderia);
  $Result1 = mysql_query($insertSQL, $panaderia) or die(mysql_error());

  $insertGoTo = "consultageneral.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Regisproducto</title>
<link rel="stylesheet" type="text/css" href="css/modstyle4.css">
</head>
<body>
<div class="container" >
<img src="images/191.png" class="shadown"/>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table  align="center" width="296" height="192" border="0">
    <tr>
      <td width="137" height="34">ID Producto</td>
      <td width="175"><label for="textfield2"></label>
      <input type="text" name="textfield" placeholder="ID Producto" id="textfield2" /></td>
    </tr>
    <tr>
      <td height="36">Nombre</td>
      <td><label for="textfield3"></label>
      <input type="text" name="textfield2" placeholder="Nombre" id="textfield3" /></td>
    </tr>
    <tr>
      <td height="36">Precio</td>
      <td><label for="textfield4"></label>
      <input type="text" name="textfield3" placeholder="Precio" id="textfield4" /></td>
    </tr>
    <tr>
      <td height="45">Descripcion</td>
      <td><label for="textfield5"></label>
      <input type="text" name="textfield4" placeholder="Descripcion" id="textfield5" /></td>
    </tr>
    <tr>
      <td>Imagen</td>
      <td><label for="textfield6"></label>
      <input type="text" name="textfield5" placeholder="Imagen" id="textfield6" /></td>
    </tr>
  </table>
  <p>
    <input type="submit" name="button" id="button" value="Guardar"  class="bin-send" />
    
  </p>
  <p>&nbsp;</p>
  <p>
    <input type="hidden" name="MM_insert" value="form1" />
</p>
</form>



</div>
</body>
</html>