<?php include'database.php'; ?>
<?php session_start();
// Check to see if Score is set
	if(!isset($_SESSION['score'])){
		$_SESSION['score']=0 ;
	}
	
	if($_POST){
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];
		
		$next = $number+1;
		
		//Get correct Choice
		
		$query = "SELECT * FROM `choices` 
						WHERE question_number = $number AND is_correct=1";
						
		// Get Results
		$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
		
		// Get Row
		$row = $results->fetch_assoc();
		
		// Get Total
		$query = "SELECT * FROM `questions`";
		
		// Get Results
		$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$total = $results->num_rows;
		
		// Set Correct Choice
		$correct_choice = $row['id'];
		
		// Comparison
		if($correct_choice == $selected_choice){
			//Ans is correct
			$_SESSION['score']++;	
		}
		
		// Check if last Question
		if($number == $total){
			header("Location: final.php");
			exit();
		}else {
			header("Location: question.php?n=".$next);
		}
		
}
?>