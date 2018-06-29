<?php
//include 'main.php';
//$id=1;
//$name="aaaa";
//$age=18;
$conn = oci_connect("SYSTEM", "oracle", 'localhost/xe');
if(isset($_POST['insert_record'])) {
    $rover=$_POST['rover'];
    $camera=$_POST['camera'];
    $FocalLength=$_POST['FocalLength'];
    $FieldOfView=$_POST['FieldOfView'];
    $NoOfPixel=$_POST['NoOfPixel'];
    $Memory=$_POST['Memory'];

    $stmt = oci_parse($conn, 'INSERT INTO rover (Rover_ID,Camera_Type,Focal_Length,FieldOfView,No_Of_Pixels,Memory) VALUES (:Rover_ID,:Camera_Type,:Focal_Length,:FieldOfView,:No_Of_Pixels,:Memory)');
    oci_bind_by_name($stmt, ':Rover_ID', $rover);
    oci_bind_by_name($stmt, ':Camera_Type', $camera);
    oci_bind_by_name($stmt, ':Focal_Length', $FocalLength);
    oci_bind_by_name($stmt, ':FieldOfView', $FieldOfView);
    oci_bind_by_name($stmt, ':No_Of_Pixels', $NoOfPixel);
    oci_bind_by_name($stmt, ':Memory', $Memory);
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

                                <input class="form-control" placeholder="Size" name="Size" type="text">

                            </div>

                            <div class="form-group">

                                <input class="form-control" placeholder="Main Objective" name="Objective" type="text">

                            </div>

                            <div class="form-group">

                                <input class="form-control" placeholder="Mass" name="Mass" type="text">

                            </div>
                            <div class="form-group">

                                <span class="label-default">Launched Date</span>
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

