<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>电商部工作报告</title>
</head>

<body>

<?php

$sql="SELECT * FROM gzlc";

$qjge=0;//欠价格
$qzliao=0;//欠资料
$qtpian=0;//无图片
$qyping=0;//无样品
$qtpyping=0;//图片样品都没有
$qquan=0;//资料全
$qqtbang=0;//资料全 能直接套版
$qqpzao=0;//资料全 需要拍照

$wpzao=0;//未拍照
$wpshe=0;//未拍照审核
$wtsxtu=0;//未调色修图
$wtsxtshe=0;//未调色修图审核
$wtbang=0;//未套版
$wtbshe=0;//未套版审核
$wschuang=0;//未上传
$wscshe=0;//未上传审核
$wecshe=0;//未二次审核

$xypzao=0;//需要拍照

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dsbgzhbao", $con);

$result = mysql_query($sql);


$pid=1;
while($row = mysql_fetch_array($result))
  {
$pid=$pid+1;

//美工进程-----------------------------------------------------------------------
if ($row['pzao']==0) {
  $wpzao=$wpzao+1;
}

if ($row['pzshe']==0) {
  $wpshe=$wpshe+1;
}

if ($row['tsxt']==0) {
  $wtsxtu=$wtsxtu+1;
}

if ($row['tsxtshe']==0) {
  $wtsxtshe=$wtsxtshe+1;
}

if ($row['tban']==0) {
  $wtbang=$wtbang+1;
}

if ($row['tbshe']==0) {
  $wtbshe=$wtbshe+1;
}

if ($row['schuang']==0) {
  $wschuang=$wschuang+1;
}

if ($row['scshe']==0) {
  $wscshe=$wscshe+1;
}

if ($row['ecshe']==0) {
  $wecshe=$wecshe+1;
}

//资料状态
if ($row['tpian']==0 and $row['yping']==0) {
  $qtpyping=$qtpyping+1;//欠图片欠样品
}

if ($row['jge']==0) {
  $qjge=$qjge+1;//欠价格
}

if ($row['zliao']==0) {
$qzliao=$qzliao+1;//欠资料
}

if ($row['tpian']==0) {
$qtpian=$qtpian+1;//无图片
}

if ($row['yping']==0) {
$qyping=$qyping+1;//无样品
}

if ($row['jge']!=0 and $row['zliao']!=0) {
if ($row['tpian']!=0 or $row['yping']!=0) {
 $qquan=$qquan+1;
}
}

if ($row['jge']!=0 and $row['zliao']!=0 and $row['tpian']!=0) {
 $qqtbang=$qqtbang+1;
}

if ($row['jge']!=0 and $row['zliao']!=0 and $row['yping']!=0) {
 $qqpzao=$qqpzao+1;
}}

// $qquan=0//资料全
echo "<h3>资料情况</h3>";
$pid=$pid-1;
$qglzliao=$pid-$qquan;
echo "<p class='tji'>
  <span>总计：<em>$pid</em>款；</span><br/>
  <span>能正常处理：<em>$qquan</em>款；</span><br/>
  <span>资料不足：<em>$qglzliao</em>款；</span>
  </p>";

$ypzao=$pid-$wpzao;
$ypshe=$pid-$wpshe;
$ytsxt=$pid-$wtsxtu;

$ypzao=$pid-$wpzao;
$ytsxtu=$pid-$wtsxtu;
$ytbang=$pid-$wtbang;
$yschuang=$pid-$wschuang;
$yscshe=$pid-$wscshe;
echo "<br/><HR><br/>";
echo "<h3>美工工作进程</h3>";
echo "<p class='jcheng'>
  <span>未拍照：<em>$wpzao</em>款；已完成：<em>$ypzao</em>款；</span><br/>
  <span>未调色修图：<em>$wtsxtu</em>款；已完成：<em>$ytsxtu</em>款；</span><br/>
  <span>未套版：<em>$wtbang</em>款；已完成：<em>$ytbang</em></span><br/>

  <span>未上传<em>$wschuang</em>款；已完成：<em>$yschuang</em></span><br/>
  <span>未上架<em>$wscshe</em>款；已在卖：<em>$yscshe</em></span><br/>

</p>";


mysql_close($con);
?>

<style>
em{font-style: normal;}
body em{font-size: 25px;}
</style>

</body>
</html>