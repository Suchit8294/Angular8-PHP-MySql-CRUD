<?php
require_once('../config/connection.php');

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

}

$id = (int)$request->userid;

$count=$conn->prepare("DELETE FROM employee WHERE id=:id");
$count->bindParam(":id",$id,PDO::PARAM_INT);
$result = $count->execute();


if($result){
    http_response_code(201);
}else{
http_response_code(422);
}

?>