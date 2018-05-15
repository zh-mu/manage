<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>-</title>
</head>

<body>
<?php

//工作流程 添加产品---------------------------------------------------------------

if ($_GET["where"]=="xzcp_a") {
$jge=0;
$zliao=0;
$tpian=0;
$yping=0;
$sxbiao=0;
$a=$_GET["zliao"];
for($i=0;$i<count($a);$i++)
{

if ($a[$i]=="11") {
$jge=1;
}

if ($a[$i]=="21") {
$zliao=1;
}

if ($a[$i]=="31") {
$tpian=1;
}

if ($a[$i]=="41") {
$yping=1;
}

if ($a[$i]=="51") {
$sxbiao=1;
}

}

echo $_GET["ppai"].$_GET["khao"].$_GET["bzu"];

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$d=date("Y-m-d");
$myq="INSERT INTO gzlc (ppai, khao,jge,zliao,tpian,yping,bzu,cjrqi) VALUES ('$_GET[ppai]', '$_GET[khao]',$jge,$zliao,$tpian,$yping,'$_GET[bzu]','$d')";
// echo $myq;
if (mysql_query($myq,$con))
  {

print "<script language=\"JavaScript\">\r\n";
print " alert(\"产品添加成功\");\r\n";
print " window.history.back();\r\n";
print "</script>";
exit;
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }

mysql_close($con);
}

//工作流程 资料更新---------------------------------------------------------------

if ($_GET["where"]=="ztcli_jge") {//更新价格
$id=$_GET["id"];
$yhu=$_COOKIE["yhu"];
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET jge=$yhu WHERE id =$id";
mysql_query($sql);
mysql_close($con);
// echo $sql;
print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-1);\r\n";
print "</script>";
exit;
}

if ($_GET["where"]=="ztcli_zliao") {//更新价格
$id=$_GET["id"];
$yhu=$_COOKIE["yhu"];
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET zliao=$yhu WHERE id =$id";
mysql_query($sql);
mysql_close($con);
// echo $sql;
print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-1);\r\n";
print "</script>";
exit;
}

if ($_GET["where"]=="ztcli_tpian") {//更新价格
$id=$_GET["id"];
$yhu=$_COOKIE["yhu"];
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET tpian=$yhu WHERE id =$id";
mysql_query($sql);
mysql_close($con);
// echo $sql;
print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-1);\r\n";
print "</script>";
exit;
}

if ($_GET["where"]=="ztcli_yping") {//更新价格
$id=$_GET["id"];
$yhu=$_COOKIE["yhu"];
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET yping=$yhu WHERE id =$id";
mysql_query($sql);
mysql_close($con);
// echo $sql;
print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-1);\r\n";
print "</script>";
exit;
}

if ($_GET["where"]=="ztcli_sxbiao") {//更新价格
$id=$_GET["id"];
$yhu=$_COOKIE["yhu"];
date_default_timezone_set('PRC');//设置默认时区；
$d=date("Y-m-d");
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET sxbiao=$yhu,sxbgxing='$d' WHERE id =$id";
mysql_query($sql);
mysql_close($con);
// echo $sql;
print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-1);\r\n";
print "</script>";
exit;
}

if ($_GET["where"]=="ztcli_pzao") {//更新价格
$id=$_GET["id"];
$yhu=$_COOKIE["yhu"];
date_default_timezone_set('PRC');//设置默认时区；
$d=date("Y-m-d");
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET pzao=$yhu,pzrqgxing='$d' WHERE id =$id";
mysql_query($sql);
mysql_close($con);
// echo $sql;
print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-1);\r\n";
print "</script>";
exit;
}

if ($_GET["where"]=="ztcli_pzshe") {//更新价格
$id=$_GET["id"];
$yhu=$_COOKIE["yhu"];
date_default_timezone_set('PRC');//设置默认时区；
$d=date("Y-m-d");
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET pzshe=$yhu,pzshgxing='$d' WHERE id =$id";
mysql_query($sql);
mysql_close($con);
// echo $sql;
print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-1);\r\n";
print "</script>";
exit;
}

if ($_GET["where"]=="ztcli_tsxt") {//更新价格
$id=$_GET["id"];
$yhu=$_COOKIE["yhu"];
date_default_timezone_set('PRC');//设置默认时区；
$d=date("Y-m-d");
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET tsxt=$yhu,tsxtgxing='$d' WHERE id =$id";
mysql_query($sql);
mysql_close($con);
// echo $sql;
print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-1);\r\n";
print "</script>";
exit;
}

if ($_GET["where"]=="ztcli_tsxtshe") {//更新价格
$id=$_GET["id"];
$yhu=$_COOKIE["yhu"];
date_default_timezone_set('PRC');//设置默认时区；
$d=date("Y-m-d");
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET tsxtshe=$yhu,tsxtshgxing='$d' WHERE id =$id";
mysql_query($sql);
mysql_close($con);
// echo $sql;
print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-1);\r\n";
print "</script>";
exit;
}

if ($_GET["where"]=="ztcli_tban") {//更新价格
$id=$_GET["id"];
$yhu=$_COOKIE["yhu"];
date_default_timezone_set('PRC');//设置默认时区；
$d=date("Y-m-d");
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET tban=$yhu,tbgxing='$d' WHERE id =$id";
mysql_query($sql);
mysql_close($con);
// echo $sql;
print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-1);\r\n";
print "</script>";
exit;
}

if ($_GET["where"]=="ztcli_tbshe") {//更新价格
$id=$_GET["id"];
$yhu=$_COOKIE["yhu"];
date_default_timezone_set('PRC');//设置默认时区；
$d=date("Y-m-d");
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET tbshe=$yhu,tbshgxing='$d' WHERE id =$id";
mysql_query($sql);
mysql_close($con);
// echo $sql;
print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-1);\r\n";
print "</script>";
exit;
}

if ($_GET["where"]=="ztcli_schuang") {//更新价格
$id=$_GET["id"];
$yhu=$_COOKIE["yhu"];
date_default_timezone_set('PRC');//设置默认时区；
$d=date("Y-m-d");
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET schuang=$yhu,scgxing='$d' WHERE id =$id";
mysql_query($sql);
mysql_close($con);
// echo $sql;
print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-1);\r\n";
print "</script>";
exit;
}

if ($_GET["where"]=="ztcli_scshe") {//更新价格
$id=$_GET["id"];
$yhu=$_COOKIE["yhu"];
date_default_timezone_set('PRC');//设置默认时区；
$d=date("Y-m-d");
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET scshe=$yhu,scshgxing='$d' WHERE id =$id";
mysql_query($sql);
mysql_close($con);
// echo $sql;
print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-1);\r\n";
print "</script>";
exit;
}

if ($_GET["where"]=="ztcli_ecshe") {//更新价格
$id=$_GET["id"];
$yhu=$_COOKIE["yhu"];
date_default_timezone_set('PRC');//设置默认时区；
$d=date("Y-m-d");
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET ecshe=$yhu,xgrqi='$d' WHERE id =$id";
mysql_query($sql);
mysql_close($con);
// echo $sql;
print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-1);\r\n";
print "</script>";
exit;
}

if ($_GET["where"]=="ztcli_bzu") {//更新价格
$id=$_GET["id"];
$yhu=dyxming($_COOKIE["yhu"]);
$ybzu=$_GET["ybzu"];
$bzu=$_GET["bzu"];
date_default_timezone_set('PRC');//设置默认时区；
$d=date("Y-m-d");
$xbzu=$ybzu.$bzu."  @".$yhu."(".$d.")";
$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$sql="UPDATE gzlc SET bzu='$xbzu' WHERE id =$id";
mysql_query($sql);
mysql_close($con);
echo $sql;
// print "<script language=\"JavaScript\">\r\n";
// print " alert(\"修改成功\");\r\n";
// print " window.history.go(-2);\r\n";
// print "</script>";
// exit;
}

//工作流程 工作进程更新---------------------------------------------------------------

if ($_GET["where"]=="lcztcli_r") {

$zt=$_GET['zt'];

echo $zt;

 $con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dsbgzhbao", $con);
date_default_timezone_set('PRC');//设置默认时区；
$d=date("Y-m-d");

switch ($zt) {
case 'pzao':
$gxrqi="pzrqgxing='$d'";
break;

case 'pzshe':
$gxrqi="pzshgxing='$d'";
break;

case 'tsxt':
$gxrqi="tsxtgxing='$d'";
break;

    case 'tsxtshe':
$gxrqi="tsxtshgxing='$d'";
    break;

    case 'tban':
$gxrqi="tbgxing='$d'";
    break;

    case 'tbshe':
$gxrqi="tbshgxing='$d'";
    break;

    case 'schuang':
$gxrqi="scgxing='$d'";
    break;

    case 'scshe':
$gxrqi="scshgxing='$d'";
    break;

    case 'ecshe':
$gxrqi="xgrqi='$d'";
    break;
  
}





$sql="UPDATE gzlc SET $zt=$_GET[jguo] ,bzu='$_GET[bzu]' ,$gxrqi  WHERE id = $_GET[rid]";
mysql_query($sql);
mysql_close($con);
echo $sql;

print "<script language=\"JavaScript\">\r\n";
print " alert(\"修改成功\");\r\n";
print " window.history.go(-2);\r\n";
print "</script>";
exit;
}

function dyxming($bhao)
{
  $name=0;
  switch ($bhao) {
    case '1':
      $name="景滨";
      break;
    
    case '2':
      $name="慧璇";
      break;

    case '3':
      $name="桂洪";
      break;

    case '4':
      $name="坚强";
      break;

    case '5':
      $name="建浩";
      break;

    case '6':
      $name="小朱";
      break;

    default:
      $name="无此人";
      break;
  }
  return $name;
}

?>
</body>
</html>