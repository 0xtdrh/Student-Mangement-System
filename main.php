
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
    <title>Main Page</title>
    <style>
        body{
            background-color: darkslategray;
            display: flex;
            justify-content: center;
        }
        h1{
            display: flex;
            justify-content: center;

        }
        div{
        background-color: aliceblue;
        width: 800px;
        height:550px;
        margin: 40px auto;
        border-right: 2px solid gray;
        border-left: 2px solid gray;
        border-top: 2px solid gray;
        border-bottom: 2px solid gray;
        box-shadow: 2px 2px 10px silver;
        font-weight: bold;
        }
        .sign{
             position: absolute;
            top:10%;
            left:67%;
            /*background:transparent;
            color:black; */
            padding: 10px;
            font-size: 18px;
            margin-top: 10px;
            border: none;
            color: white;
            background-color: black;
        }
        .username{
            position: absolute;
            top:10%;
            left:25%;
            padding: 10px;
            font-size: 35px;
            margin-top: 10px;
            color: white;
            background-color: black;
        }
        button{
            background-color: silver;
            font-size: 20px;
            color: white;
            font-weight: bold;
        }
       
        .add{
            position: absolute;
            left: 25%;
            width: 200px;
            height: 75px;
        }
        .details{
            position: absolute;
            left: 60%;
            width: 200px;
            height: 75px;
        }
        .users{
            position: absolute;
            left: 42%;
            top: 40%;
            width: 200px;
            height: 75px;

        }
        label{
            position: absolute;
            top: 70%;
            left: 25%;
            font-size: 30px;
            border: 2px solid silver;
            background-color: darkgray;
            box-shadow: 0 2px black;
            color: white;

        }
        .stul{
            position: absolute;
            top: 65%;
        }
        .userl{
            position: absolute;
            top: 80%;
        }
        input{
            position: absolute;
            top: 70%;
            left: 35%;
            font-size: 30px;
            text-align: center;
        }
        .stui{
            position: absolute;
            top: 65%;
        }
        .useri{
            position: absolute;
            top: 80%;
        }
    </style>
</head>
<body>
    <?php
    
    session_start();
    $user =  @$_SESSION['username'] ;
    if($user == "reset"){
        header("location:login.php"); 
    }
    if (empty($user)){            
        header("location:login.php"); 
        echo "<h1>" . $user . "</h1>"; 
    }
    else{
        echo "<h1 class='username'>" . $user . "</h1>"; 
        
    }
        
        $host='localhost';
        $user='root';
        $pass='';
        $db='students';
        $con=mysqli_connect($host,$user,$pass,$db);
        $resinstu=mysqli_query($con,'select * from student');
        $rowinstudent=mysqli_num_rows($resinstu);

        $resinuser=mysqli_query($con,'select * from users');
        $rowinusers=mysqli_num_rows($resinuser);
        // echo $row;
        $query='';

        if (isset($_POST['add'])){
            header("location:index.php");
        }
        if (isset($_POST['details'])){
            header("location:details.php");
        }
        if (isset($_POST['users'])){
            header("location:users.php");
        }
        if (isset($_POST['signOut'])){
            header("location:login.php");
            $_SESSION['username'] = '';
        }



    ?>
    <div class="class">
            <h1>Student Mangement System</h1><br><br><br>
            <form method="post">
                <button class="add" name="add">Add Students</button>
                <button class="details" name="details">Students Details</button>
                <button class="users" name="users">Users</button><br><br>
                
                <label for="students" class="stul">Students:</label>
                <label for="users" class="userl">Users:</label>

                <input type="text"  class="stui" readonly value="<?php echo $rowinstudent . " Student(s)";?>">
                <input type="text" readonly class="useri" value="<?php echo $rowinusers . " User(s)";?>">
                
                <button name="signOut" class="sign">Sign Out</button>

            </form>
    </div>
</body>
</html>