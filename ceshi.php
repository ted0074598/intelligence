<?php
include_once("head.php");
include_once("bridge.php");


$_SESSION['ceshi']="123123123";

echo $_SESSION['ceshi'];


$m = new M(); 
$total = $m->Total('fofo_department');
$page = new PHPPage($total,10000); 
echo $m->insert("INSERT INTO `fofo_people`( `p_no`, `p_name`, `p_psw`) VALUES ('003','程帅帅','admin')",true).'=====insert==========<br/>';
echo $m->Update("fofo_people", array('p_no'=>'007', 'p_name'=>'bangde'), "id=9").'=====update==========<br/>';
echo $m->Del('fofo_people', 'id=8').'=====del====='; 
?>
<table width="1000" border="1" style="border-collapse:collapse; font-size:13px;">
<tr height="30">
  <th width="483">标题</th>
  <th width="141">来源</th>
 </tr>
<?php



$limit =$page->limit();
echo $limit;
$data=$m->FetchAll('fofo_department','id,depart_name','','',$limit);
foreach ($data as $v) { //循环取出数据
?>
<tr>
  <td align="center"><?php echo $v['id']; ?></td>
  <td align="center"><?php echo $v['depart_name']; ?></td>
</tr>
			<?php
					}
			?>
<tr>
  <td id="page" colspan="4"><?php echo $page->show(); ?></td> <!-- 调出分页类 -->


</tr>
</table>
<?php
echo $page->limit();

		





?>