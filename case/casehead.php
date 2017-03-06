<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="维系系统" />
<meta name="keywords" content="维修系统" />
 <title>网侦案件情报系统</title>
 <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
<!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
<!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- myselfe css -->
  <link href="../script/css.css" rel="stylesheet">
     <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/jquery/jquery.print.js"></script>
    <!-- print JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
	<!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
	<!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../script/javascript.js"></script>
    
    <script src="../script/validation/dist/jquery.validate.min.js"></script>
    <script src="../script/validation/dist/localization/messages_zh.js"></script>
                    <!-- UEditor  -->
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src=../"ueditor/lang/zh-cn/zh-cn.js"></script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
                    <!-- UEditor  -->
</head>


<style>
.error{
    color:red;
   }
</style>
<?php

include_once '../bridge.php';
$yanzheng=new yanzheng();
$yanzheng->checksesson($_SESSION['p_no']);
echo $_SESSION['p_no'];
$m = new M(); 
?>
<body youdao="bind">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default " role="navigation" style="margin-bottom: 0">
           
                     <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="list.php">网侦案件情报系统</a>
                
            </div>
            
            <ul class="nav navbar-top-links navbar-right">
                
               <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="login.php"><i class="fa fa-user fa-fw"></i>登陆</a>
                        </li>
                        <li><a href="yanzheng.php?logout"><i class="fa fa-sign-out fa-fw"></i>退出</a>
                        </li>
                        
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
               <!-- /.navbar-top-links -->
<!-- [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar]-->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav in" id="side-menu">
                     
                        <li>
                            <a href="newcase.php"><i class="fa fa-dashboard fa-fw"></i>专项管理</a>
                        </li>
                         <li>
                            <a href="list.php"><i class="fa fa-crosshairs fa-fw"></i>情报管理</a>
                        </li>
                     
                        <li>
                            <a href="pople.php"><i class="fa fa-male  fa-fw"></i>用户管理</a>
                        
                        </li>
                         <li >
                            <a href=""><i class="fa fa-bar-chart-o fa-fw"></i> 统计图表<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse" aria-expanded="true">
                                <li>
                                    <a href="#">纵向统计</a>
                                </li>
                                <li>
                                    <a href="#">横向统计</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                            <li>
                            <a href="list.php"><i class="fa fa-phone-square fa-fw"></i>联系方式</a>
                        </li>  
                           <li>
                            <a href="list.php"><i class="fa fa-comments  fa-fw"></i>经验讨论</a>
                        </li> 
                     
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>

 </nav>
<!--  [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar] [sidebar]/.navbar-static-side -->
 