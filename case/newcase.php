<?php
include_once'casehead.php';
$m = new M(); 
$total=$m->Total('newcase');
$page=new PHPPage($total,20);
?>
<div id="page-wrapper" style="min-height: 414px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">专项管理</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
      	<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            用户列表
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
                                            <th width="10%">时间</th>
                                            <th width="10%">状态</th>
                                            <th width="10%">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    	$limit =$page->limit();
                                    	//echo $limit;
                                	$data=$m->FetchAll('newcase','id,c_name,c_content,c_date,c_state,c_note','','',$limit);
                                 	foreach ($data as $show)
                                 	{ //循环取出数据
                                 	if($show['c_state']==0)
                                 	{
                                 		$c_state='关闭';
                                 	}
                                 	else
                                 	{
                                 		$c_state='进行中';
                                 	}

                                 	 echo ' <tr class="odd gradeX">
			    <td>'.$show['id'].'</td>
			    <td>'.$show['c_name'].'</td>
			    <td><a href=#>内容查看</a></td>
			    <td>'.$show['c_date'].'</td>
			    <td>'.$c_state.'</td>
			    <td><button type="button" class="c_xiugai btn btn-default" value="'.$show['id'].'">修改</button>&nbsp;
			            <button type="button" class="c_del btn btn-default" value="'.$show['id'].'"> 删除</button>
			             <button type="button" style="display:none;"   id="up_c_id'.$show['id'].'" value="'.$show['id'].'"> </button>  
			             <button type="button" style="display:none;"   id="up_c_name'.$show['id'].'" value="'.$show['c_name'].'"> </button>
			             <button type="button" style="display:none;"   id="up_c_content'.$show['id'].'" value="'.$show['c_content'].'"> </button>
			             <button type="button" style="display:none;"   id="up_c_date'.$show['id'].'" value="'.$show['c_date'].'"> </button>
			            <button type="button" style="display:none;"   id="up_c_state'.$show['id'].'" value="'.$c_state.'"> </button>  
			            <button type="button" style="display:none;"   id="up_c_note'.$show['id'].'" value="'.$show['c_note'].'"> </button> 
			    </td>  </tr>';
				}	

                                    ?>
                                    </tbody>
                                </table>
						<div class="form-group">
                            				<button id="addcase"  class="btn btn-default">增加案件</button>
                            				</div>	
			                                <div class="form-group">
			                                 <?php
			                                    echo $page->show();
			                                    ?>
			                             </div>
                            	</div>
                            <!-- /.table-responsive -->
                     		<div class="form-group">
				<form role="form" id="case_add_yan" name="case_add_yan" class='cmxform'  method="POST" action="newcase.php" >
                                             <table id="casetable" style="display: none;" width="100%" class="table table-striped table-bordered table-hover">
                                                 <tbody>
                                                    <tr>
                                                    	<td>
                                                    	  <div class="fleft col-lg-6">
                                                    	   <h4>专项名称</h4>	
                                                        <input id="c_name"  name="c_name" placeholder="名称" class="form-control">
                                                         <label id="c_name-error"  class="error"  for="c_name"></label>
                                                   	</div>
                                                   	<div class="fleft col-lg-9">
                                                    	   <h4>内容:</h4>
                                                    	  <!--   <script id="editor" type="text/plain" style="width:1024px;height:500px;">

        					    </script> -->
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
                                                     </div>
                                                     </td>
                                                    </tr>

                                               </tbody>  

                                            </table>
                                              </form>
                                         <form role="form"  id="case_upd_yan" name="case_upd_yan" class='cmxform'  method="POST" action="newcase.php" >
                                              <table id='newcase'  name="newcase" style="display:none;" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                 <tbody>
                                                  <tr>
                                                    <td>
                                                        <input id="upd_id" name="upd_id" value="" style="display: none">

                                                        <div class="fleft col-lg-6">
                                                         		<h4>专项名称</h4>
						<input id="upd_name" name="upd_name" placeholder="专项" class="form-control">
                                                         <label id="upd_name-error"  class="error"  for="upd_name"></label>	
						</div>
						<div class="fleft col-lg-9">
							<h4>内容:</h4>
							<script id="up_editor" type="text/plain" style="width:1024px;height:300px;">
							</script>
  							<textarea id="upd_content" name="upd_content" placeholder="专项内容" class="form-control"></textarea>
							<label id="upd_content-error"  class="error"  for="upd_content"></label>
						</div>
						<div class="fleft col-lg-6">
							<h4>专项状态:</h4>

 							<input id="upd_state" name="upd_state" placeholder="状态(0关闭，1进行)" class="form-control">
                                                         		<label id="upd_state-error"  class="error"  for="upd_state"></label>
						</div>
						<div class="fleft col-lg-10">
							<h4>备注:</h4>
 							<input id="upd_note" name="upd_note" placeholder="备注" class="form-control">
                                                         		<label id="upd_note-error"  class="error"  for="upd_note"></label>
						 </div>
						 <div class="fleft col-lg-10">
							<button  type="buttuon" onClick="up_uptext()" class="btn btn-default">修改</button>
                                                    			<button class="c_xiugai_cance  btn btn-default">取消</button>
						</div>
                                                      
                                                           


                                                     </td>
                                                     
                                                     
                                                    </tr>

                                               </tbody>  
                                            </table>
                                         </form>  
      
  				
                        </div>
                       				








                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->

            </div>





            <script>
                                
                                   $.validator.setDefaults({
                                        submitHandler: function() {
                                            form.submit();
                                        }
                                    });

	var ue = UE.getEditor('c_content');
	var ue = UE.getEditor('up_editor');

	    function uptext(){
	        if (!UE.getEditor('c_content').hasContents()){
	        alert('请先填写内容!');
	        }else{
	   	document.case_add_yan.submit();
	        }
	    }
	      function up_uptext(){
	        if (!UE.getEditor('up_editor').hasContents()){
	        alert('请先填写内容!');
	        }else{
	        document.case_upd_yan.submit();
	        }
	    }

</script>   
            <!-- /.row -->
<?php
	  if(isset($_POST['c_name']))
          {
            $c_name=$_POST['c_name'];
             $c_content=$_POST['c_content'];
             $c_state=$_POST['c_state'];
             $c_note=$_POST['c_note'];
	  $c_date= date('Y-m-d H:i:s',time());
             $query="INSERT INTO `newcase`( `c_name`,`c_content`,`c_state`,`c_date`,`c_note`) VALUES ('".$c_name."','".$c_content."','".$c_state."','".$c_date."','".$c_note."')";
             echo $query;
             if($m->insert( $query,true))
             {
                echo "<script>alert('添加操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
             }
          }
	 if(isset($_GET['c_dele_id']))
       	 {
            $d_id=$_GET['c_dele_id'];
            $d_id='id='.$d_id; 
            //echo $d_id;
            if( $m->Del('newcase',$d_id))
            {   
                    echo "<script>alert('删除操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
            }
     	 }
     	 if(isset($_POST['upd_id']))
	{
	        $upd_id=$_POST['upd_id'];
	        $upd_id="id=".$upd_id;
	        $c_name=$_POST['upd_name'];
	        $c_content=$_POST['upd_content'];
	        $c_state=$_POST['upd_state'];
	        $c_note=$_POST['upd_note'];
	        if($m->Update("newcase", array('c_name'=> $c_name,'c_content'=> $c_content,'c_state'=> $c_state,'c_note'=> $c_note), $upd_id))
	        {
	            echo "<script>alert('更新操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	        }
	}
?>