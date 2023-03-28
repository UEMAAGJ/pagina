
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <p><img src="imagenes/i.jpg" width="754" height="487"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTvtX-5EYvFDxu5RxZHQPZWxMgr4bA4M7_Qrdnd2sHssGho58v6X30AWkSLEAmaOVo6_g&usqp=CAU" alt="Flora y fauna" width="566" height="399"/></p>
  <p>&nbsp;         </p>
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right">ID_CLIENTE:</td>
      <td><input type="text" name="ID_CLIENTE" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">NOMBRE:</td>
      <td><input type="text" name="NOMBRE" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">DIRECCION:</td>
      <td><input type="text" name="DIRECCION" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">TELEFONO:</td>
      <td><input type="text" name="TELEFONO" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insertar registro"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<?php require_once('Connections/alexandra.php'); ?>
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

  mysql_select_db($database_alexandra, $alexandra);
  $Result1 = mysql_query($insertSQL, $alexandra) or die(mysql_error());
}

$colname_Recordset1 = "-1";
if (isset($_GET['ID_CLIENTE'])) {
  $colname_Recordset1 = $_GET['ID_CLIENTE'];
}
mysql_select_db($database_alexandra, $alexandra);
$query_Recordset1 = sprintf("SELECT * FROM estudiante1 WHERE ID_CLIENTE = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $alexandra) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_free_result($Recordset1);
?>