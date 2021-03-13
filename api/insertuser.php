<?php

include_once '../config/db.php';

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$messages = array();

$username = '';
$email = '';
$password = '';
$verified = false;
$token = bin2hex(random_bytes(50));

$data = json_decode(file_get_contents("php://input"),true);

error_log( "received: data", 0);

$username = $data['username'];
$email = $data['email'];
$password = $data['password'];

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO student SET Student = ?, email = ?, Password = ?, token = ?, verified = ?";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param( $stmt, 'ssssi', $username, $email, $password_hash, $token, $verified);

array_push( $messages , array("testing" => "Here is my message"));

// perform query and create message based on success or error
if (mysqli_stmt_execute($stmt)) {
	http_response_code(200);
	array_push( $messages , array("success" => "INSERT successful: " . mysqli_stmt_affected_rows($stmt) . " rows added"));
	echo json_encode($messages);
} else {
	http_response_code(200);
	array_push( $messages , array("failure" => "Failed to run INSERT query: " . mysqli_stmt_error($stmt) ));
	echo json_encode($messages);
}
mysqli_stmt_close($stmt);
mysqli_close($conn);

// list of mysqli commands https://www.w3schools.com/php/php_ref_mysqli.asp
?>
