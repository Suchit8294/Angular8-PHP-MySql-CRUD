<?php
require_once('../config/connection.php');

$id = (int)$_GET['id'];

$statement = $conn->prepare('SELECT id, Name, Email, Phone, role FROM employee where id=:id');
$statement->bindParam(":id",$id,PDO::PARAM_INT);
$statement->execute();

$employeeList = [];


$i = 0;
while($data = $statement->fetch( PDO::FETCH_ASSOC )){ 
   $employeeList[$i]['id'] = $data['id'];
   $employeeList[$i]['name'] = $data['Name'];
   $employeeList[$i]['email'] = $data['Email'];
   $employeeList[$i]['phone'] = $data['Phone'];
   $employeeList[$i]['role'] = $data['role'];
    $i++;
}
    echo json_encode(['dataSingle'=>$employeeList]);
    http_response_code(201);



?>