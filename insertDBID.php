<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="insertDBID.css">
</head>
<body>
    <h1>PHP MySQL Get Last Inserted ID</h1>
<form method="POST">
    <label for="">Firstname :</label>
    <input type="text" name="Fname" id="">
    <label for="">Lastname :</label>
    <input type="text" name="Lname" id="">
    <label for="">Email :</label>
    <input type="text" name="Email" id="">
    <input type="submit" name="sub" id="he" value="Connect">
    </form>
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"&& isset($_POST["sub"])){
            $servername ="localhost";
            $username = "root";
            $password = "";
            $fname = $_POST["Fname"];
            $lname = $_POST["Lname"];
            $email = $_POST["Email"];
        try {
            $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
            $sql = "INSERT INTO `tableone` (id,firstNam, lastName, email, county, age) VALUES ('','$fname', '$lname', '$email', '', '')";
            $conn->exec($sql);
            $last_id = $conn->lastInsertId();
            echo "<p class = green>New record created successfully. Last inserted ID is:  $last_id</p>";
            } catch (PDOException $e) {
            echo "<p class = red>New record note created</p> " . $e->getMessage();
        }
    }
    ?>
</body>
</html>