<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>工作情况</title>
<script type="text/javascript" src="/js/jquery-3.2.1.js" charset="utf-8"></script>
</head>

<body>
<p class="btlang btl0">
<a href="../gzlc/xzcp.html">新增产品</a>
<a href="../gzlc/index.php?tjmx=jrwcheng">今天完成</a>
</p>
<?php
$yhu=0;
//判断是否登陆
if (!isset($_COOKIE["yhu"]) or !isset($_COOKIE["gznrong"])){
echo "还未登陆";
print "<script language=\"JavaScript\">\r\n";
print " alert(\"请先登陆用户名\");\r\n";
print " window.location.replace('/yhu/index.html');\r\n";
print "</script>";
exit;
}
else{
  $yhu=$_COOKIE["yhu"];
  // echo "<br/>";
  // echo $_COOKIE["gznrong"];
}



date_default_timezone_set('PRC');//设置默认时区；
$d=date("Y-m-d");

$sql="SELECT * FROM gzlc";
$q="";
$ssuo=0;
switch ($_GET["tjmx"]) {
case 'zjmxi'://全部明细
$sql="SELECT * FROM gzlc";
break;

case 'qjgmxi'://欠价格明细
$sql="SELECT * FROM gzlc where jge=0 and scshe=0";
break;

case 'yjgmxi'://有价格明细
$sql="SELECT * FROM gzlc where jge<>0";
break;

case 'qzlmxi'://欠资料明细
$sql="SELECT * FROM gzlc where (zliao=0 or (tpian=0 and yping=0)) and scshe=0";
break;

case 'qtpmxi'://欠图片明细
$sql="SELECT * FROM gzlc where tpian=0";
break;

case 'qypmxi'://欠样品明细
$sql="SELECT * FROM gzlc where yping=0";
break;

case 'qtpypmxi'://欠图片样品明细
$sql="SELECT * FROM gzlc where yping=0 and tpian=0";
break;

case 'zlqmxi'://资料齐明细
$sql="SELECT * FROM gzlc where  (yping=1 or tpian=1) and (jge=1 and zliao=1) and scshe=0";
break; 

case 'zlqtbang'://资料齐能套版
$sql="SELECT * FROM gzlc where  tpian=1 and jge=1 and zliao=1";
break; 

case 'zlqpzao'://资料齐能拍照
$sql="SELECT * FROM gzlc where  yping=1 and jge=1 and zliao=1 and tpian=0";
break; 

case 'ytpian'://有来图片
$sql="SELECT * FROM gzlc where tpian=1 ";
break; 

case 'ypzao'://要拍照（有样品，没图片）
$sql="SELECT * FROM gzlc where tpian=0 and yping=1";
break; 

case 'jrwcheng'://今日完成
$sql="SELECT * FROM gzlc where pzrqgxing='$d' or pzshgxing='$d' or tsxtgxing='$d' or tsxtshgxing='$d' or tbgxing='$d' or tbshgxing='$d' or scgxing='$d' or scshgxing='$d' or xgrqi='$d'";
break; 

case 'wwcheng'://未完成
$sql="SELECT * FROM gzlc where scshe=0";
break; 

case 'dshe'://待审核
$sql="SELECT * FROM gzlc where schuang<>0 and scshe=0";
break; 

case 'dschuang'://待上传
$sql="SELECT * FROM gzlc where schuang=0 and tban<>0 and scshe=0";
break; 

case 'dtban'://待套版
$sql="SELECT * FROM gzlc where tban=0 and tsxt<>0 and scshe=0";
break; 

case 'dtsxt'://待调色修图
$sql="SELECT * FROM gzlc where tsxt=0 and pzao<>0 and scshe=0";
break; 

case 'dpzao'://待调拍照
$sql="SELECT * FROM gzlc where tpian=0 and pzao=0 and yping<>0 and scshe=0";
break; 

case 'zlzliao'://待整理资料
$sql="SELECT * FROM gzlc where tpian=1 and pzao=0 and scshe=0";
break; 

case 'wpshe'://未拍照审核
$sql="SELECT * FROM gzlc where pzao<>0 and pzshe=0 and scshe=0";
break; 

case 'wtsxtshe'://未拍照审核
$sql="SELECT * FROM gzlc where pzao<>0 and pzshe=0 and scshe=0";
break; 

case 'wecshe'://未拍照审核
$sql="SELECT * FROM gzlc where scshe<>0 and ecshe=0";
break;

case 'qsxbiao'://未拍照审核
$sql="SELECT * FROM gzlc where sxbiao=0 and scshe=0";
break;

case 'ssuo'://待调拍照
switch ($_GET['jtzy']) {
  case '0':
   $q="pzao=$_GET[jguo] and pzrqgxing='".$d."'";
    break;

  case '1':
   $q="pzshe=$_GET[jguo] and pzshgxing='".$d."'";
    break;

  case '2':
   $q="tsxt=$_GET[jguo] and tsxtgxing='".$d."'";
    break;

  case '3':
   $q="tsxtshe=$_GET[jguo] and tsxtshgxing='".$d."'";
    break;

  case '4':
   $q="tban=$_GET[jguo] and tbgxing='".$d."'";
    break;

  case '5':
   $q="tbshe=$_GET[jguo] and tbshgxing='".$d."'";
    break;

  case '6':
   $q="schuang=$_GET[jguo] and scgxing='".$d."'";
    break;

  case '7':
   $q="scshe=$_GET[jguo] and scshgxing='".$d."'";
    break;

  case '8':
   $q="ecshe=$_GET[jguo] and xgrqi='".$d."'";
    break;
}

$sql="SELECT * FROM gzlc where $q";
// echo "$sql";
break; 

  
default:
$sql="SELECT * FROM gzlc";
break;
}

$qtpian=0;//无图片
$ytpian=0;//有图片
$ypzao=0;//要拍照
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

//报告需要的参数
$scptwwcheng=0;//平台上架未完成
$scptjtwcheng=0;//平台上架今天完成

$shwwcheng=0;//审核未完成
$shjtwcheng=0;//审核今天完成

$scwwcheng=0;//上传未完成
$scjtwcheng=0;//上传今天完成

$tbwwcheng=0;//套版未完成
$tbjtwcheng=0;//套版今天完成

$tsxtwwcheng=0;//调色修图未完成
$tsxtjtwcheng=0;//调色修图今天完成

$pzwwcheng=0;//拍照未完成
$pzjtwcheng=0;//拍照今天完成

$sxbwwcheng=0;//属性表未完成

$zlwwcheng=0;//资料未整理
$zljtwcheng=0;//资料今天整理

$sxbwwcheng=0;//属性表未完成
$sxbjtwcheng=0;//属性表今天完成

$qjge=0;//欠价格
$qzliao=0;//欠资料
$yjge=0;//有价格


$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("dsbgzhbao", $con);

$result = mysql_query($sql);

echo "<form action='/dphp/db.php'>
<table border='1'  cellspacing='0' cellpadding='0'>
<tr  class='btlang btl1'>
  <th colspan='20' scope='col' width=1885>电商美工工作情况</th>
</tr>
<tr class='btlang btl2'>
<th class='id'>id</th>
<th class='ppai'>品牌</th>
<th class='khao'>款号</th>
<th class='jge'>价格</th>
<th class='zliao'>资料</th>
<th class='tpian'>图片</th>
<th class='yping'>样品</th>
<th class='yping'>属性表</th>
<th class='pzao'>拍照</th>
<th class='pzshe'>拍照审核</th>
<th class='tsxt'>调色修图</th>
<th class='tsxtshe'>调色修图审核</th>
<th class='tban'>套版</th>
<th class='tbshe'>套版审核</th>
<th class='schuang'>上传</th>
<th class='scshe'>上传审核</th>
<th class='ecshe'>二次审核</th>
<th class='bzu'>备注</th>
<th class='cjrqi'>创建日期</th>
<th class='xgrqi'>修改日期</th>
</tr>";
$pid=1;
while($row = mysql_fetch_array($result))
  {

//今天完成统计

if ($row['sxbgxing']==$d) {
$sxbjtwcheng=$sxbjtwcheng+1;//今天平台上架
}

if ($row['tpian']==1 and $row['pzao']==0 and $row['scshe']==0) {
$zlwwcheng=$zlwwcheng+1;
}//未整理资料

if ($row['scshgxing']==$d) {
$scptjtwcheng=$scptjtwcheng+1;//今天平台上架
}

if ($row['schuang']!=0 and $row['scshe']==0) {
$shwwcheng=$shwwcheng+1;//待审核
}

if ($row['tban']!=0 and $row['schuang']==0) {
$scwwcheng=$scwwcheng+1;//待上传
}

if ($row['scgxing']==$d) {
$scjtwcheng=$scjtwcheng+1;//今天上传
}

if ($row['tsxt']!=0 and $row['tban']==0) {
$tbwwcheng=$tbwwcheng+1;//待套版
}

if ($row['tbgxing']==$d) {
$tbjtwcheng=$tbjtwcheng+1;//今天套版
}

if ($row['pzao']!=0 and $row['tsxt']==0 and $row['scshe']==0) {
$tsxtwwcheng=$tsxtwwcheng+1;//待调色
}

if ($row['tsxtgxing']==$d) {
$tsxtjtwcheng=$tsxtjtwcheng+1;//今天调色修图
}

if ($row['yping']!=0 and $row['pzao']==0 and $row['tpian']==0) {
$pzwwcheng=$pzwwcheng+1;//待拍照
}

if ($row['pzrqgxing']==$d) {
// if ($row['pzao']!=2) {
if ($row['yping']!=0 and $row['tpian']==0) {
 $pzjtwcheng=$pzjtwcheng+1;//今天拍照
// }
}
}

if ($row['cjrqi']==$d) {
$zljtwcheng=$zljtwcheng+1;//今天资料整理
}

//流程统计---------------------------------------------------------
if ($row['pzao']==0) {
  $wpzao=$wpzao+1;
}

if ($row['pzshe']==0 and $row['pzao']==1) {
  $wpshe=$wpshe+1;
}

if ($row['tsxt']==0) {
  $wtsxtu=$wtsxtu+1;
}

if ($row['tsxtshe']==0 and $row['tsxt']==1) {
  $wtsxtshe=$wtsxtshe+1;
}

if ($row['tban']==0) {
  $wtbang=$wtbang+1;
}

if ($row['tbshe']==0 and $row['tban']==1) {
  $wtbshe=$wtbshe+1;
}

if ($row['schuang']==0) {
  $wschuang=$wschuang+1;
}

if ($row['scshe']==0) {
  $wscshe=$wscshe+1;
}

if ($row['ecshe']==0 and $row['scshe']==1) {
  $wecshe=$wecshe+1;
}

//资料统计---------------------------------------------------------

if ($row['sxbiao']==0 and $row['scshe']==0) {
  $sxbwwcheng=$sxbwwcheng+1;//欠属性表;
}

if ($row['jge']==1) {
  $yjge=$yjge+1;//有价格
}

if ($row['tpian']==0 and $row['yping']==0) {
  $qtpyping=$qtpyping+1;//欠图片欠样品
}

if ($row['tpian']==1) {
  $ytpian=$ytpian+1;//欠图片欠样品
}

if ($row['tpian']==0 and $row['yping']==1) {
  $ypzao=$ypzao+1;//要拍照（有样品，没图片）
}

if ($row['jge']==0 and $row['scshe']==0) {
  $qjge=$qjge+1;//欠价格
}

if (($row['zliao']==0 or ($row['tpian']==0 and $row['yping']==0)) and $row['scshe']==0) {
$qzliao=$qzliao+1;//欠资料
}

if ($row['tpian']==0) {
$qtpian=$qtpian+1;//无图片
}

if ($row['yping']==0) {
$qyping=$qyping+1;//无样品
}

if ($row['scshe']==0){
if ($row['jge']!=0 and $row['zliao']!=0) {
if ($row['tpian']!=0 or $row['yping']!=0) {
 $qquan=$qquan+1;
}
}}// $qquan=0//资料全

if ($row['jge']!=0 and $row['zliao']!=0 and $row['tpian']!=0) {
 $qqtbang=$qqtbang+1;
}

if ($row['jge']!=0 and $row['zliao']!=0 and $row['yping']!=0 and $row['tpian']!=1) {
 $qqpzao=$qqpzao+1;
}


if ($row['bzu']!="") {
echo "<tr style='background: rgb(228, 228, 228)'>";
}
else{ echo "<tr>";}
 
  echo "<td class=id>" . $pid . "</td>";
  $pid=$pid+1;
  echo "<td class=ppai>" . $row['ppai'] . "</td>";
  echo "<td class=khao>" . $row['khao'] . "</td>";
  switch ($row['jge'])
  {
  case 0:
  jlu('jge',$row['Id']);
break;

default:
echo "<td class=jge style='color:red;font-weight: bold;'>".dyxming($row['jge'])."</td>";
}
  //价格(0无,1有)

  switch ($row['zliao'])
  {
  case 0:
  jlu('zliao',$row['Id']);
break;
default:
echo "<td class=zliao>".dyxming($row['zliao'])."</td>";
}
  //资料(0无,1有)

  switch ($row['tpian'])
  {
  case 0:
  jlu('tpian',$row['Id']);
break;

default:
echo "<td class=tpian>".dyxming($row['tpian'])."</td>";
}
  //图片(0无,1有)

  switch ($row['yping'])
  {
  case 0:
  jlu('yping',$row['Id']);
break;
default:
echo "<td class=yping>".dyxming($row['yping'])."</td>";
}
  //样品(0无,1有)

switch ($row['sxbiao']) {
  case 0:
  jlu('sxbiao',$row['Id']);
break;
default:
echo "<td class=sxbiao>".dyxming($row['sxbiao'])."</td>";
}//属性表(0无,1有)



  switch ($row['pzao'])
  {
  case 0:
  jlu('pzao',$row['Id']);
break;

default:
echo "<td class=pzao>".dyxming($row['pzao'])."</td>";
}

  switch ($row['pzshe'])
  {
  case 0:
  jlu('pzshe',$row['Id']);
break;

default:
echo "<td class=pzshe>".dyxming($row['pzshe'])."</td>";
}

  switch ($row['tsxt'])
  {
  case 0:
  jlu('tsxt',$row['Id']);
break;

default:
echo "<td class=tsxt>".dyxming($row['tsxt'])."</td>";
}

  switch ($row['tsxtshe'])
  {
  case 0:
jlu('tsxtshe',$row['Id']);
break;

default:
echo "<td class=tsxtshe>".dyxming($row['tsxtshe'])."</td>";
}

  switch ($row['tban'])
  {
  case 0:
jlu('tban',$row['Id']);
break;
default:
echo "<td class=tban>".dyxming($row['tban'])."</td>";
}

  switch ($row['tbshe'])
  {
  case 0:
jlu('tbshe',$row['Id']);
break;

default:
echo "<td class=tbshe>".dyxming($row['tbshe'])."</td>";
}

switch ($row['schuang'])
  {
  case 0:
jlu('schuang',$row['Id']);
break;

default:
echo "<td class=schuang>".dyxming($row['schuang'])."</td>";
}

switch ($row['scshe'])
  {
  case 0:
jlu('scshe',$row['Id']);
break;

default:
echo "<td class=scshe>".dyxming($row['scshe'])."</td>";
}

switch ($row['ecshe'])
  {
  case 0:
jlu('ecshe',$row['Id']);
break;

default:
echo "<td class=ecshe>".dyxming($row['ecshe'])."</td>";
}

echo "<td class=bzu>" . $row['bzu']. "<br /> <a href='../gzlc/zlztcli.php?id=".$row['Id']."'>备注</a> </td>";
  echo "<td class=cjrqi>" . $row['cjrqi']. "</td>";
  echo "<td class=xgrqi>" . $row['xgrqi']. "</td>";
  echo "</tr>";
  }
echo "</table></form>";
$pid=$pid-1; 
echo "<p class='tji'>
  <span>总计：<a href='/gzlc/index.php?tjmx=zjmxi'><em>$pid</em>款；</a></span>
  <span>有价格：<a href='/gzlc/index.php?tjmx=yjgmxi'><em>$yjge</em>款；</a></span>
  <span>有图片：<a href='/gzlc/index.php?tjmx=ytpian'><em>$ytpian</em>款；</a></span>
  <span>无图片：<a href='/gzlc/index.php?tjmx=qtpmxi'><em>$qtpian</em>款；</a></span>
  <span>无属性表：<a href='/gzlc/index.php?tjmx=qsxbiao'><em>$sxbwwcheng</em>款；</a></span>
  <span>属性表今天完成：<em>$sxbjtwcheng</em>款；</span>
  
  <span>无样品：<a href='/gzlc/index.php?tjmx=qypmxi'><em>$qyping</em>款；</a></span>
  <span>无图片样品：<a href='/gzlc/index.php?tjmx=qtpypmxi'><em>$qtpyping</em>款；</a></span>
  <span>资料齐未处理：<a href='/gzlc/index.php?tjmx=zlqmxi'><em>$qquan</em>款</a>  能直接套版：<a href='/gzlc/index.php?tjmx=zlqtbang'><em>$qqtbang</em>款</a>   需要拍照：<a href='/gzlc/index.php?tjmx=zlqpzao'><em>$qqpzao</em>款；</a></span>

</p>";

//报告统计

echo "<table border='1'  cellspacing='0' cellpadding='0'>

  <tr>
    <th colspan='4' scope='col'>$d 电商部工作报告</th>
  </tr>

  <tr>
    <th scope='col'>类型</th>
    <th scope='col'>未完成</th>
    <th scope='col'>今天完成</th>
    <th scope='col'>负责人</th>
  </tr>
  <tr>
    <th scope='row'>上传平台</th>
    <td><a href=/gzlc/index.php?tjmx=wwcheng>$wscshe</a></td>
    <td>$scptjtwcheng</td>
    <td>景滨</td>
  </tr>
  <tr>
    <th scope='row'>待审核</th>
    <td><a href=/gzlc/index.php?tjmx=dshe>$shwwcheng</a></td>
    <td>$scptjtwcheng</td>
    <td>景滨</td>
  </tr>
  <tr>
    <th scope='row'>待上传</th>
    <td><a href=/gzlc/index.php?tjmx=dschuang>$scwwcheng</a></td>
    <td>$scjtwcheng</td>
    <td>建浩</td>
  </tr>
  <tr>
    <th scope='row'>待套版</th>
    <td><a href=/gzlc/index.php?tjmx=dtban>$tbwwcheng</a></td>
    <td>$tbjtwcheng</td>
    <td>桂洪、慧璇</td>
  </tr>
  <tr>
    <th scope='row'>待调色修图</th>
    <td><a href=/gzlc/index.php?tjmx=dtsxt>$tsxtwwcheng</a></td>
    <td>$tsxtjtwcheng</td>
    <td>景滨、桂洪</td>
  </tr>
  <tr>
    <th scope='row'>待拍照</th>
    <td><a href=/gzlc/index.php?tjmx=dpzao>$pzwwcheng</a></td>
    <td>$pzjtwcheng</td>
    <td>景滨、坚强</td>
  </tr>
  <tr>
    <th scope='row'>待整理资料</th>
    <td><a href=/gzlc/index.php?tjmx=zlzliao>$zlwwcheng</a></td>
    <td>$zljtwcheng</td>
    <td>坚强</td>
  </tr>
  <tr>
    <th scope='row'>欠资料</th>
    <td><a href=/gzlc/index.php?tjmx=qzlmxi>$qzliao</a></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th scope='row'>欠价格</th>
    <td><a href=/gzlc/index.php?tjmx=qjgmxi>$qjge</a></td>
    <td></td>
    <td></td>
  </tr>
</table>
<table border='1' cellpadding='0'  cellspacing='0'>
  <tr>
    <th colspan='4' scope='col'>待审核</th>
  </tr>
  <tr>
    <th width='155' scope='row'>类型</th>
    <td width='69'>未完成</td>
    <td width='92'>今天完成</td>
    <td width='80'>负责人</td>
  </tr>
  <tr>
    <th scope='row'>拍照审核</th>
    <td><a href=/gzlc/index.php?tjmx=wpshe>$wpshe</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope='row'>调色修图审核</th>
    <td><a href=/gzlc/index.php?tjmx=wtsxtshe>$wtsxtshe</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope='row'>套版审核</th>
    <td>$wtbshe</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <th scope='row'>二次审核</th>
    <td><a href=/gzlc/index.php?tjmx=wecshe>$wecshe</a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>";

mysql_close($con);

function jlu($jlu,$id)
{
  echo "<td class=".$jlu."><a href='../gzlc/gzlc_db.php?id=".$id."&where=ztcli_".$jlu."'> 无 </a></td>";
}

// 函数编号翻译成名字
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

<style>
p{padding: 16px 0;margin:0px; background: white;}
th,td{padding: 10px 20px;}
em{font-style: normal;}
.id{width: 36px;}.ppai{width: 54px;}.khao{width: 72px;}.jge,.zliao,.tpian,.yping,.sxbiao{width: 27px;}.pzao,.pzshe,.tsxt,.tsxtshe,.tban,.tbshe,.schuang,.scshe,.ecshe{width: 39px;} .bzu{width: 250px;} .cjrqi,.xgrqi{width: 80px;}
.btlang{position: fixed;background-color: white;}
.btl0{top:0px; width: 100%;} .btl1{ top: 50px; } .btl2{top: 90px;}
table{margin-top: 166px;}
</style>

</body>

<script type="text/javascript">
// function zliao(var1) {
// if (var1!=0) {
//     return false;  
//   alert("你要做的是这项工作内容吗？是的话要去重新登陆下更新你的工作内容");
//     }

//   }  


</script>




</html>                                            