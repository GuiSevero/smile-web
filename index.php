<!DOCTYPE html>
<html>
  <head>
    <title>Junction Quiz</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Le styles -->
 <link href="css/bootstrap.css" rel="stylesheet">
 <link href="css/bootstrap-responsive.css" rel="stylesheet">
 <link href="css/main.less" rel="stylesheet/less">

</head>


<body id="main_body" >	
	<input type="hidden" id="myIp" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>"/><br>
	<input type="hidden" id="serverIp" size="30" value="<?php echo $_SERVER['SERVER_ADDR']; ?>"/><br>
	<div class="container-fluid default-container">
		<div class="row-fluid">

			<div class="span4">
				<span class="label label-info" id="status"></span>				
			</div><!-- /span -->

	        <div class="span4">
				<h1 align="center">Junction Quiz</h1>		
			</div><!-- /span -->

			<div class="span4">
				<ul class="nav pull-right">
              		<li id="op-menu" class="btn">
	                	 <b><span id="userStatus"></span></b> - <i class="icon-user"></i>
                   </li>

              	</ul>
              	<div class="clearfix"></div>
			</div><!-- /span -->
		</div><!-- /row -->

	 	<div class="row-fluid">
        	<div class="span12">
				<!-- wraper for content flow -->	
				<div id="main-menu"></div>
			</div><!-- /span -->		
	  	</div><!-- /row -->

	</div> <!-- /container -->

	
	 

	<!-- Scripts -->
	<script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
	<script type="text/javascript" src="js/less.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>	
	<script type="text/javascript" src="js/smile.js"></script>
	<script type="text/javascript" language="Javascript">
        
        google.load('search', '1');

     	
     </script>
	</body>
</html>