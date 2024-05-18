<!DOCTYPE html>
<html>
<head>
    <title>Database Test</title>
</head>
<body>
    <h1>Database Test</h1>

    <form action="submit.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Submit">
    </form>
    <?php
    require_once "connection.php";

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform the database query
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    // Display the query results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Name: " . $row["name"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "<br>";
        }
    } else {
        echo "No results found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>