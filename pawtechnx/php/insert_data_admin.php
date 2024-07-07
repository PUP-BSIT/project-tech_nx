  <?php 

include 'dataconection.php';

//if(isset($_POST ["name"]) || isset($_POST["id"]) || isset
//($_POST["date"]) || isset($_POST["type"]) || isset($_POST["status"])) {
    $input=file_get_contents("php://insert_data_admin");
    $decode=json_decode($input,true);
     
    $name=$decode["name"];
    $id=$decode["id"];
    $date=$decode["date"];
    $type=$decode["type"];
    $status=$decode["status"];

    $sql="INSERT INTO schedule (std_name, std_id, std_date,
    std_type, std_status) VALUES ('{$name}', '{$id}', '{$date}',
    '{$type}', ;{$status}')";
    $run_sql=mysqli_query($conn, $sql);
    if($run_sql) {
        echo json_encode(["success"=>true,"message"=>"Schedule Add Successfully"]);
    } else {
        echo json_encode(["success"=>false,"message"=>"Server Problem"]);
    }
//}

?>