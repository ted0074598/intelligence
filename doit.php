<?php

include_once 'head.php';
include_once 'bridge.php';
$m = new M(); 
$yanzheng=new yanzheng();
$yanzheng->checksesson($_SESSION['p_no']);

if(isset($_GET['id'])&&isset($_SESSION['p_no']))
{
      //echo $_GET['id'].'号机器开始维修';
	$id=$_GET['id'];
	$p_no=$_SESSION['p_no'];
?>
	<div id='boday' style="width: 80% ;margin: auto;">
		<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">维修表格</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                        <h3><p class="text-danger"></p></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form"  method="POST" action="doit.php">
                                     <div class="form-group">
                                            <label>单位</label>
                                          
                                            <?php 
                                            	$id='id='.$id;
                                              $data=$m->FetchAll('fofo_department','*',$id);
                                              foreach ($data as $show)
                                               { 
                                                  $depart_name=$show['depart_name'];
                                                   $r_id=$_GET['id'];
                                               }
                                               	//  POST提交name元素为id,值为送修表格主键id。

                                            ?>
                                             <input  class="form-control"   type="text" value="<?php echo $depart_name;?>" disabled="">
                                           
                                               
                                           
                                        </div>
                                           <div class="form-group">
                                             <input style="display:none"  class="form-control"  name="r_id" type="text" value="<?php echo $r_id;?>" >
                                           </div>

                                        <div class="form-group">
                                            <label>维修人</label>
                                            <?php
                                            	$p_name='p_no='.$p_no;
 				$data=$m->FetchAll('fofo_people','*',$p_name);
                                           	   foreach ($data as $show)
                                               {
                                               		$p_name=$show['p_name']; 
                                               }

                                            ?>
                                            <input  disabled=""  name='p_no' value="<?php echo $p_name;?>" class="form-control">
                                            <input   style="display:none"  name='p_no' value="<?php echo $p_no;?>" class="form-control">
                                         	<!--POST提交name元素为p_no,值为维修人员的登录名。-->
                                        </div>
                                         <div class="form-group">
                                            <label>联系电话</label>
                                            <?php

                                                    $photo=$m->FetchAll('fofo_repair','*',$id);
                                            	  
                                              	    foreach ($photo as $show)
                                             	  {
                                               		$p_photo=$show['p_photo']; 
                                               		$c_fault=$show['c_fault']; 
                                               		$date_time=$show['date_time']; 
                                            	   }
                                            
                                            ?>

                                              <input  disabled=""  value="<?php echo $p_photo;?>" class="form-control">
                                           
                                        </div>
                                         <div class="form-group">
                                            <label>问题描述</label>
                                            <textarea disabled=""   class="form-control" rows="3" value=><?php echo $c_fault;?></textarea>
                                        </div>
                                       <div class="form-group">
                                            <label>维修方式</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="c_state" id="optionsRadiosInline" value="1" checked="">重装系统
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="c_state" id="optionsRadiosInline" value="2">更换配件
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="c_state" id="optionsRadiosInline" value="3">报废机器
                                            </label>
                                        </div>
				<!--POST提交name元素为c_state,值为维修类型的值，0为未维修，1重装系统，2更换配件，3报废机器。-->
			


                                         <div class="form-group" id="bujian" style="display:none">
                                            <label>更换部件</label>
                                           <select class="form-control" name="r_part">
                                           <option value='0'>0</option>
                                               <?php 

                                             
                                              $data=$m->FetchAll('fofo_spare','*');
                                              foreach ($data as $show)
                                               { 
                                                  echo '<option value='.$show['id'].'>'.$show['part'].'<==>'.$show['brand'].'<==>'.$show['size'].'<==>'.$show['price'].'.00RMB</option>';
                                                
                                               }

                                            ?>
                                            </select>

                                            <!--POST提交name元素为r_part,值为更换的部件id。-->


                                            <input  style="display:none"  name='f_time' value="<?php echo   $f_time=date('Y-m-d H:i:s',time());;?>" class="form-control">
                                        </div>
                                       
                                    
                                        <button type="submit" class="btn btn-default">提交申请</button>
                                        <a class="btn btn-default" href="index.php">返回主页</a>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                              
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
  </div> <!-- /.body -->
  <?php
}


if(isset($_POST['r_part']))
{
	
	/*echo $_POST['r_id'].'======1<br/>';
	echo $_POST['p_no'].'======2<br/>';
	echo $_POST['c_state'].'======3<br/>';
	echo $_POST['r_part'].'======4<br/>';
	echo $_POST['f_time'].'=======5<br/>';*/

      $r_id=$_POST['r_id'];
      $p_no=$_POST['p_no'];
      $c_state=$_POST['c_state'];
      $r_part=$_POST['r_part'];
      $f_time=$_POST['f_time'];

	$query="INSERT INTO `fofo_work`(`r_id`, `p_no`, `c_state`, `r_part`, `f_time`) VALUES ('".$r_id."','".$p_no."','".$c_state."','".$r_part."','".$f_time."')";
       //echo $query.'<br/>';
	$query_update="UPDATE `fofo_repair` SET `c_state`=".$c_state." WHERE id=".$r_id;
       //echo $query_update.'<br/>';

       if($link->query($query)&&$link->query($query_update))
       {
              echo "<script>alert('操作成功');location.href='index.php';</script>";
       }
}

?>