<?php
include_once'casehead.php';
$m = new M(); 
$total=$m->Total('newcase');
$page=new PHPPage($total,20);
?>
    <div  id="page-wrapper" class="page-wrapper" style="overflow:hidden">
				<div class="form-group">
                            				<button id="list_show"  class="btn btn-default">显示专项</button>
                            		</div>	
         		<div  id="case_list"  class="left" style="display:none;width:7%;border-right:1px solid #ddd;">
          	 		<div style="padding:15px;border-bottom:1px solid #ddd">
          	 		在办专项
          	 		</div>
			<div>
			         <?php
			         		$limit =$page->limit();
			                      $data=$m->FetchAll('newcase','id,c_name,c_content,c_state','','',$limit);
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
               		     <h1 class="page-header" id="center">情报列表</h1>
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
                                            <th>名称</th>
                                            <th>内容</th>
                                            <th>状态</th>
                                            <th>备注</th>
                                            <th width="10%">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    	if(isset($_POST['id_show']))
                                    	{
                                    		$id_show=$_POST['id_show'];
                                    	}
                                    	else
                                    	{
	                                    	$c_data=$m->FetchAll('newcase','id,c_date','','c_date desc','0,1');
	                                    	foreach($c_data as $id_show)
	                                    	{
	                                    		$id_show=$id_show['id'];
	                                    	}
                                    	}
                                    	$limit =$page->limit();
                                    	$data=$m->FetchAll('list','L_id,L_c_id,L_u_id,L_name,L_content,L_stat,L_note','L_c_id='.$id_show,'',$limit);
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

                                 	 echo ' <tr class="odd gradeX">
			    <td>'.$show['L_c_id'].'</td>
			    <td>'.$show['L_u_id'].'</td>
			    <td>'.$show['L_name'].'</td>
			    <td>'.$c_state.'</td>
			    <td>'.$show['L_note'].'</td>
			    <td><button type="button" class="c_xiugai btn btn-default" value="'.$show['id'].'">修改</button>&nbsp;
			            <button type="button" class="c_del btn btn-default" value="'.$show['id'].'"> 删除</button>
			             <button type="button" style="display:none;"   id="up_c_id'.$show['id'].'" value="'.$show['id'].'"> </button>  
			             <button type="button" style="display:none;"   id="up_c_name'.$show['id'].'" value="'.$show['c_name'].'"> </button>
			             <button type="button" style="display:none;"   id="up_c_content'.$show['id'].'" value="'.$show['c_content'].'"> </button>
			            <button type="button" style="display:none;"   id="up_c_state'.$show['id'].'" value="'.$c_state.'"> </button>  
			            <button type="button" style="display:none;"   id="up_c_note'.$show['id'].'" value="'.$show['c_note'].'"> </button> 
			    </td>  </tr>';
				}	

                                    ?>
                                    </tbody>
                                </table>
						<div class="form-group">
                            				<button id="add_list_start"  class="btn btn-default">增加案件</button>
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
				<form role="form" id="case_add_yan" name="case_add_yan" class='cmxform'  method="POST" action="newcase.php" >
                                             <table id="casetable"  width="100%" class="table table-striped table-bordered table-hover">
                                                 <tbody>
                                                    <tr>
                                                    	<td>
                                                    	  <div class="fleft col-lg-6">
                                                    	   <h4>情报名称</h4>	
                                                        <input id="c_name"  name="c_name" placeholder="名称" class="form-control">
                                                         <label id="c_name-error"  class="error"  for="c_name"></label>
                                                   	</div>
                                                   	<div class="fleft col-lg-9">
                                                    	   <h4>内容:</h4>
                                                    	    
        					   <textarea id="c_content" name="c_content" >
						内容不能为空
        					   </textarea>
                                                         <label id="c_content-error"  class="error"  for="c_content"></label>
                                                     </div>
                                                     <div class="fleft col-lg-6">
                                                    	   <h4>专项状态:</h4>
					    <input id="c_state" name="c_state" placeholder="状态(0关闭，1进行)" class="form-control">
                                                         <label id="c_state-error"  class="error"  for="c_state"></label>
                                                     </div>
                                                     <div class="fleft col-lg-10">
                                                         <h4>备注:</h4>
					    <input id="c_note" name="c_note" placeholder="备注" class="form-control">
                                                         <label id="c_note-error"  class="error"  for="c_note"></label>
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
var ue = UE.getEditor('c_content');
</script>

<?php 
		
	
 	if(isset($_POST['c_name']))
         	 {
            $c_name=$_POST['c_name'];
             $c_content=$_POST['c_content'];
             $c_state=$_POST['c_state'];
             $c_note=$_POST['c_note'];
             $query="INSERT INTO `newcase`( `c_name`,`c_content`,`c_state`,`c_note`) VALUES ('".$c_name."','".$c_content."','".$c_state."','".$c_note."')";
             echo $query;
             if($m->insert( $query,true))
             {
                echo "<script>alert('添加操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
             }
          }


?>