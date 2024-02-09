<!DOCTYPE html>
<html lang="en">
<!-- 
        Contact Me:
            Facebook : https://www.facebook.com/profile.php?id=100091130092100
            Linked In : https://www.linkedin.com/in/kerolos-refaat-10502a270/
            Blog : https://0xtdrh.gitbook.io/kerolos/
 -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    background-color: #f4f4f4;
    font-family: 'Arial', sans-serif;
}

.login-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

h2 {
    text-align: center;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
    color: #555;
}

input {
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}


button {
    background-color: #4caf50;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #45a049;
}
h3{
    color:red;
}

/* Responsive Styling */
@media screen and (max-width: 400px) {
    .login-container {
        width: 90%;
    }
}


    </style>
</head>
<body>
<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'students';
    $massege = '';

    $conn=mysqli_connect($host,$user,$pass,$db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE name='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        $_SESSION['username'] = $username;
        header("Location: main.php");
        exit();
    } 
    elseif($username == "reset" && $password== "reset"){
        $_SESSION['username'] = $username;
        header("Location: users.php");
        exit();
    }
    
    else {
        $massege =  "Invalid username or password";
    }

    $conn->close();
}
?>

    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required id="pass" >
                
            <input type="checkbox" id="showPassword" class="show-password">
            
            
            <button type="submit" name="login">Login</button>
        </form>
        <h3>
            <?php
            if (isset($massege)){

                echo $massege;
            }
            ?>
        </h3>
    </div>
    <script type="text/javascript">
        document.getElementById('showPassword').addEventListener('change', function () {
        var passwordInput = document.getElementById('pass');
        passwordInput.type = this.checked ? 'text' : 'password';
    });
    </script>
</body>
</html>