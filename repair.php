<?php
    include_once 'head.php';
    include_once 'bridge.php';
    $m = new M(); 
    $total = $m->Total('fofo_department');
    $page = new PHPPage($total,20);
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
                        <h3><p class="text-danger">请详细填写信息，以便维修人员快速维护。</p></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6 center-block">
                                    <form role="form"  id="songxiu" class='cmxform'  method="POST" action="work.php" >
                                     <div class="form-group">
                                            <label>单位</label>
                                            <select name='depart_id' class="form-control">
                                            <?php 

                                             
                                              $data=$m->FetchAll('fofo_department','*');
                                              foreach ($data as $show)
                                               { 
                                                  echo '<option value='.$show['id'].'>'.$show['depart_name'].'</option>';
                                                
                                               }

                                            ?>
                                               
                                             </select>
                                        </div>
                                        <div class="form-group">
                                            <label>送修人</label><label id="p_name-error"  class="error" width=10% for="p_name"></label>
                                            <input placeholder="请填写联系人姓名，方便联系。"  id='p_name'  name='p_name' class="form-control">
                                         
                                        </div>
                                         <div class="form-group">
                                            <label>联系电话</label><label id="p_photo-error" class="error" for="p_photo"></label>
                                            <input  placeholder="请填写联系人手机号码，方便沟通联系" id='p_photo'  name='p_photo' class="form-control">
                                           
                                        </div>
                                         <div class="form-group">
                                            <label>机器品牌</label>
                                            <select  name='c_brand' class="form-control">
                                                <option>戴尔</option>
                                                <option>联想</option>
                                                <option>清华同方</option>
                                                <option>其他</option>
                                             </select>
                                        </div>
                                       <div class="form-group">
                                            <label>问题描述</label><label id="c_fault-error" class="error" for="c_fault"></label>
                                            <textarea  placeholder="请详细填写信息，以便维修人员快速维护。" id='c_fault' name='c_fault' class="form-control" rows="3"></textarea>
                                        </div>
                                      
                                   
                                    
                                        <button type="submit" class="btn btn-default">提交申请</button>
                                        <a class="btn btn-default" href="index.php">返回主页</a>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <script>
                                
                                   $.validator.setDefaults({
                                        submitHandler: function() {
                                            form.submit();
                                        }
                                    });
                            </script>
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
 