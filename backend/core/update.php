<?php
require_once('../config/connection.php');


$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){
$request = json_decode($postdata);
}


$name = $request->name;
$phone = $request->phone;
$email = $request->email;
$role = $request->role;
$id = (int)$request->id;


$statement = $conn->prepare("UPDATE employee SET name=:name, email=:email, phone=:phone, role=:role WHERE id=:id ");

$result = $statement->execute([
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'role' => $role,
    'id' => $id,
]);

if($result){
http_response_code(201);
echo json_encode(['data'=>$result]);
}else{
http_response_code(422);
}

?>