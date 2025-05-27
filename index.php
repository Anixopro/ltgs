<!DOCTYPE html>
<html>
<head>
    <title>Student Marks Record</title>
</head>
<body>
    <h2>Enter Student Marks</h2>
    <form action="record.php" method="post">
        Student Name: <input type="text" name="name" required><br><br>
        Subject 1 Marks: <input type="number" name="subject1" min="0" max="100" required><br><br>
        Subject 2 Marks: <input type="number" name="subject2" min="0" max="100" required><br><br>
        Subject 3 Marks: <input type="number" name="subject3" min="0" max="100" required><br><br>
        Subject 4 Marks: <input type="number" name="subject4" min="0" max="100" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
