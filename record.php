<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $subject1 = (int)$_POST["subject1"];
    $subject2 = (int)$_POST["subject2"];
    $subject3 = (int)$_POST["subject3"];
    $subject4 = (int)$_POST["subject4"];

    // Calculate total and percentage
    $totalMarks = $subject1 + $subject2 + $subject3 + $subject4;
    $percentage = ($totalMarks / 400) * 100;
    
    echo "<h2>Student Marks Record</h2>";
    echo "Student Name: $name <br>";
    echo "Subject 1: $subject1 <br>";
    echo "Subject 2: $subject2 <br>";
    echo "Subject 3: $subject3 <br>";
    echo "Subject 4: $subject4 <br>";
    echo "<strong>Total Marks: $totalMarks / 400</strong><br>";
    echo "<strong>Average Percentage: " . number_format($percentage, 2) . "%</strong><br>";
} else {
    echo "Invalid access.";
}
?>
