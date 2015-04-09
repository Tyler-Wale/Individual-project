<?php
    session_start();
	
    session_destroy;
	
	$_SESSION["id"] = '';
    $_SESSION["username"] = '';
	$_SESSION["user"] = '';
    $_SESSION["password"] = '';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>individual Project</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.23.1" />
	
	<!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    
	<div class="col-md-12" style="background-color: tan; border-bottom: 2px solid black; box-shadow: 3px 3px 5px #888888;">
		<a href="startup.html"><img src="games.jpg" style="margin-top: 5px;width:250px;height:90px;"></a>
		<br>
		<br>
	</div>
	<div class="col-md-4"></div>	
	<div class="col-md-4" style="margin-top: 40px;">

		<br/>
		<div class="panel panel-default" style="box-shadow: 2px 2px 7px #888888;">
			<div class="panel-heading"><b>Login</b></div>
				<div class="panel-body">
				<?php
					echo '<form method="POST" action="login.php">
					<input type="text" size="10" name="username" class="form-control" value="'. $uname .'" placeholder="Username">
					<input type="password" size="10" name="password" style="margin-top: 5px;" class="form-control" placeholder="Password"><br>
					'.$error.'
					<button type="submit" name="loginSubmit" style="width: 100%;" class="btn btn-success">Submit</button>
				</form>';
				$result = "";
				$_SESSION["loggedIn"] = $result;
				?>
				</div>
		</div>
		<a href="startup.html" style="text-decoration: none;"><span class="glyphicon glyphicon-arrow-left" style="padding-right:3px;"></span> Back to Home</a>
		
	</div>
	<div class="col-md-4"></div>
	</div>
	</center>
	</body>
	</html>	
		
		