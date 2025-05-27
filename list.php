<?php
session_start();

if (!isset($_SESSION['students']) || count($_SESSION['students']) === 0) {
    echo "<h3>No student records found.</h3>";
    echo "<a href='index.php'>Add Student</a>";
    exit;
}

// Sort students by average in descending order
$students = $_SESSION['students'];
usort($students, function($a, $b) {
    return $b['average'] <=> $a['average'];
});
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
    <h2>Student Records and Rankings</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>Position</th>
            <th>Name</th>
            <th>Subject 1</th>
            <th>Subject 2</th>
            <th>Subject 3</th>
            <th>Subject 4</th>
            <th>Average (%)</th>
        </tr>
        <?php
        $position = 1;
        foreach ($students as $student):
        ?>
        <tr>
            <td><?= $position++; ?></td>
            <td><?= htmlspecialchars($student['name']) ?></td>
            <td><?= $student['subject1'] ?></td>
            <td><?= $student['subject2'] ?></td>
            <td><?= $student['subject3'] ?></td>
            <td><?= $student['subject4'] ?></td>
            <td><?= number_format($student['average'], 2) ?>%</td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="index.php">Add More Students</a> |
    <a href="reset.php">Clear All Records</a>
</body>
</html>
