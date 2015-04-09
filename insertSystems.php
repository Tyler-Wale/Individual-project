<!DOCTYPE html>
<html>
<head>
        <title>Entry Form</title>
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
<div class="col-md-4">
        <form name='basic' method='POST' action='systems.php' onSubmit='return validate();'>
                <table class="table table-condensed" style="border: 1px solid #dddddd; border-radius: 5px; box-shadow: 2px 2px 10px;">
                        <tr><td colspan="2" style="text-align: center; border-radius: 5px; color: white; background-color:#333333;"><h2>Insert System</h2></td></tr>
                        <tr><td>System Type: </td><td><input type='edit' name='system_type' value='' size='20'></td></tr>
                        <!--<tr><td style="vertical-align: middle;">Location: </td><td><select id="selection" class="form-control" onchange="selectLoc();">
                                                                                </select></td><td><input type="hidden" id="lid" value="1" name="locId"></td></tr>-->
                        <tr><td><input type="submit" name="submit" class="btn btn-success" value="Add Entry"></td>
                                <td style="text-align: right;"><input type="reset" class="btn btn-danger" value="Reset Form"></td></tr>
                </table>
                
                <a href="systems.php" class="btn btn-primary">Display Database</a>
        </form>
</div>

</body>
</html>
