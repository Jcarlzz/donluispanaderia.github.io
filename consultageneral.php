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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_CONSULTA = 3;
$pageNum_CONSULTA = 0;
if (isset($_GET['pageNum_CONSULTA'])) {
  $pageNum_CONSULTA = $_GET['pageNum_CONSULTA'];
}
$startRow_CONSULTA = $pageNum_CONSULTA * $maxRows_CONSULTA;

mysql_select_db($database_panaderia, $panaderia);
$query_CONSULTA = "SELECT * FROM productos";
$query_limit_CONSULTA = sprintf("%s LIMIT %d, %d", $query_CONSULTA, $startRow_CONSULTA, $maxRows_CONSULTA);
$CONSULTA = mysql_query($query_limit_CONSULTA, $panaderia) or die(mysql_error());
$row_CONSULTA = mysql_fetch_assoc($CONSULTA);

if (isset($_GET['totalRows_CONSULTA'])) {
  $totalRows_CONSULTA = $_GET['totalRows_CONSULTA'];
} else {
  $all_CONSULTA = mysql_query($query_CONSULTA);
  $totalRows_CONSULTA = mysql_num_rows($all_CONSULTA);
}
$totalPages_CONSULTA = ceil($totalRows_CONSULTA/$maxRows_CONSULTA)-1;

$queryString_CONSULTA = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_CONSULTA") == false && 
        stristr($param, "totalRows_CONSULTA") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_CONSULTA = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_CONSULTA = sprintf("&totalRows_CONSULTA=%d%s", $totalRows_CONSULTA, $queryString_CONSULTA);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Consulta General</title>
<link rel="stylesheet" type="text/css" href="css/modstyle.css">

<style type="text/css">
#apDiv1 {
	position:absolute;
	width:124px;
	height:60px;
	z-index:1;
	left: 323px;
	top: 366px;
}
</style>
</head>
<body>
<table width="180%" border="0" cellpadding="20px">
  <tr>
      <th>Id Producto</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Descripcion</th>
      <th>Imagen</th>
      <th>Modificar</th>
      <th>Eliminar</th>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_CONSULTA['IDProducto']; ?></td>
        <td><?php echo $row_CONSULTA['Nombre']; ?></td>
        <td><?php echo $row_CONSULTA['Precio']; ?></td>
        <td><?php echo $row_CONSULTA['Descripcion']; ?></td>
        <td><?php echo $row_CONSULTA['imagen']; ?></td>
        <td><a href="modificar.php?car=<?php echo $row_CONSULTA['IDProducto']; ?>"><img src="images/write.png" width="51" height="51" /></a></td>
        <td><a href="eliminar.php?los=<?php echo $row_CONSULTA['IDProducto']; ?>"><img src="images/delete.png" width="51" height="51" /></a></td>
      </tr>
      <?php } while ($row_CONSULTA = mysql_fetch_assoc($CONSULTA)); ?>
</table>
</p>
<div id="apDiv1">
  <table border="0">
    <tr>
      <td><?php if ($pageNum_CONSULTA > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_CONSULTA=%d%s", $currentPage, 0, $queryString_CONSULTA); ?>"><img src="First.gif" /></a>
      <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_CONSULTA > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_CONSULTA=%d%s", $currentPage, max(0, $pageNum_CONSULTA - 1), $queryString_CONSULTA); ?>"><img src="Previous.gif" /></a>
      <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_CONSULTA < $totalPages_CONSULTA) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_CONSULTA=%d%s", $currentPage, min($totalPages_CONSULTA, $pageNum_CONSULTA + 1), $queryString_CONSULTA); ?>"><img src="Next.gif" /></a>
      <?php } // Show if not last page ?></td>
      <td><?php if ($pageNum_CONSULTA < $totalPages_CONSULTA) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_CONSULTA=%d%s", $currentPage, $totalPages_CONSULTA, $queryString_CONSULTA); ?>"><img src="Last.gif" /></a>
      <?php } // Show if not last page ?></td>
    </tr>
  </table>
</div>


</body>
</html>
<?php
mysql_free_result($CONSULTA);
?>
