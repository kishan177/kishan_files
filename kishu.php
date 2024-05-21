<!DOCTYPE html>
<html>
<head>
    <title>Compute Course Grades</title>
</head>
<body>

<h2>Enter Marks for 6 Courses</h2>

<form method="post" action="">
    <?php
    // Display input fields for 6 courses
    for ($i = 1; $i <= 6; $i++) {
        echo "<label for='score$i'>Course $i:</label>";
        echo "<input type='number' name='scores[]' id='score$i' min='0' max='100' required><br>";
    }
    ?>
    <input type="submit" value="Submit">
</form>

<?php
// Check if form data is present
if (isset($_POST['scores'])) {
    // Retrieve the scores entered by the user
    $scores = $_POST['scores'];

    // Validate the scores
    $valid = true;
    foreach ($scores as $score) {
        if (!is_numeric($score) || $score < 0 || $score > 100) {
            $valid = false;
            echo "<p>Please enter valid scores between 0 and 100 for all courses.</p>";
            break;
        }
    }

    // If all scores are valid, calculate grades and overall grading
    if ($valid) {
        echo "<h2>Overall Result</h2>";
        
        $totalScore = array_sum($scores);
        $averageScore = $totalScore / count($scores);

        $overallGrade = '';

        // Calculate the overall grade based on the average score
        if ($averageScore >= 90) {
            $overallGrade = 'A';
        } elseif ($averageScore >= 80) {
            $overallGrade = 'B';
        } elseif ($averageScore >= 70) {
            $overallGrade = 'C';
        } elseif ($averageScore >= 60) {
            $overallGrade = 'D';
        } else {
            $overallGrade = 'F';
        }

        // Display the overall result
        echo "<p>Overall Average Score: $averageScore, Overall Grade: $overallGrade</p>";
    }
}
?>
</body>
</html>
