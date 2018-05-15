<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>资料状态更新</title>
</head>

<body>
<?php

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dsbgzhbao", $con);

$result = mysql_query("SELECT * FROM gzlc where id= $_GET[id]");

echo "<form action='/gzlc/gzlc_db.php'>";
echo "<input name='where' type='hidden' value='ztcli_bzu' />";
while($row = mysql_fetch_array($result))
  {

if ($row['bzu']=="") {
 echo "<input name='ybzu' type='hidden' value='".$row['bzu']."' />";
}else{echo "<input name='ybzu' type='hidden' value='".$row['bzu']."<br/>' />";}

echo "<p>原备注：</p>";
echo "<p>".$row['bzu']."</p>";
echo "<input name='id' type='hidden' value='".$_GET['id']."' />";

echo "<label>补充备注：</label><textarea name='bzu' cols='' rows='' ></textarea>"  ;
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