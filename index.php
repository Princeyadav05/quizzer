<?php include'database.php'; ?>
<?php
// GET TOTAL Questions
	$query = "SELECT * FROM questions";
//GET RESULTS
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $results->num_rows
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
			<h2>Here is a Test for You</h2>
			<p>This is a multiple choice quiz to test your knowledge</p>
			<ul>
				<li><strong>Number of Questions:</strong><?php echo $total; ?></li>
				<li><strong>Type:</strong>Multiple Choice</li>
				<li><strong>Estimated Time:</strong><?php echo $total * 1 ; ?> Minutes</li>
			</ul>
			<a href="question.php?n=1" class="start" >Start Quiz</a>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2017, Quiz
		</div>
	</footer>
</body>
</html>