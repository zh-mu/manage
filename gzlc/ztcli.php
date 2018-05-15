<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>工作流程状态更新</title>
</head>

<body>
<?php

$zt=$_GET['zt'];

switch ($zt) {
case 'pzao':
$ztdiv="拍照";
break;

case 'pzshe':
$ztdiv= "拍照审核";
break;

case 'tsxt':
$ztdiv= "调色修图";
break;

    case 'tsxtshe':
$ztdiv= "调色修图审核";
    break;

    case 'tban':
$ztdiv= "套版";
    break;

    case 'tbshe':
$ztdiv= "套版审核";
    break;

    case 'schuang':
$ztdiv= "上传";
    break;

    case 'scshe':
$ztdiv= "上传审核";
    break;

    case 'ecshe':
$ztdiv= "二次审核";
    break;
  
}

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dsbgzhbao", $con);

$result = mysql_query("SELECT * FROM gzlc where id= $_GET[id]");

echo "<form action='/gzlc/gzlc_db.php'>";
echo "<input name='where' type='hidden' value='lcztcli_r' />";
while($row = mysql_fetch_array($result))
  {
echo "<input name='rid' type='hidden' value= $row[Id] />";

echo "<p><label>品牌：</label><span>$row[ppai]</span></p>";
echo "<p><label>款号：</label><span>$row[khao]</span></p>";

echo "<p><label>$ztdiv :</label><select name='jguo'>
  <option value='3'>桂洪</option>
  <option value='1'>景滨</option>
  <option value='2'>慧璇</option>
  <option value='4'>坚强</option>
  <option value='5'>建浩</option>
  <option value='6'>小朱</option>
</select></p>";
echo "<input name='zt' type='hidden' value= $zt />";
echo "<p><label>备注：</label><textarea name='bzu' cols='' rows='' >$row[bzu]</textarea></p>"  ;
}


echo "<input type='submit' name='button' id='button' value='提交处理结果' />"  ;
echo "</form>";

mysql_close($con);

?>

<style>
#button{margin-left: 15%;}
textarea{width: 84%;}

  label{    display: block;
    float: left;width: 15%;
    text-align: right;}
  form{
display: block;
width: 50%;
margin: 0 auto;
  }
p{width: 100%;}
</style>
</body>
</html>