<!DOCTYPE html>
<html>
<head>
        <title>Tyler Wale - Entry Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                <script>
                
                function selectLoc()
                {
                        var selection = document.getElementById("selection");
                        var index = selection.options[selection.selectedIndex].value;
                        
                        document.getElementById("lid").value = index;
                }
        
        </script>
        </head>
<body>
<br>
	<div class="col-md-12" style="background-color: tan; border-bottom: 2px solid black; box-shadow: 3px 3px 5px #888888;"> 
	<a href="startup.html"><img src="games.jpg" style="margin-top: 5px;width:250px;height:90px;"></a> <?php 
	if ($_SESSION["user"] != '') { $user = $_SESSION['user']; 
	echo '<p style="font-size:18px; float: right; margin-top: 40px; margin-right: 20px;">Welcome <b>' . $user . '</b>!</p>'; } 
	else { echo '<form class="navbar-form navbar-right" style="margin-top: 35px;" method="POST" action="login.php"> <input type="text" size="9" name="username" class="form-control" placeholder="Username"> <input type="password" size="9" name="password" class="form-control" placeholder="Password"> <button type="submit" name="loginSubmit" class="btn btn-success">Submit</button> </form>'; } ?> 
	<br> 
	<br> 
	</div> 
<div class="col-md-4">
        <form name='basic' method='POST' action='startup.html' onSubmit='return validate();'>
                <table class="table table-condensed" style="border: 1px solid #dddddd; border-radius: 5px; box-shadow: 2px 2px 10px;">
                        <tr><td colspan="2" style="text-align: center; border-radius: 5px; color: white; background-color:#333333;"><h2>Sign Up</h2></td></tr>
                        <tr><td>Login: </td><td><input type='edit' name='login' value='' size='20'></td></tr>
                        <tr><td>Password: </td><td><input type='edit' name='password' value='' size='20'></td></tr>
						</select></td><td><input type="hidden" id="lid" value="1" name="locId"></td></tr>
                        <tr><td><input type="submit" name="submit" class="btn btn-success" value="Create Account"></td>
                                <td style="text-align: right;"><input type="reset" class="btn btn-danger" value="Reset Form"></td></tr>
                </table>
        </form>
</div>
	<div class="col-md-12"> <br/> 
	</div>
			<?php $hostname="localhost"; 
		$username="CIS355tawale";
		$password="Destiny1";
		$dbname="CIS355tawale"; 
		$usertable="people"; 
		$mysqli = new mysqli($hostname, $username, $password, $dbname); 
	checkConnect($mysqli);
	?>
</body>
</html>
