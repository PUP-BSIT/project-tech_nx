<?php 

include 'create.php';

if(isset($_POST ["name"]) || isset($_POST["id"]) || isset
($_POST["date"]) || isset($_POST["type"]) || isset($_POST["status"])) {
    $name=$_POST["name"];
    $id=$_POST["id"];
    $date=$_POST["date"];
    $type=$_POST["type"];
    $status=$_POST["status"];

    $sql="INSERT INTO schedule (std_name, std_id, std_date,
    std_type, std_status) VALUES ('{$name}', '{$id}', '{$date}',
    '{$type}', ;{$status}')";
    $run_sql=mysqli_query($conn, $sql);
    if($run_sql) {
        echo json_encode(["message"=>"Schedule Add Successfully"]);
    } else {
        echo json_encode(["message"=>"Server Problem"]);
    }
}

?>