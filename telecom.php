<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Vanni Kotiyaa-->
<!-- * Date: 6/28/2018-->
<!-- * Time: 7:36 PM-->
<!-- */-->
<!DOCTYPE HTML>
<?php
//include 'main.php';
//$id=1;
//$name="aaaa";
//$age=18;
$conn = oci_connect("SYSTEM", "oracle", 'localhost/xe');
if(isset($_POST['insert_record'])) {
    $telecom_id=$_POST['telecom_id'];
    $rover=$_POST['rover'];
    $telecomName=$_POST['telecomName'];
    $telecomtype=$_POST['telecomtype'];

    $stmt = oci_parse($conn, 'INSERT INTO telecommunication_mean ("telecommuni_ID","Rover_ID","telecommunicat_Name","telecommunicationtype") VALUES (:telecommuni_ID,:Rover_ID,:telecommunicat_Name,:telecommunicationtype)');
    oci_bind_by_name($stmt, ':telecommuni_ID', $telecom_id);
    oci_bind_by_name($stmt, ':Rover_ID', $rover);
    oci_bind_by_name($stmt, ':telecommunicat_Name', $telecomName);
    oci_bind_by_name($stmt, ':telecommunicationtype', $telecomtype);

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

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">

    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="./images/nasa.png" width="150" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!---------------------------END of Navigation--------------------------------------------->


<br><br><br><br><br><br>

<!-------------------------content of the add Camera----------------------------------------->
<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" action="telecom.php" method="post">
                        <fieldset>

                            <div class="form-group">

                                <input class="form-control" placeholder="Telecomiunication ID" name="telecom_id" type="text">

                            </div>

                            <div class="form-group">
                                <select class="form-control" name="rover">
                                    <option disabled selected>Select Rover ID</option>
                                    <?php
                                    $get = oci_parse($conn,'SELECT "Rover_ID" FROM rover');
                                    oci_execute($get);
                                    while ($row = oci_fetch_array($get,OCI_ASSOC+OCI_RETURN_NULLS)){
                                        echo "<option value='" . $row['rover'] . "'>" . $row['Rover_ID'] . "</option>";

                                    }
                                    ?>
                                </select>
                            </div>


                            <div class="form-group">

                                <input class="form-control" placeholder="Telecomiunication Mean Name" name="telecomName" type="text">

                            </div>

                            <div class="form-group">

                                <input class="form-control" placeholder="Telecomiunication Mean Type" name="telecomtype" type="text">

                            </div>


                            <input class="btn btn-lg btn-dark btn-block" type="submit" name="insert_record" value="Add Camera">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!---------------------------END of Add camera--------------------------------------------->


</body>
</html>

