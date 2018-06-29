<?php
//include 'main.php';
//$id=1;
//$name="aaaa";
//$age=18;
$conn = oci_connect("SYSTEM", "oracle", 'localhost/xe');
if(isset($_POST['insert_record'])) {
    $Rover_ID=$_POST['Rover_ID'];
    $Launched_Date=$_POST['Launched_Date'];
    $Launched_From=$_POST['Launched_From'];
    $Sizes=$_POST['Sizes'];
    $Objective=$_POST['Objective'];
    $Mass=$_POST['Mass'];
    $Landed_Date=$_POST['Landed_Date'];
    $Landed_To=$_POST['Landed_To'];

    $stmt = oci_parse($conn, 'INSERT INTO rover ("Rover_ID","Launch_Date","Launched_From","Sizes","MainObjective","Mass","Landed_Date","Land_To") VALUES(:Rover_ID,:Launch_Date,:Launched_From,:Sizes,:MainObjective,:Mass,:Landed_Date,:Land_To)');
    oci_bind_by_name($stmt, ':Rover_ID', $Rover_ID);
    oci_bind_by_name($stmt, ':Launch_Date', $Launched_Date);
    oci_bind_by_name($stmt, ':Launched_From', $Launched_From);
    oci_bind_by_name($stmt, ':Sizes', $Sizes);
    oci_bind_by_name($stmt, ':MainObjective', $Objective);
    oci_bind_by_name($stmt, ':Mass', $Mass);
    oci_bind_by_name($stmt, ':Landed_Date', $Landed_Date);
    oci_bind_by_name($stmt, ':Land_To', $Landed_To);
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

<br><br><br><br><br><br>

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

                                <input class="form-control" placeholder="Rover ID" name="Rover_ID" type="text">

                            </div>
                            <div class="form-group">

                                <span class="label-default">Launched Date</span>
                                <input class="form-control" placeholder="Launched Date" name="Launched_Date" type="date">

                            </div>
                            <div class="form-group">

                                <input class="form-control" placeholder="Launched From" name="Launched_From" type="text">

                            </div>

                            <div class="form-group">

                                <input class="form-control" placeholder="Size" name="Sizes" type="text">

                            </div>

                            <div class="form-group">

                                <input class="form-control" placeholder="Main Objective" name="Objective" type="text">

                            </div>

                            <div class="form-group">

                                <input class="form-control" placeholder="Mass" name="Mass" type="text">

                            </div>
                            <div class="form-group">

                                <span class="label-default">Landed Date</span>
                                <input class="form-control" placeholder="Landed Date" name="Landed_Date" type="date">

                            </div>
                            <div class="form-group">

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

