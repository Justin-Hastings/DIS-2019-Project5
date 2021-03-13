<?php

include_once '../config/db.php';

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$messages = array();

$quiz = '';

$data = json_decode(file_get_contents("php://input"),true);

error_log( "received: data", 0);

$quiz = $data['quizName'];

$query = "INSERT INTO quiz SET Quiz = ?";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param( $stmt, 's', $quiz);

array_push( $messages, array("testing" => "Here is my message"));

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

//change config file to insertQuizUser.php file
?>
