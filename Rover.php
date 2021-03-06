<?php
$conn = oci_connect("SYSTEM", "oracle", 'localhost/xe');
if(isset($_POST['insert_record'])) {
    $Rover_Name=$_POST['Rover_Name'];
    $Launched_Date=$_POST['Launched_Date'];
    $Launched_From=$_POST['Launched_From'];
    $Mass=$_POST['Mass'];
    $Landed_Date=$_POST['Landed_Date'];
    $Landed_To=$_POST['Landed_To'];

    $stmt = oci_parse($conn, 'INSERT INTO ROVER (ROVER_Name,Launched_Date,Launched_From,Mass,Landed_Date,Landed_to) VALUES(:Rover_Name,:Launched_Date,:Launched_From,:Mass,:Landed_Date,:Landed_To)');
    oci_bind_by_name($stmt, ':Rover_Name', $Rover_Name);
    oci_bind_by_name($stmt, ':Launched_Date', $Launched_Date);
    oci_bind_by_name($stmt, ':Launched_From', $Launched_From);
    oci_bind_by_name($stmt, ':Mass', $Mass);
    oci_bind_by_name($stmt, ':Landed_Date', $Landed_Date);
    oci_bind_by_name($stmt, ':Landed_To', $Landed_To);
    $execute=oci_execute($stmt);
    if($execute){
        print "inserted";
        $commit = oci_parse($conn,'Commit');
        oci_execute($commit);
    }
    oci_free_statement($stmt);
}
?>

<html>
<head>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>
<body>
<!-------------------------content of the Rover----------------------------------------->
<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" action="Rover.php" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label class="label-default">Rover Name</label>
                                <input class="form-control" placeholder="Rover Name" name="Rover_Name" type="text">
                            </div>
                            <div class="form-group">
                                <label class="label-default">Launched Date</label>
                                <input class="form-control" placeholder="Launched Date" name="Launched_Date" type="date">
                            </div>
                            <div class="form-group">
                                <label class="label-default">Launched From</label>
                                <input class="form-control" placeholder="Launched From" name="Launched_From" type="text">
                            </div>
                            <div class="form-group">
                                <label class="label-default">Mass</label>
                                <input class="form-control" placeholder="Mass" name="Mass" type="text">
                            </div>
                            <div class="form-group">
                                <label class="label-default">Landed Date</label>
                                <input class="form-control" placeholder="Landed Date" name="Landed_Date" type="date">
                            </div>
                            <div class="form-group">
                                <label class="label-default">Landed To</label>
                                <input class="form-control" placeholder="Landed To" name="Landed_To" type="text">
                            </div>
                            <input class="btn btn-lg btn-dark btn-block" type="submit" name="insert_record" value="Add Rover">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<!---------------------------END of Add Rover--------------------------------------------->

</body>
</html>

