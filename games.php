<?php
        ini_set("session.cookie_domain", ".cis355.com");
        session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
        <title>Individual Project</title>
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
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<body>
        <div class="col-md-12" style="background-color: tan; border-bottom: 2px solid black; box-shadow: 3px 3px 5px #888888;">
                <a href="startup.html"><img src="games.jpg" style="margin-top: 5px;width:250px;height:90px;"></a>
                <?php
                        if ($_SESSION["user"] != '')
                        {
                                $user = $_SESSION['user'];
                                echo '<p style="font-size:18px; float: right; margin-top: 40px; margin-right: 20px;">Welcome <b>' . $user . '</b>!</p>';
                        }

                        else
                        {
                                 echo '<form class="navbar-form navbar-right" style="margin-top: 35px;" method="POST" action="login.php">
                                <input type="text" size="9" name="username" class="form-control" placeholder="Username">
                                <input type="password" size="9" name="password" class="form-control" placeholder="Password">
                                <button type="submit" name="loginSubmit" class="btn btn-success">Submit</button>
                                </form>';
                        }
                ?>
                <br>
                <br>
        </div>
        <div class="col-md-12">
        <br/>
<?php

$hostname="localhost";
$username="CIS355tawale";
$password="Destiny1";
$dbname="CIS355tawale";
$usertable="games";

$system_id =  $_SESSION["systemId"];


$mysqli = new mysqli($hostname, $username, $password, $dbname);
checkConnect($mysqli);

if($mysqli)
{
        $dTable = true;
        if($_POST["hid"] != "")
        {
                $newID = $_POST['hid'];
                deleteRecord($mysqli);
                displayTable($mysqli);
                $dTable = false;
        }

        if($_POST['uid'] != "" && isset($_POST['update']))
        {
                $index = $_POST['uid'];
                global $usertable;

                if($result = $mysqli->query("SELECT * FROM $usertable WHERE id = $index"))
                {
                        while($row = $result->fetch_row())
                        {
                                echo '  <br>
                                                <div class="col-md-4">
                                                <form name="basic" method="POST" action="games.php">
                                                        <table class="table table-condensed" style="border: 1px solid #dddddd; border-radius: 5px; box-shadow: 2px 2px 10px;">
                                                                <tr><td colspan="2" style="text-align: center; border-radius: 5px; color: white; background-color:#333333;"><h2>Game</h2></td></tr>
                                                                <tr><td>Id: </td><td><input type="hidden" name="id" value="'. $row[0] .'" size="11"></td></tr>
                                                                <tr><td>Game: </td><td><input type="edit" name="game" value="' . $row[1] . '" size="20"></td></tr>
																<tr><td>System: </td><td><input type="hidden" name="system_type" value="' . $row[2] . '" size="50"></td></tr>';

                                                                $mysqli = new mysqli($hostname, $username, $password, $dbname);

                                                                // Init statement
                                                                $stmt = $mysqli->stmt_init();

                                                                // Set Select query
                                                                $sql = "SELECT * FROM school";

                                                                // Init school variable
                                                                $dbId = "";
                                                                $school = "";


                                                                // If the statement was prepared
                                                                if($stmt = $mysqli->prepare($sql))
                                                                {
                                                                        // Execute statement
                                                                        if($stmt->execute())
                                                                        {
                                                                                // Bind query result
                                                                                $stmt->bind_result($dbId, $school);

                                                                                // Fetch the statement
                                                                                while ($stmt->fetch())
                                                                                {
                                                                                        // Output the schools
                                                                                        echo "<option value='" . $dbId ."'>" . $school . "</option>";
                                                                                }
                                                                        }
                                                                }

                                                                $mysqli->close();

                                                                echo '</select></td></tr>
                                                                <tr><td><input type="submit" name="submitUpdate" class="btn btn-primary" value="Update Entry"></td>
                                                                        <td style="text-align: right;"><input type="reset" class="btn btn-danger" value="Reset Form"></td></tr>
                                                        </table>

                                                        <input type="hidden" name="index" value="' . $row[0] . '">
                                                        <input type="hidden" id="hLoc" name="locId" value="' . $row[9] . '">
                                                </form>
                                                <script>
                                                        document.getElementById("loc").selectedIndex = ' . $row[9] .' - 1;
                                                        function setLocId()
                                                        {
                                                                var selectBox = document.getElementById("loc");
                                                              document.getElementById("hLoc").value = selectBox.options[selectBox.selectedIndex].value;
                                                        }
                                                </script>
                                        </div>';
                        }
                        $result->close();
                        $dTable = false;
                }
        }

        if(isset($_POST['submitUpdate']))
        {
                $id = $_POST['id'];
                $system_type = $_POST['system_type'];
				$game = $_POST['game'];
				
                updateRecord($mysqli);
                displayTable($mysqli);
                $dTable = false;
        }

        if(isset($_POST['submit']))
        {
                $id = $_POST['id'];
                $system_type = $_POST['system_type'];
				$game = $_POST['game'];

                createTable($mysqli);
                insertRecord($mysqli);
                displayTable($mysqli);
                                
                $dTable = false;
        }
		
		if (isset($_POST['addToList']))
		{
			$_SESSION["game"] = $_POST['uid'];
			addGame($mysqli);
		}
		
        if (isset($_POST['viewItem']))
	{
		viewRecord($mysqli);
		$dTable = false;
	}
}
        if($dTable)
        {
                displayTable($mysqli);
        }

function displayTable($mysqli)
{
echo    '<div class="col-md-12"><form action="games.php" method="POST"><table class="table table-condensed" style="border: 1px solid #dddddd; border-radius: 5px; box-shadow: 2px 2px 10px;">
                <tr><td colspan="11" style="text-align: center; border-radius: 5px; color: white; background-color:#333333;">
                                <h2 style="color: white;">Games</h2></td></tr>
                                <tr style="font-weight:800; font-size:20px;">
                                <td>System</td>
								<td>Game</td>
                                <td style="width: 15%;"></td><td><td></td></tr>';

        populateTable($mysqli);

        echo    '</table><input type="hidden" id="hid" name="hid" value=""><input type="hidden" id="uid" name="uid" value=""></form>';

                //FOR LOGIN, WHEN ITS SET UP; this is only logged in people can add to lessons
        //if($_SESSION['user'] != "")
        {
       echo '<a href="insertGame.php" class="btn btn-primary">Add an Entry</a><br></div>';    //Use this code not the one below this -Tyler
	          if ($_SESSION['loggedIn'] == "True") //come back to this
	   {
	   echo '<div align="right"><a href="myList.php" class="btn btn-primary">Wish List</a><br></div>';    //Use this code not the one below this -Tyler
	   }
	   echo '<a href="logout.php">Log Out</a><br/>';
                //echo '<input style="float: right;" name="viewItem" type="submit" class="btn btn-success" value="Add Entry" onclick="setUid(' . $row[0] .')" /></td>';
                //This is code for a button to reference another .php file you will call insertLessons.php
                //Look at my insertPersons.php page. Copy it and alter it to your need so insert will work.
        }
        
        //echo "<a href='bio.html'>About Me</a><script>
                echo "<script>
                        function setHid(num)
                        {
                                document.getElementById('hid').value = num;
                    }
                    function setUid(num)
                        {
                                document.getElementById('uid').value = num;
                    }
                 </script>";
        
}

function checkConnect($mysqli)
{

    /* check connection */
    if ($mysqli->connect_errno) {
        die('Unable to connect to database [' . $mysqli->connect_error. ']');
        exit();
    }
}

function populateTable($mysqli)
{
        global $usertable, $system_type;
        $system_type =  $_SESSION["systemId"];
        $i = 0;

        if($result = $mysqli->query("SELECT * FROM $usertable where system_id = $system_type"))
        {
                while($row = $result->fetch_row())
                {
					if($systemresult = $mysqli->query("SELECT * FROM system where id = $system_type"))
					{
						while($rows = $systemresult->fetch_row())
						{
                            echo '<tr><td>' . $rows[1] . '</td>
						             <td>' . $row[1] . '</td>';


                                                //more login stuff?
                        if ($_SESSION['loggedIn'] == "True") //come back to this
                        {
                        echo '<td style="width: 213px;"><input name="delete" type="submit" class="btn btn-danger" value="Delete" onclick="setHid(' . $row[0] .')" /> <input type="submit" name="update" class="btn btn-primary" value="Update" onclick="setUid(' . $row[0] . ')" /> <input type="submit" name="addToList" class="btn btn-warning" value="Add" onclick="setUid(' . $row[0] .')" />';
                       }
                        else
                        {
                                echo "<td>";
                        }
                        //echo '<a href="quizzes.php" class="btn btn-success">View</a><br></div>';
                                                echo '<input style="float: right;" name="viewItem" type="submit" class="btn btn-success" value="View" onclick="setUid(' . $row[0] .')" /></td>';
                        $i++;
						}
					}                          
                }
        }
        $result->close();
}
function createTable($mysqli)
{
    global $usertable;
    /* test select via object */
    if($result = $mysqli->query("select id from $usertable limit 1"))
    {
        /* fetch results as object (since there is only 1 row, i dont need a while loop here). */
        $row = $result->fetch_object();
                /** The fields in the results come back as properties of the fetched object.
                *   Here since I selected the "id", the row has a property called "id".
                */
                $id = $row->id;
        $result->close();
    }

    /* if nothing in $id*/
    if(!$id)
    {
            $sql = "CREATE TABLE lessons (id INT NOT NULL AUTO_INCREMENT,PRIMARY KEY( id ),";
            $sql .= "id INT(11),";
            $sql .= "game VARCHAR(20),";
			$sql .= "system_type VARCHAR(20),";
            $sql .= ")";

        if($stmt = $mysqli->prepare($sql))
        {
            /* execute prepared statement */
            $stmt->execute();
        }
    }
}

function insertRecord($mysqli)
{
    /* vars from the post data that we will use to bind */
    global $id, $game, $system_type, $usertable;
$system_type =  $_SESSION["systemId"];
	
    /* Initialise the statement. */
    $stmt = $mysqli->stmt_init();
    /* Notice the two ? in values, these will be bound parameters*/
        if($stmt = $mysqli->prepare("INSERT INTO $usertable (id,game, system_Id) VALUES (NULL, '$game', '$system_type')"))
    {
            /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob, etc... */
            //$stmt->bind_param('isssssss', $id, $title, $subject, $description, $resources, $persons_id, $date_created, $search_field);

            /* execute prepared statement */
            $stmt->execute();
            /* close statment */
            $stmt->close();
    }
}

function deleteRecord($mysqli)
{
        /* vars from the post data that we will use to bind */
    global $newID, $usertable;

    /* Initialise the statement. */
    $stmt = $mysqli->stmt_init();
    /* Notice the two ? in values, these will be bound parameters*/
    if($stmt = $mysqli->prepare("DELETE FROM $usertable WHERE id=?"))
    {
            /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob, etc... */
            $stmt->bind_param('i', $newID);

            /* execute prepared statement */
            $stmt->execute();
            /* close statment */
            $stmt->close();
    }
}

function updateRecord($mysqli)
{
         global $id, $system_type, $game,  $usertable;

    /* Initialise the statement. */
    $stmt = $mysqli->stmt_init();
    /* Notice the two ? in values, these will be bound parameters*/
    if($stmt = $mysqli->prepare("UPDATE $usertable SET game = '$game', system_Id = '$system_type' WHERE id = '$id'"))
    {
            /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob, etc... */
            //$stmt->bind_param('ieesssssi',$id, $title, $subject, $description, $resources, $persons_id, $date_created, $search_field , $id);

            /* execute prepared statement */
            $stmt->execute();
            /* close statment */
            $stmt->close();
    }
}

function viewRecord($mysqli)
{

        $index = $_POST['uid'];
        global $usertable;
        $result = $mysqli->query("SELECT * FROM $usertable WHERE id = $index");
$system_type =  $_SESSION["systemId"];
        if($result)
        {
                while($row = $result->fetch_row())
                {	if($systemresult = $mysqli->query("SELECT * FROM system where id = $system_type"))
					{
						while($rows = $systemresult->fetch_row())
						{
                        echo '  <br>
                                        <div class="col-md-4">
                                        <form name="basic" method="POST" action="games.php">
                                                <table class="table table-condensed" style="border: 1px solid #dddddd; border-radius: 5px; box-shadow: 2px 2px 10px;">
                                                <tr><td colspan="2" style="text-align: center; border-radius: 5px; color: white; background-color:#333333;"><h2>Games</h2></td></tr>
                                                        <tr><td><b>Games: </b></td><td>' . $row[1] . '</td></tr>
														<tr><td><b>System Type: </b></td><td>' . $rows[1] . '</td></tr>
                                                </table>
                                        </form>
                                        <a href="games.php" class="btn btn-primary">Display Database</a>
                                </div>';
						}
					}
					
                }
                $result->close();
        }
}

function addGame($mysqli)
{
	    /* vars from the post data that we will use to bind */
    global $id, $game, $system_type, $usertable;
    $system_type =  $_SESSION["systemId"];
	$person = $_SESSION["id"];
	$game = $_SESSION["game"];
    /* Initialise the statement. */
    $stmt = $mysqli->stmt_init();
	if($systemresult = $mysqli->query("SELECT * FROM system where id = $system_type"))
					{
						while($rows = $systemresult->fetch_row())
						{
								if($result = $mysqli->query("SELECT * FROM games where id = $game"))
					{
						while($row = $result->fetch_row())
    /* Notice the two ? in values, these will be bound parameters*/
	$gamename = $row[1];
        if($stmt = $mysqli->prepare("INSERT INTO mylist (id, person_id, game, system) VALUES (NULL, '$person' , '$gamename', '$rows[1]')"))
    {
            /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob, etc... */
            //$stmt->bind_param('isssssss', $id, $title, $subject, $description, $resources, $persons_id, $date_created, $search_field);

            /* execute prepared statement */
            $stmt->execute();
            /* close statment */
            $stmt->close();
	}
    }
						}
					}
					
}

?>
</div>
</div>
</body>
</html>
