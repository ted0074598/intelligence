<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>阜阳市网安应用平台</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="script/css.css" rel="stylesheet" type="text/css">
      <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>


    <script src="script/javascript.js"></script>
    <script src="script/validation/dist/jquery.validate.min.js"></script>
    <script src="script/validation/dist/localization/messages_zh.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
.error{
    color:red;
}
</style>
<body>

    <div class="container">
        <div class="row">
                  <div  class="fylogo  panel ">
                  </div>
            <div class="col-md-4 col-md-offset-4">

                <div class="login-panel panel panel-default">

                    <div class="panel-heading">

                        <h3 class="panel-title">阜阳市网安应用平台</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="denglu" method="POST"  action="yanzheng.php">
                            <fieldset>
                                <div class="form-group"><label id="p_psw-error"  class="error" width=10% for="p_no"></label>
                                    <input class="form-control"  placeholder="用户名" 第 id="p_no" name="p_no"  autofocus>
                                </div>
                                <div class="form-group"><label id="p_psw-error"  class="error" width=10% for="p_psw"></label>
                                    <input class="form-control" placeholder="密码" 第 id="p_psw" name="p_psw" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn  btn-primary btn-block"> 登陆 </button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

                            <script>
                                
                                   $.validator.setDefaults({
                                        submitHandler: function() {
                                            form.submit();
                                        }
                                    });
                            </script>

</body>

</html>
