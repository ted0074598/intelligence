<?php
include_once'adminhead.php';
?>

      

        <div id="page-wrapper" style="min-height: 266px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">列表</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
         <div class="row" >
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          配件列表
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>部位</th>
                                        <th>品牌</th>
                                        <th>规格</th>
                                        <th>价格</th>
                                        <th width="15%">操作管理</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <?php



                                     $query='SELECT * FROM `fofo_spare`';
                                     $result=$link->query($query);
                                     while ($show=$result->fetch_array(MYSQLI_ASSOC)) 
                                     {
                                            

    echo ' <tr class="odd gradeX">
    <td>'.$show['part'].'</td>
    <td>'.$show['brand'].'</td>
     <td>'.$show['size'].'</td>
     <td>'.$show['price'].'.00</td>
     <td>
                            <button type="button" class="xiugai_id btn btn-default" value="'.$show['id'].'">修改</button>&nbsp;
                            <button type="button" class="part_del btn btn-default" value="'.$show['id'].'"> 删除</button>
                            <button type="button" style="display:none;"   id="up_s_id'.$show['id'].'" value="'.$show['id'].'"> </button>  
                            <button type="button" style="display:none;"   id="up_s_part'.$show['id'].'" value="'.$show['part'].'"> </button> 
                            <button type="button" style="display:none;"   id="up_s_brand'.$show['id'].'" value="'.$show['brand'].'"> </button> 
                            <button type="button" style="display:none;"   id="up_s_size'.$show['id'].'" value="'.$show['size'].'"> </button> 
                            <button type="button" style="display:none;"   id="up_s_price'.$show['id'].'" value="'.$show['price'].'"> </button> 
    </td> </tr>';
                                     }
                                     ?>
                                        
                                        
                                   
                                   
                                </tbody>
                             </table>
                            <!-- /.table-responsive -->
                             
                                        <div class="form-group">
                                        <form role="form"  id="addpart" class='cmxform'  method="POST" action="list.php" >
                                             <table id='addtable' style="display: none;" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <tbody>
                                                    <tr>
                                                    <td><input id='type' value="spare" style="display: none">
                                                        <input id='part'  name='part' placeholder="部位" class="form-control">
                                                        <label id="p_psw-error"  class="error"  for="part"></label>
                                                        </td>
                                                    <td><input id='brand' name='brand' placeholder="品牌"  class="form-control">
                                                            <label id="brand-error"  class="error"  for="brand"></label>
                                                    </td>
                                                    <td><input id='size' name='size' placeholder="规格"  class="form-control">
                                                            <label id="size-error"  class="error"  for="size"></label>
                                                    </td>
                                                    <td><input id='price' name='price' placeholder="价格"  class="form-control">
                                                            <label id="price-error"  class="error"  for="price"></label>
                                                    </td>
                                                    <td width="10%"><button  type="submit" class="btn btn-default">确认增加</button></td>
                                                    </tr>

                                               </tbody>  
                                           </table>
                                             </form>
                                            <form role="form"  id="updatpart" class='cmxform'  method="POST" action="list.php" >
                                              <table id='updattable' style="display: none;" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                 <tbody>
                                                    <tr>
                                                    <td><input id='up_id' name='up_id'  style="display: none"  value="">
                                                        <input id='up_part'  name='up_part' placeholder="部位" class="form-control" value="">
                                                        <label id="p_psw-error"  class="error"  for="up_part"></label>
                                                        </td>
                                                    <td><input id='up_brand' name='up_brand' placeholder="品牌"  class="form-control" value="">
                                                            <label id="brand-error"  class="error"  for="up_brand"></label>
                                                    </td>
                                                    <td><input id='up_size' name='up_size' placeholder="规格"  class="form-control" value="">
                                                            <label id="size-error"  class="error"  for="up_size"></label>
                                                    </td>
                                                    <td><input id='up_price' name='up_price' placeholder="价格"  class="form-control" value="">
                                                            <label id="price-error"  class="error"  for="up_price"></label>
                                                    </td>
                                                    <td width="10%"><button  type="submit" class="btn btn-default">修改</button>
                                                    <button class="xiugai_cance_id  btn btn-default">取消</button></td>
                                                    </tr>

                                               </tbody>  
                                            </table>
                                         </form>
                                        </div>
                            

                           <button id='add'  class="btn btn-default">增加配件项目</button>
                            <button id='quxiao' style="display: none;"   class="btn btn-default">取消增加</button>
                      
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

                            
        </div>
        <!-- /#page-wrapper -->
 </div>
    <!-- /#wrapper -->

<script>
                                
                                   $.validator.setDefaults({
                                        submitHandler: function() {
                                            form.submit();
                                        }
                                    });
</script>   




</body>
</html>
<?php

if(isset($_POST['part']))
{
    $part=$_POST['part'];
    $brand=$_POST['brand'];
    $size=$_POST['size'];
    $price=$_POST['price'];
    $query="INSERT INTO `fofo_spare`( `part`, `brand`, `size`,`price`) VALUES ('".$part."','".$brand."','".$size."','".$price."')";
    if( $m->insert($query,true))
    {   
            echo "<script>alert('操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
    }

}

if(isset($_GET['part_id']))
{
    $part_id=$_GET['part_id'];
    $part_id='id='.$part_id; 
    echo $part_id;
    $m=new M();
    if( $m->Del('fofo_spare',$part_id))
    {   
            echo "<script>alert('操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
    }

}
if(isset($_POST['up_id']))
{
        $up_id=$_POST['up_id'];
        $up_id="id=".$up_id;
        $up_part=$_POST['up_part'];
        $up_brand=$_POST['up_brand'];
        $up_size=$_POST['up_size'];
        $up_price=$_POST['up_price'];
        if($m->Update("fofo_spare", array('part'=> $up_part, 'brand'=> $up_brand, 'size'=> $up_size, 'price'=> $up_price), $up_id))
        {
            echo "<script>alert('操作成功');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
        }
}
?>
