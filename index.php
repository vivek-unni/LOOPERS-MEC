<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invento-SignIn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
            // Define the database connection details
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "innvento";
            // Create a connection to the database
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            // Check if the form was submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get the username and password from the form
                $username = $_POST["username"];
                $password = $_POST["password"];
        
                // Query the database for the user
                $sql = "SELECT * FROM signup WHERE email='$username' AND password='$password'";
                $result = $conn->query($sql);
        
                // Check if the query returned a result
                if ($result->num_rows > 0) {
                    // User is authenticated
                    header('Location: testmain/index.php');
                    exit;
                } 
                else {
                    // User is not authenticated
                    echo "Invalid username or password.";
                }
            }
        
            // Close the database connection
            $conn->close();
    ?>
    <div class="container">
        <div class="image">
            <img src="images/startup.jpg">
        </div>
        <div class="login">   
            <h2>Login</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                <br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <br>
                <input type="submit" value="Login">
                <br>
                <a href="contact_us/index.html">Forget your passsword?</a> 
                <br>
                Haven't create an account?<a href="Signup/index.html">Sign Up</a>
            </form>
        </div>
    </div>
</body>
</html>
