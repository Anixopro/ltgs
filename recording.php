<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // Change this if you have a password
$db = 'system';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $subject1 = (int)$_POST['subject1'];
    $subject2 = (int)$_POST['subject2'];
    $subject3 = (int)$_POST['subject3'];
    $subject4 = (int)$_POST['subject4'];

    $total = $subject1 + $subject2 + $subject3 + $subject4;
    $average = $total / 4;

    $stmt = $conn->prepare("INSERT INTO student (name, subject1, subject2, subject3, subject4, average) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siiiid", $name, $subject1, $subject2, $subject3, $subject4, $average);
    $stmt->execute();
    $stmt->close();
}

// Fetch and rank students
$sql = "SELECT * FROM student ORDER BY average DESC";
$result = $conn->query($sql);

$students = [];
while ($row = $result->fetch_assoc()) {
    $students[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Marks System</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Enter Student Marks</h2>
    <form method="POST">
        Name: <input type="text" name="name" required>
        Subject 1: <input type="number" name="subject1" required>
        Subject 2: <input type="number" name="subject2" required>
        Subject 3: <input type="number" name="subject3" required>
        Subject 4: <input type="number" name="subject4" required>
        <input type="submit" value="Submit">
    </form>

    <h2>Student Results</h2>
    <table>
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
        foreach ($students as $student): ?>
            <tr>
                <td><?php echo $position++; ?></td>
                <td><?php echo htmlspecialchars($student['name']); ?></td>
                <td><?php echo $student['subject1']; ?></td>
                <td><?php echo $student['subject2']; ?></td>
                <td><?php echo $student['subject3']; ?></td>
                <td><?php echo $student['subject4']; ?></td>
                <td><?php echo number_format($student['average'], 2); ?>%</td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
