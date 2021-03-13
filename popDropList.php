<?php
//Retrieve data for dropdowns for inserting quiz questions
	$sql = "SELECT Quiz FROM quiz";
	$stmt = $conn->prepare($sql);
	$nameResults = $conn->query($sql);

?>

<?php
//Retrieve data for dropdowns for inserting quiz answers
	$sql = "SELECT ID, Question FROM question";
	$stmt = $conn->prepare($sql);
	$questionResults = $conn->query($sql);
?>