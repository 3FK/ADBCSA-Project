<?php
$conn = oci_connect("SYSTEM", "oracle", 'localhost/xe');
if(isset($_POST['Update_record'])) {
    $rover=$_POST['rover'];

    $Rover_Name=$_POST['Rover_Name'];
    $Launched_Date=$_POST['Launched_Date'];
    $Launched_From=$_POST['Launched_From'];
    $Mass=$_POST['Mass'];
    $Landed_Date=$_POST['Landed_Date'];
    $Landed_To=$_POST['Landed_To'];

    $stmt = oci_parse($conn, 'UPDATE  ROVER SET ROVER_Name = :Rover_Name,Launched_Date=:Launched_Date,Launched_From= :Launched_From,Mass= :Mass,Landed_Date= :Landed_Date,Landed_to=:Landed_To WHERE ROVER_ID = :rover ');
    oci_bind_by_name($stmt, ':Rover_Name', $Rover_Name);
    oci_bind_by_name($stmt, ':Launched_Date', $Launched_Date);
    oci_bind_by_name($stmt, ':Launched_From', $Launched_From);
    oci_bind_by_name($stmt, ':Mass', $Mass);
    oci_bind_by_name($stmt, ':Landed_Date', $Landed_Date);
    oci_bind_by_name($stmt, ':Landed_To', $Landed_To);
    oci_bind_by_name($stmt,':rover',$rover);
    $execute=oci_execute($stmt);
    if($execute){
        print "updated";
        $commit = oci_parse($conn,'Commit');
        oci_execute($commit);
    }
    oci_free_statement($stmt);





}
?>