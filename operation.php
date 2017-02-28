<?php
include_once 'bridge.php';
include_once 'head.php';
?>


<div  style="width: 80%;margin: 0 auto">
					
			<div  class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            送修表格
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id='fofo1' class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan='6' style='text-align:center'><p class="lead">太和县网安大队维修电脑清单</p></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td width="13%"><b>单位</b></td>
                                            <td width="20%"> 
                                            <?php echo $depart_name;?> 
                                            </td>
                                            <td width="13"><b>联系人</b></td>
                                            <td width="20%">
											<?php echo $p_name;?> 	
                                             </td>
                                            <td width="10%"><b>日期</b></td>
                                            <td width="20">
                                            <?php echo $date_time;?> 
                                             </td>
                                        </tr>
                                        <tr>
                                        	<td>
                                        		<b>电话</b>
                                        	</td>
                                        	<td colspan="5">
												 <?php echo $p_photo;?> 
                                        	</td>

                                        </tr>
                                        <tr>
                                        	<td colspan="6" style='text-align:center'><b>问题描述</b></td>
                                        </tr>
                                        <tr>
                                        	<td colspan="6" style='text-align:center'>
                                        		<?php echo $c_fault;?> 
                                        	</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive --> 
							



                            
                            <button onclick="jQuery('#fofo1').print()" type="submit" class="btn btn-default">打印表格</button>
                            <button type="reset" class="btn btn-default">返回</button>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                </div>	

		</div>
		<!-- /.panel -->