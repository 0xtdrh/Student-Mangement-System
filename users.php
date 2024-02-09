
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
    <title>Users</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        body{
            background-color: whitesmoke;
            font-family: 'Tajawal', sans-serif;
        }
        .mainDiv{
            width: 100%;
            font-size: 20px;
        }
        main{
            float: right;
            border: 1px solid grey;
            padding: 5px;
        }
        input{
            padding: 4px;
            border: 2px solid black;
            text-align: center;
            /* cursor: pointer; */
            font-size: 17px;
            font-family: 'Tajawal', sans-serif;
        }
        select{
            padding: 4px;
            border: 2px solid black;
            text-align: center;
            /* cursor: pointer; */
            font-size: 17px;
            font-family: 'Tajawal', sans-serif;
            width:200px

        }
        aside{
            text-align: center;
            width: 300px;
            float: left;
            border: 1px solid black;
            margin-top:80px;
            padding: 10px;
            font-size: 20px;
            background-color: silver;
            color: white;
        }
         button{   
            cursor: pointer;
            width: 200px;
            padding: 8px;
            margin-top: 7px;
            font-size:17px ;
            font-family: 'Tajawal   ', sans-serif;
            font-weight: bold;    
        }
        table{
            width: 1100px;
            font-size: 20px;
        }
        table th{
            background-color: silver;
            color: black;
            font-size: 20px;
            padding: 10px;
        }
        tr:hover { background: #ddd; }
        td { border: 1px solid #000; border-collapse: collapse; }
        td a { 
            display: block;
            padding: 5px 20px;
            text-decoration:none;
            color:black;
            background-color: transparent;
            border:none;
        
        }
        .homeb{
            position:absolute;
            border:none;
            width: 50px;
            height: 50px;
            background-color: transparent;
        }
        .homei{
            /* border:none; */
            width: 50px;
            height: 50px;
        }
        






    </style>
</head>
<body>
<?php
    session_start();
    
    
        $host='localhost';
        $user='root';
        $pass='';
        $db='students';
        $con=mysqli_connect($host,$user,$pass,$db);
        $res=mysqli_query($con,'select * from users');
        $query = '';

        $user =  @$_SESSION['username'] ;
        
    if (empty($user)){            
        header("location:login.php"); 
    }
    else {
        $res_user = mysqli_query($con, "SELECT prem FROM users WHERE name='$user'");
        if($user == "reset"){
                $res_user == 'Admin'; 
            }
        else{
            if ($res_user) {
                $row = mysqli_fetch_assoc($res_user);
            
            
                if ($row['prem'] == "Coach") {
                    die("<center><h1 style='color:red;'>Please Login With Suitable Premission</h1></center>");
                
                } 
                else if ($row['prem'] == "Secrtary") {
                    die("<center><h1 style='color:red;'>Please Login With Suitable Premission</h1></center>");
                } 
            } 
         

            else {
                die("<h1>Error fetching user premmission: " . mysqli_error($con) . "</h1>");
            }
        }
    }
    


        $id='';
        $name='';
        $password='';
        $prem='';

        
    if (isset($_POST['id'])){
        $id = $_POST['id'];
    }

    if (isset($_POST['name'])){
        $name = $_POST['name'];
    }

    if (isset($_POST['password'])){
        $password = $_POST['password'];
    }

    if (isset($_POST['prem'])){
        $prem = $_POST['prem'];
    }
    
    if (isset($_POST['add'])){
        $query="insert into users value('$id' ,'$name' ,'$password' ,'$prem')";
        mysqli_query($con,$query);
        header("location: users.php");
    }
    if (isset($_POST['delete'])){
        $query="delete from users where id='$id' OR name='$name'";
        mysqli_query($con,$query);
        header("location: users.php");
    }

    
    if (isset($_POST['clear'])){
        header("location: users.php");
    }
    if (isset($_POST['home'])){
        header("location: main.php");
    }
    
   

    ?>

    <div class="mainDiv">
        <form method="post">
        <button name="home" class="homeb"><img src="images/home_page.png" alt="homa page" class="homei"></button>

            <aside>
                
                <div>
                    <img src="images/users.png" alt="logo" width="150px">
                    <h3>Dashboard</h3>
                    <label for="id">User Id:</label> <br>
                    <input type="text" name="id" > <br>

                    <br>

                    <label for="name">User Name:</label> <br>
                    <input type="text" name="name" require> <br>

                    <br>

                    <label for="password">User Password:</label> <br>
                    <input type="password" name="password" require> <br>

                    <br>

                    <label for="prem">User Premmision:</label> <br>
                    <!-- <input type="text" name="prem"> <br> -->
                    <select name="prem" class="prem">
                        <!-- <option value=""></option> -->
                        <option value="Admin">Admin</option>
                        <option value="Coach">Coach</option>
                        <option value="Team Leader">Team Leader</option>
                        <option value="Secrtary">Secrtary</option>
                    </select>
                    
                    <br>
                    <br>

                    

                    <button name="add">Add User</button>
                    
                    <button name="delete">Delete User</button>
                    
                    <button name="clear">Clear</button>
                </div>
            </aside>


            <main>

                <table>
                    <tr>

                        <th>User Id</th>
                        <th>User Name</th>
                        <th>User Password</th>
                        <th>User Premmision</th>
                        
                    </tr>
                    <?php  
                        while($row = mysqli_fetch_array($res)){
                            echo "<a href='update_user.php' target='_blank'>";
                            echo "<tr>";
                            echo "<td>" . "<a href='update_user.php' target='_blank'>" . $row['id'] . "</a>" . "</td>";
                            echo "<td>" . "<a href='update_user.php' target='_blank'>" . $row['name'] .  "</a>". "</td>";
                            echo "<td>" . "<a href='update_user.php' target='_blank'>" . $row['password'] .  "</a>". "</td>";
                            echo "<td>" . "<a href='update_user.php' target='_blank'>" . $row['prem'] . "</a>" . "</td>";
                            echo "</tr>";
                            echo "</a>";



                            
                        }
                    ?>
                   
                    
                    
                </table>

            </main>
        </form>

    </div>
</body>
</html>