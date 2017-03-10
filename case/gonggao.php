<?php
include_once 'casehead.php';
$m = new M(); 
$total=$m->Total('newcase');
$page=new PHPPage($total,20);
?>
<div id="page-wrapper" style="min-height: 414px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="center page-header" >公&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;告</h1>
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

                                            <th width="5%">序号</th>
                                            <th>名称</th>
                                            <th>内容</th>
                                            <th width="10%">时间</th>
                                            <th width="10%">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            
                                    	$limit =$page->limit();
                                    	//print_r($limit);
                                	$data=$m->FetchAll('news','n_id,n_name,n_date','','',$limit);
                                 	$i=1;
                                          foreach ($data as $show)
                                 	{ //循环取出数据
                                 	
                                 	 echo ' <tr class="odd gradeX">
			    <td>'.$i.'</td>
			    <td>'.$show['n_name'].'</td>
			    <td><a href=#>内容查看</a></td>
			    <td>'.$show['n_date'].'</td>
			     <td><button type="button" class="n_xiugai btn btn-default" value="'.$show['n_id'].'">修改</button>&nbsp;
			            <button type="button" class="n_del btn btn-default" value="'.$show['n_id'].'"> 删除</button>
			             <button type="button" style="display:none;"   id="up_c_id'.$show['n_id'].'" value="'.$show['n_id'].'"> </button>  
			             <button type="button" style="display:none;"   id="up_c_name'.$show['n_id'].'" value="'.$show['n_name'].'"> </button>
			             <button type="button" style="display:none;"   id="up_c_content'.$show['n_id'].'" value="'.$show['n_date'].'"> </button>
			          
			    </td>  </tr>';
                                            $i++;
				}	

                                    ?>
                                    </tbody>
                                </table>
						<div class="form-group">
                            				<button id="add_news"  class="btn btn-default">增加公告</button>
                            				</div>	
			                                <div class="form-group">
			                                 <?php
			                                    echo $page->show();
			                                    ?>
			                             </div>
                            	</div>
                            <!-- /.table-responsive -->
                            <div id="new_wall" class="reveal-modal-bg" style="display: block; cursor: pointer;display:none"></div>
                     		<div id="new_add" class="list_add form-group" style="opacity:4;display:none">
				<form role="form" id="news_add_yan" name="case_add_yan" class='cmxform'  method="POST" action="gonggao.php" >
                                             <table id="casetable"  width="100%" class="table table-striped table-bordered table-hover">
                                                 <tbody>
                                                    <tr>
                                                    	<td>
                                                    	  <div class="fleft col-lg-6">
                                                    	   <h4>公告名称</h4>
                                                    	   <input id="n_class" style="display: none;"  name="n_class" placeholder="类型" class="form-control" value="<?php echo $_SESSION['class']?>"> 	
                                                        <input id="n_name"  name="n_name" placeholder="名称" class="form-control">
                                                         <label id="n_name-error"  class="error"  for="n_name"></label>
                                                   	</div>
                                                   	<div class="fleft col-lg-9">
                                                    	   <h4>内容:</h4>
                                                    	  <!--   <script id="editor" type="text/plain" style="width:1024px;height:500px;">

        					    </script> -->
        					   <textarea id="n_content" name="n_content" >
						内容不能为空
        					   </textarea>
                                                         
                                                     </div>
                                                    <div class="fleft col-lg-10">
                                                     <button type="submit"  class="btn btn-default">确认增加</button>
                                                     <button id="list_new_cance"  class="btn btn-default">取消</button>
                                                     </div>
                                                     </td>
                                                    </tr>

                                               </tbody>  

                                            </table>
                                              </form>
                                      </div>
                                      <div>
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
						          <textarea id="upd_content" name="upd_content" >
                                                                            </textarea>
							
						</div>
						<div class="fleft col-lg-6">
						       <h4>专项状态:</h4>
                                                                        <select class="form-control" name="upd_state" id="upd_state">
                                                                        <option value='1'>进行中</option>
                                                                        <option value='0'>关闭中</option>
                                                                        </select>
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

	var ue = UE.getEditor('n_content');
	var ue = UE.getEditor('upd_content');

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
	  if(isset($_POST['n_name']))
          {
            $n_name=$_POST['n_name'];
            $n_content=$_POST['n_content'];
            $n_class=$_POST['n_class'];
            $n_date= date('Y-m-d H:i:s',time());
            $query="INSERT INTO `news`( `n_name`,`n_content`,`n_class`,`n_date`) VALUES ('".$n_name."','".$n_content."','".$n_class."','".$n_date."')";
            //echo $query;
             if($m->insert( $query,true))
             {
                echo "<script>alert('添加操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
             }
          }
	 if(isset($_GET['n_del']))
       	 {
            $d_id=$_GET['n_del'];
            $d_id='n_id='.$d_id; 
            //echo $d_id;
            if($m->Del('news',$d_id))
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