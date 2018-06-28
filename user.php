<!DOCTYPE html>

<?php
//include 'main.php';
//$id=1;
//$name="aaaa";
//$age=18;
$conn = oci_connect("system", "goodgame12", "localhost/XE");
if(isset($_POST['insert_record'])) {

    $id=$_POST['id'];
    $name=$_POST['name'];
    $age=$_POST['age'];

    $stmt = oci_parse($conn, 'INSERT INTO admin (ID,NAME,AGE) VALUES (:ID,:NAME,:AGE)');
    oci_bind_by_name($stmt, ':ID', $id);
    oci_bind_by_name($stmt, ':NAME', $name);
    oci_bind_by_name($stmt, ':AGE', $age);

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
    <title>gggggg</title>
</head>
<body>
    <form action="user.php" method="post" >
        <label>id</label>
        <input type="text" name="id">
        <label>name</label>
        <input type="text" name="name">
        <label>age</label>
        <input type="text" name="age">

        <input type="submit" name="insert_record"/>
    </form>
</body>
</html>

