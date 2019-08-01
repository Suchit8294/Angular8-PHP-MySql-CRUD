<?php
require_once('../config/connection.php');

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

}

$name = $request->name;
$email = $request->email;
$phone = $request->phone;
$role = $request->role;

$statement = $conn->prepare('INSERT INTO employee (name, email, phone, role)
    VALUES (:fname, :email, :phone, :role)');

// $stmt = $conn->query("SELECT LAST_INSERT_ID()");
// $lastId = $stmt->fetchColumn();

$result = $statement->execute([
    'fname' => $name,
    'email' => $email,
    'phone' => $phone,
    'role' => $role 
]);

if($result){
    http_response_code(201);
    $employee = [
        'fname' => $name,
        'phone' => $phone,
        'email' => $email,
        'role' => $role,
    ];
    echo json_encode(['data'=>$employee]);
}else{
    http_response_code(422);
}

?>