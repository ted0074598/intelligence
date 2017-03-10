<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
include_once 'bridge.php';
$m=new M();
	     
			if(isset($_POST['p_no']))
			{

						$where=$_POST['p_no'];
						$num_rows=$m->Total('user',"name='".$where."'");
                                
                                      
				if($num_rows>0)
                      {	     
                               if($data = $m->GetRow("SELECT `id`,`name`,`password`,`priority`,`class`  FROM `user` WHERE name='".$_POST['p_no']."'"))
                               {	
                                      if ($data['name']==$_POST['p_no']&&$data['password']==$_POST['p_psw']) 
                                        {
                                           $_SESSION['p_no']=$data['name'];
                                           $_SESSION['priority']=$data['priority'];
                                           $_SESSION['class']=$data['class'];
                                           $_SESSION['u_id']=$data['id'];
                                           $vlue=$_SESSION['p_no'];
                                          echo "<script>alert('登陆成功".$vlue.$_SESSION['p_no']."');location.href='boot.php'</script>";
                        				}
                        				else
            	                         {
            	                     	     echo "<script>alert('用户名密码错误');location.href='index.php'</script>";
            	                         }
                                }
 
                      }
                    else
                    {  
                    	 echo "用户名不存在";
                       //echo "<script>alert('用户名不存在');location.href='index.php'</script>";
                    }
  		 }
  		 else if(isset($_GET['logout']))
  		 {
  		 	session_start();
			unset($_SESSION['p_no']);
			echo "<script>alert('您已成功登出！');location.href='index.php'</script>";
  		 }




?>