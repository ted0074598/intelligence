<?php
include_once 'casehead.php';
$m = new M(); 
$total=$m->Total('newcase');
$page=new PHPPage($total,20);
// echo $_SESSION['priority'];
?>
    <div  id="page-wrapper" class="page-wrapper" style="overflow:hidden">
				<div class="form-group">
                            				<button id="list_show"  class="btn btn-default">显示专项</button>
                            		</div>	
         		<div  id="case_list"  class="left" style="width:7%;border-right:1px solid #ddd;">
          	 		<div style="padding:15px;border-bottom:1px solid #ddd">
          	 		在办专项
          	 		</div>
			<div>
			         <?php
			         		$limit =$page->limit();
			                      $data=$m->FetchAll('newcase','id,c_name,c_content,c_state','','c_date desc',$limit);
			                      foreach ($data as $show)
			                      {
			                      	if($show['c_state']!=0)
			                      	{
                                                            
			       			 echo '<li><a  id='.$show['id'].' href="list.php?id_show='.$show['id'].'"  class="">'.$show['c_name'].'</a></li>';
			                      	
			                      	}
			                      }	
			         ?>
			</div>
		</div>   
	<div class="left" style="width:91%;">
	        <div class="row">
               		 <div class="col-lg-12" >
               		     <h1 class="center page-header" >情报列表</h1>
                		</div>
                <!-- /.col-lg-12 -->
            	</div>
            <!-- /.row -->
      	<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            情报列表
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>序号</th>
                                            <th>区域</th>
                                            <th>名称</th>
                                            <th>内容</th>
                                            <th width="13%" >时间</th>
                                            <th width="10%">状态</th>
                                            <th width="10%">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    	if(isset($_GET['id_show']))
                                    	{
                                    		$id_show='L_c_id='.$_GET['id_show'];
                                                     $_SESSION['id_show']=$_GET['id_show'];
                                    	}
                                    	else
                                    	{
                                                 $c_count=$m->Total('newcase');
                                                 if($c_count>0)
                                                 {
                                                    $c_data=$m->FetchAll('newcase','id,c_date','','c_date desc','0,1');
                                                    foreach($c_data as $c_id_show)
                                                    {
                                                        $id_show='L_c_id='.$c_id_show['id'];
                                                        $_SESSION['id_show']=$c_id_show['id'];        
                                                    }
                                                 }else
                                                 {
                                                        $id_show='';
                                                 }
	                                    	
                                    	}
                                           
                                          if($id_show=='')
                                          {
                                            $limit='';
                                          }else
                                          {
                                            $limit =$page->limit();
                                          }
                                          
                                          $data=$m->FetchAll('list','L_id,L_c_id,L_u_id,L_name,L_content,L_stat,L_note,L_date',$id_show,'',$limit);
                                          $i=1;
                                          foreach ($data as $show)
                                 	{ //循环取出数据

                                 	if($show['L_stat']==0)
                                 	{
                                 		$c_state='未采用';
                                 	}
                                 	else
                                 	{
                                 		$c_state='采用';
                                 	}
                                                    
                                                    $u_data=$m->GetRow("SELECT `id`,`are`  FROM `user` WHERE id='".$show['L_u_id']."'");
                                                    
                                    echo ' <tr class="odd gradeX">
			    <td>'.$i.'</td>
			    <td>'. $u_data['are'].'</td>
			    <td>'.$show['L_name'].'</td>
			    <td><a href="#">内容</a></td>
                                    <td>'.$show['L_date'].'</td>
			    <td>'.$c_state.'</td>
			    <td><button type="button" class="L_upd btn btn-default" value="'.$show['L_id'].'">修改</button>&nbsp;
			            <button type="button" class="L_del btn btn-default" value="'.$show['L_id'].'"> 删除</button>
			             <button type="button" style="display:none;"   id="up_c_id'.$show['L_id'].'" value="'.$show['L_id'].'"> </button>  
			             <button type="button" style="display:none;"   id="up_c_name'.$show['L_id'].'" value="'.$show['L_name'].'"> </button>
			             <button type="button" style="display:none;"   id="up_c_content'.$show['L_id'].'" value="'.$show['L_content'].'"> </button>
			            <button type="button" style="display:none;"   id="up_c_state'.$show['L_id'].'" value="'.$c_state.'"> </button>  
			            
			    </td>  </tr>';
                                            $i++;
				}	

                                    ?>
                                    </tbody>
                                </table>
						<div class="form-group">
                            				<button id="add_list_start"  class="btn btn-default">增加情报</button>
                            				</div>	
			                                <div class="form-group">
			                                 <?php
			                                    echo $page->show();
			                                    ?>
			                             </div>
                            		</div>
			</div>   	
	           </div>
	</div>
	</div>

    </div>
 </div>


<div id="wall" class="reveal-modal-bg" style="display: block; cursor: pointer;display:none"></div>
    		 <div id="list_add" class="list_add form-group" style="opacity:4;display:none">
				<form role="form" id="list_add_yan" name="list_add_yan" class='cmxform'  method="POST" action="list.php" >
                                             <table id="casetable"  width="100%" class="table table-striped table-bordered table-hover">
                                                 <tbody>
                                                    <tr>
                                                    	<td>
                                                    	  <div class="fleft col-lg-6">
                                                    	   <h4>情报名称</h4>
                                                    	   <?php 
                                                    	   // t_id为情报类别，分为案件或者其他
                                                        // L_c_id为专项id，专项的归属
                                                        //L_u_id 为用户id，上传情报的人员归属
                                                        // echo $_SESSION['class'];
                                                        // echo $_SESSION['id_show'];
                                                        $L_t_id=$_SESSION['class'];
                                                        $L_c_id=$_SESSION['id_show'];
                                                        $L_u_id=$_SESSION['u_id'];
                                                        // echo $L_t_id.'|'.$L_c_id.'|'.$L_u_id;
                                                    	   ?>
                                                           <input id="L_t_id"  name="L_t_id"  style="display:none" value="<?php echo $L_t_id; ?>" class="form-control">
                                                           <input id="L_c_id"  name="L_c_id" style="display:none" value="<?php echo  $L_c_id;?>" class="form-control">
                                                           <input id="L_u_id"  name="L_u_id" style="display:none" value="<?php echo $L_u_id; ?>" class="form-control">	
                                                        <input id="L_name"  name="L_name" placeholder="名称" class="form-control">
                                                         <label id="L_name-error"  class="error"  for="L_name"></label>
                                                   	</div>
                                                   	<div class="fleft col-lg-9">
                                                    	   <h4>内容:</h4>
                                                    	    
        					   <textarea id="L_content" name="L_content" >
						内容不能为空
        					   </textarea>
                                                        <label id="L_content-error"  class="error"  for="L_content"></label>
                                                     </div>
                                                    <div class="fleft col-lg-10">
                                                     <button type="submit"  class="btn btn-default">确认增加</button>
                                                      <button id="list_add_cance"  class="btn btn-default">取消</button>
                                                     </div>
                                                     </td>
                                                    </tr>

                                               </tbody>  

                                            </table>
                                              </form>
			</div>
			<!-- list_add -->
<script>
var ue = UE.getEditor('L_content');
</script>

<?php 
		
	
 	if(isset($_POST['L_name']))
         	 {
            $L_t_id=$_POST['L_t_id'];
             $L_c_id=$_POST['L_c_id'];
             $L_u_id=$_POST['L_u_id'];
             $L_name=$_POST['L_name'];
             $L_content=$_POST['L_content']; 
             $L_date= date('Y-m-d H:i:s',time());
            $query="INSERT INTO `list`( `L_t_id`,`L_c_id`,`L_u_id`,`L_name`,`L_content`,`L_date`) VALUES ('".$L_t_id."','".$L_c_id."','".$L_u_id."','".$L_name."','".$L_content."','".$L_date."')";
             //echo $query;
             if($m->insert( $query,true))
             {
                echo "<script>alert('添加操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
             }
          }
         if(isset($_GET['L_dele']))
         {
            $d_id=$_GET['L_dele'];
            $d_id='L_id='.$d_id; 
            //echo $d_id;
            if($m->Del('list',$d_id))
            {   
                    echo "<script>alert('删除操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
            }
         }
          if(isset($_GET['L_upd']))
            {      
                   if($_SESSION['priority']==0)
                           {
                                $L_upd_id=$_GET['L_upd'];
                                $L_date= date('Y-m-d H:i:s',time());
                                $L_stat=1;
                                if($m->Update("list", array('L_date'=> $L_date,'L_stat'=> $L_stat), $L_upd_id))
                                {
                                    echo "<script>alert('更新操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
                                }
                        }else
                        {
                            echo "<script>alert('您没有权限');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
                        }
                            
            }
      


?>