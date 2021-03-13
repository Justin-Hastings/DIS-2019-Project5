<?php require_once 'config/db.php'; 
	require_once 'popDropList.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Insert Questions</title>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 me-offset-4 form-div">
				<form action="" method="post">

					<h3 class="text-centre">Insert Question</h3>

					<div id="alert-danger"></div>
					<div id="alert-success"></div>
					
					<div class="form-group">
						<label for="quizName" >Quiz Name </label> <br></br>
						<select name="quizName">
							<?php while($row = mysqli_fetch_row($nameResults)){ ?>
							<option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label for="questionName" >Question Name</label>
						<input type="text" name="questionName" class="form-control form-control-lg">
					</div>

					<div class="form-group">
						<button type="button"  onclick="insertQuestion()" name="insertQuestion-btn" class="btn btn-primary btn-block btn-lg">Insert Question</button>
					</div>

					<p class="text-centre">Question already inserted? <a href="">Edit question here</a></p>
				</form>
				</div>
			</div>
		</div>
	
		<script src="js/functions.js"></script>
	</body>
</html>