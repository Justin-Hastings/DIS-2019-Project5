<?php require_once 'config/db.php';
	require_once 'popDropList.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf8">
		<title>Insert Quiz Answer</title>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-5 me-offset-4 form-div">
				<form action="" method="post">

					<h3 class="text-centre">Insert Answer</h3>

					<div id="alert-danger"></div>
					<div id="alert-success"></div>
					
					<div class="form-group">
						<label for="quizQuestion" >Quiz Question </label> <br></br>
						<select name="quizQuestion">
							<?php while($row = mysqli_fetch_row($questionResults)){ ?>
							<option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
							<?php } ?>
						</select>
					</div>
					
					<div class="form-group">
						<label for="questionAnswer" >Answer</label>
						<input type="text" name="questionAnswer" class="form-control form-control-lg">
					</div>

					<div class="form-group">
						<button type="button"  onclick="insertAnswer()" name="insertQuiz-btn" class="btn btn-primary btn-block btn-lg">Insert Answer</button>
					</div>

					<p class="text-centre">Answer already inserted? <a href="login.php">Edit answer here</a></p>
				</form>
				</div>
			</div>
		</div>
		<script src="js/functions.js"></script>
	</body>
	
</html>