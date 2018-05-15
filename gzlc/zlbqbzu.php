<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>资料不齐</title>
</head>

<body>

<?php

switch ($_GET["bzu"]) {
  case 'zliao':
$sql="SELECT ppai,khao,bzu FROM gzlc where bzu like '%！%'";
$bti="资料问题汇总";
    break;

  case 'jge':
$sql="SELECT ppai,khao,bzu FROM gzlc where bzu like '%？%'";
$bti="价格问题汇总";
    break;
  
  default:
$sql="SELECT ppai,khao,bzu FROM gzlc where bzu like '%！%'";
    break;
}

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dsbgzhbao", $con);

$result = mysql_query($sql);

echo "<table border='1'  cellspacing='0' cellpadding='0'>
<tr  class='btlang btl1'>
  <th colspan='4' scope='col'>$bti</th>
</tr>
<tr class='btlang btl2'>
<th class='id'>序号</th>
<th class='ppai'>品牌</th>
<th class='khao'>款号</th>
<th class='bzu'>备注</th>
</tr>";
$pid=1;
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td class=id>" . $pid . "</td>";
  $pid=$pid+1;
  echo "<td class=ppai>" . $row['ppai'] . "</td>";
  echo "<td class=khao>" . $row['khao'] . "</td>";
  echo "<td class=bzu>" . $row['bzu']. "</td>";
  echo "</tr>";
  }
echo "</table>";
mysql_close($con);
?>
</body>

<style>
  td,th{height: 25px;font-size: 15px;padding: 5px 10px;}
</style>


</html>                                            