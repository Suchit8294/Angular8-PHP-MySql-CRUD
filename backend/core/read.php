<?php
require_once('../config/connection.php');

$statement = $conn->prepare('SELECT id, Name, Email, Phone, role FROM employee');

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

echo json_encode(['data'=>$employeeList]);

?>