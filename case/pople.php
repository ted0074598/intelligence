<?php
include_once'casehead.php';
$m = new M(); 
$total=$m->Total('user');
$page=new PHPPage($total,30);
?>
<div id="page-wrapper" style="min-height: 414px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">用户管理</h1>
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
                                            <th>用户</th>
                                             <th>密码</th>
                                            <th>区域</th>
                                            <th>权限</th>
                                           <th width="10%">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    	$limit =$page->limit();
                                	$data=$m->FetchAll('user','id,name,are,password,priority','','',$limit);
                                 	foreach ($data as $show)
                                 { //循环取出数据
                                 	if($show['priority']==0)
                                 	{
                                 		$priority='管理员';
                                 	}
                                 	else
                                 	{
                                 		$priority='用户';
                                 	}


			    echo ' <tr class="odd gradeX">
			    <td>'.$show['id'].'</td>
			    <td>'.$show['name'].'</td>
			    <td>'.$show['password'].'</td>
			    <td>'.$show['are'].'</td>
			    <td>'.$priority.'</td>
			    <td><button type="button" class="d_xiugai btn btn-default" value="'.$show['id'].'">修改</button>&nbsp;
			            <button type="button" class="d_del btn btn-default" value="'.$show['id'].'"> 删除</button>
			             <button type="button" style="display:none;"   id="up_d_id'.$show['id'].'" value="'.$show['id'].'"> </button>  
			             <button type="button" style="display:none;"   id="up_d_part'.$show['id'].'" value="'.$show['name'].'"> </button>
			             <button type="button" style="display:none;"   id="up_d_pws'.$show['id'].'" value="'.$show['password'].'"> </button>
			            <button type="button" style="display:none;"   id="up_d_are'.$show['id'].'" value="'.$show['are'].'"> </button>  
			            <button type="button" style="display:none;"   id="up_d_pri'.$show['id'].'" value="'.$show['priority'].'"> </button>  
			    </td>  </tr>';
				}	

                                    ?>
                                    </tbody>
                                </table>
                            	</div>
                            <!-- /.table-responsive -->
                     		<div class="form-group">
				<form role="form"  id="plus_part" class='cmxform'  method="POST" action="pople.php" >
                                             <table id="deptable" style="display: none;" width="100%" class="table table-striped table-bordered table-hover">
                                                 <tbody>
                                                    <tr>
                                                    <td>
                                                        <input id="in_name" name="in_name" placeholder="用户名" class="form-control">
                                                         <label id="in_name-error"  class="error"  for="in_name"></label>
                                                     </td>
                                                     <td>
					    <input id="in_pws" name="in_pws" placeholder="密码" class="form-control">
                                                         <label id="in_pws-error"  class="error"  for="in_pws"></label>
                                                     </td>
                                                     <td>
					    <input id="in_are" name="in_are" placeholder="区域" class="form-control">
                                                         <label id="in_are-error"  class="error"  for="in_are"></label>
                                                     </td>
                                                     <td>
					    <input id="in_pri" name="in_pri" placeholder="权限（0为管理员，1为用户）" class="form-control">
                                                         <label id="in_pri-error"  class="error"  for="in_pri"></label>
                                                     </td>
                                                     <td width="10%"><button type="submit" class="btn btn-default">确认增加</button></td>
                                                    </tr>

                                               </tbody>  

                                            </table>
                                              </form>
                                         <form role="form"  id="up_depat" name="up_d" class='cmxform'  method="POST" action="pople.php" >
                                              <table id='fofo'  name="fofo" style="display:none;" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                 <tbody>
                                                  <tr>
                                                    <td>
                                                        <input id="upd_id" name="upd_id" value="" style="display: none">
                                                        <input id="upd_name" name="upd_name" placeholder="单位名称" class="form-control">
                                                         <label id="upd_name-error"  class="error"  for="upd_name"></label>
                                                         </td>
                                                         <td>
                                                          <input id="upd_pws" name="upd_pws" placeholder="密码" class="form-control">
                                                         <label id="upd_pws-error"  class="error"  for="upd_pws"></label>
                                                         </td>
                                                         <td>
                                                          <input id="upd_are" name="upd_are" placeholder="地区" class="form-control">
                                                         <label id="upd_are-error"  class="error"  for="upd_are"></label>
                                                         </td>
                                                         <td>
                                                          <input id="upd_pri" name="upd_pri" placeholder="权限(0为管理员，1为用户)" class="form-control">
                                                         <label id="upd_pri-error"  class="error"  for="upd_pri"></label>
                                                     </td>
                                                     <td width="10%">
                                                     <button  type="submit" class="btn btn-default">修改</button>
                                                    <button class="xiugai_cance_id  btn btn-default">取消</button></td></td>
                                                    </tr>

                                               </tbody>  
                                            </table>
                                         </form>  
      

                            <button id="adddep" class="btn btn-default">增加用户</button>
                            <button id="quxiaodep"  style="display: none;" class="btn btn-default">取消增加</button>
                        

                                        </div>
                       				

			                                <div class="form-group">
			                                 <?php
			                                    echo $page->show();
			                                    ?>
			                             </div>







                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->

            </div>
            <!-- /.row -->
<?php
	  if(isset($_POST['in_name']))
	          {
	             $in_name=$_POST['in_name'];
	             $in_pws=$_POST['in_pws'];
	             $in_are=$_POST['in_are'];
	             $in_pri=$_POST['in_pri'];
	             $query="INSERT INTO `user`( `name`,`password`,`are`,`priority`) VALUES ('".$in_name."','".$in_pws."','".$in_are."','".$in_pri."')";
	             echo $query;
	             if($m->insert( $query,true))
	             {
	                echo "<script>alert('添加操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	             }
	          }
	 if(isset($_GET['indele_id']))
       	 {
            $d_id=$_GET['indele_id'];
            $d_id='id='.$d_id; 
            //echo $d_id;
            if( $m->Del('user',$d_id))
            {   
                    echo "<script>alert('删除操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
            }
     	 }
     	 if(isset($_POST['upd_id']))
	{
	        $upd_id=$_POST['upd_id'];
	        $upd_id="id=".$upd_id;
	        $in_name=$_POST['upd_name'];
	        $in_pws=$_POST['upd_pws'];
	        $in_are=$_POST['upd_are'];
	        $in_pri=$_POST['upd_pri'];
	        if($m->Update("user", array('name'=> $in_name,'password'=> $in_pws,'are'=> $in_are,'priority'=> $in_pri), $upd_id))
	        {
	            echo "<script>alert('更新操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
	        }
	}
?>