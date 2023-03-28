<?php require_once('Connections/XD.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO estudiante1 (ID_CLIENTE, NOMBRE, DIRECCION, TELEFONO) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID_CLIENTE'], "text"),
                       GetSQLValueString($_POST['NOMBRE'], "text"),
                       GetSQLValueString($_POST['DIRECCION'], "text"),
                       GetSQLValueString($_POST['TELEFONO'], "text"));

  mysql_select_db($database_XD, $XD);
  $Result1 = mysql_query($insertSQL, $XD) or die(mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
body {
	background-image: url(imagenes/23.jpg);
}
.inicio {
	font-size: xx-large;
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-weight: bold;
}
</style>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table width="472" height="304" align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ID_CLIENTE:</td>
      <td><input type="text" name="ID_CLIENTE" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">NOMBRE:</td>
      <td><input type="text" name="NOMBRE" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">DIRECCION:</td>
      <td><input type="text" name="DIRECCION" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">TELEFONO:</td>
      <td><input type="text" name="TELEFONO" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="870" height="44" border="1">
  <tr>
    <td width="140"><a href="PRIMERO.html">INICIO</a></td>
    <td width="128"><a href="segundo.html">ESPECIE</a></td>
    <td width="145"><a href="tercero.html">LUGARES</a></td>
    <td width="154"><a href="f1.php">FORMULARIO</a></td>
    <td width="120"><a href="123.html">CONTACTO</a></td>
    <td width="143"><p><a href="SLIDER.html">SLIDER</a></p></td>
  </tr>
</table>
<p class="inicio"><a href="base.html"> MENU</a></p>
</body>
</html>
