<?php
	class yanzheng
	{
		public function show()
		{
			echo 'hello word';
		}

		public function checksesson($sesson)
		{
			if (!isset($sesson))
				{	

					echo '您无权访问该页,<b><a href="http://'.$_SERVER ['HTTP_HOST'].'/intelligence/index.php">点击返回</a></b>';
					exit();
				}
	
		}
		public function checkpori($type)
		{
			if ($type==1)
				{	

					echo '侦控账户,<b><a href="http://'.$_SERVER ['HTTP_HOST'].'/intelligence/boot.php">点击前往侦控模块</a></b>';
					exit();
				}	
		}

	}

?>