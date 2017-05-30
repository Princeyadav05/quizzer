<?php include'database.php'; ?>
<?php session_start(); ?>
<?php 
	// Set Question Number
	$number = (int) $_GET['n'];
	
	// Get Question
	
	$query = "SELECT * FROM `questions`
					WHERE question_number = $number";
					
	// Get Results
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$question = $result->fetch_assoc();
	
	// Get Total
		$query = "SELECT * FROM `questions`";
		
	// Get Results
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $results->num_rows;
		
	
	// Get Choices
	
	$query = "SELECT * FROM `choices`
					WHERE question_number = $number";
					
	// Get Results
	$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset ="utf-8" />
	<title> Quiz </title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<header>
		<div class="container">
			<h1>Quiz</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
			<p class="question">
				<?php echo $question['test']; ?>
			</p>
			<form method="post" action="process.php">
				<ul class="choices">
				<?php while($row = $choices->fetch_assoc()): ?>
					<li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text']; ?></li>
				<?php endwhile; ?>
				</ul>
				<input type="submit" value="Submit" />
				<input type="hidden" name="number" value="<?php echo $number; ?>" />
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2017, Quiz
		</div>
	</footer>
</body>
</html>