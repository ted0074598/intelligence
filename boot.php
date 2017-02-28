<?php
include_once'head.php';   
include_once'bridge.php';
$yanzheng=new yanzheng();
$yanzheng->checksesson($_SESSION['p_no']);
echo $_SESSION['p_no'];
?>


 	      <div  class="menu">
 	      	<div class="list">
			<a href="case/list.php">
				<img class="menu_list" src="script/pic/fywa.png"  title="案件情报系统"  border="0" >
			</a>
		</div>
		<div class="list">
			<a href="">
				<img class="menu_list" src="script/pic/fywa.png"  title="特侦情报系统"  border="0" >
			</a>
		</div>
		<div class="list">
			<a href="">
				<img class="menu_list" src="script/pic/fywa.png"  title="案件情报系统"  border="0" >
			</a>
		</div>
		<div class="list">
			<a href="">
				<img class="menu_list" src="script/pic/fywa.png"  title="案件情报系统"  border="0" >
			</a>
		</div>
		<div class="list">
			<a href="">
				<img class="menu_list" src="script/pic/fywa.png"  title="案件情报系统"  border="0" >
			</a>
		</div>
                 </div>