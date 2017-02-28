<?php
include_once'head.php';   
include_once'bridge.php';
    if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                    $query="UPDATE `fofo_repair` SET `c_state`=4 WHERE id=".$id;
                        if($link->query($query))
                        {
                          //  echo $_GET['id'].'号机器被领走';
                         }     
                        $link->close();               
                 }
?>


			<div class="row" style="width:75%; margin:auto; margin-top:20px;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           电脑维修列表
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                           <?php
                                           include_once 'gonggao.php'
                                           ?>
                                    <tr>
                                        <th>送修单位</th>
                                        <th>联系人</th>
                                        <th>联系电话</th>
                                        <th>送修时间</th>
                                        <th width="15%">维修状态</th>
                                        <th class='dis'  style='display:none' width="10%">操作管理</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php

                                  $m= new M();
                                  $data=$m->FetchAll('fofo_repair','id,depart_id,p_name,p_photo,date_time,c_state','c_state<>4','c_state DESC','0,40');
                                  //$data=$m->FetchAll('fofo_department','id,depart_name','','',$limit);
                                  foreach ($data as $v) {

                                        if($v['c_state']==0)
                                        {
                                        $stat='<button type="button" class="btn btn-warning btn-circle "><i class="fa fa-times"></i>
                                                                </button>
                                                              <button type="button"  class="print_id btn btn-outline btn-primary btn-sm" value="'.$v['id'].'">打印表格</button>
                                                                </td>
                                                                                 <td class="dis"  style="display:none;" >
                                                                                 <button type="button" class="weixiu_id btn btn-outline btn-primary btn-sm center-block" value="'.$v['id'].'">开始维修</button>
                                                                                 </td>
                                                                        </tr>';
                                                               
                                        }else
                                        
                                        {
                                           $stat='<button type="button" class="btn btn-info btn-circle center-block"><i class="fa fa-check"></i>
                                                                </button></td>
                                                                <td class="dis"  style="display:none;" > 
                                                                       
                                                                           <button type="button" class="lingqu_id btn btn-info btn-circle center-block" value="'.$v['id'].'"><i  class="fa fa-check"></i>
                                                                           </button> 
                                                                      
                                                                </td></tr>'; 
                                        }
                                        $m= new M();
                                        $r_id='id='.$v['depart_id'];
                                        $data=$m->FetchAll('fofo_department','depart_name',$r_id,'','');
                                         foreach ($data as $k) {
                                                $depart_name=$k['depart_name'];
                                            }   
                                     
                                        echo ' <tr class="odd gradeX"><td>'. $depart_name.'</td>
                                             <td>'.$v['p_name'].'</td>
                                                <td>'.$v['p_photo'].'</td>
                                             <td>'.$v['date_time'].'</td>
                                                <td>'.$stat;

                                  }

                                ?>


                                   
                                                
                                    
                                  
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>


</body>
</html>
<?php
                if(isset($_SESSION['p_no']))
                {
                    echo  "<script>$('.dis').show();</script>";
                }
                else
                {
                    echo  "<script>$('.dis').hide();</script>";
                }
?>