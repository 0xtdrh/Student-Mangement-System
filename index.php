
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
    <title>Add Students</title>
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
        aside{
            text-align: center;
            width: 300px;
            float: left;
            border: 1px solid black;
            padding: 10px;
            margin-top:80px;
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
            /* margin-top:80px; */
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
    $user =  @$_SESSION['username'] ;
    if($user == "reset"){
        header("location:login.php"); 
    }
    
    if (empty($user)){            
        header("location:login.php"); 
        echo "<h1>" . $user . "</h1>"; 
    }
    

    $host='localhost';
    $user='root';
    $pass='';
    $db='students';
    $con=mysqli_connect($host,$user,$pass,$db);
    $res=mysqli_query($con,'select * from student');
    $query='';

    $id = '';
    $name = '';
    $age = '';
    $phone = '';
    $parents = '';


    if (isset($_POST['id'])){
        $id = $_POST['id'];
    }

    if (isset($_POST['name'])){
        $name = $_POST['name'];
    }

    if (isset($_POST['age'])){
        $age = $_POST['age'];
    }

    if (isset($_POST['phone'])){
        $phone = $_POST['phone'];
    }

    if (isset($_POST['parents'])){
        $parents = $_POST['parents'];
    }

    if (isset($_POST['add'])){
        $query="insert into student value($id,'$name',$age,$phone,$parents,'','','','','','','','','','','','','')";
        mysqli_query($con,$query);
        header("location: index.php");
    }

    if (isset($_POST['delete'])){
        $query="delete from student where id='$id' OR name='$name'";
        mysqli_query($con,$query);
        header("location: index.php");
    }
    
    if (isset($_POST['clear'])){
        header("location: index.php");
    }
    if (isset($_POST['home'])){
        header("location: main.php");
    }

    
?>
    <div class="mainDiv">
        <form method="post" action="index.php">
            <button name="home" class="homeb"><img src="images/home_page.png" alt="homa page" class="homei"></button>
            <aside>
                
                <div >
                    <img src="images/students.png" alt="logo" width="150px">
                    <h3>Dashboard</h3>
                    <label for="id">Student Id:</label> <br>
                    <input type="text" name="id" id=""> <br>

                    <br>

                    <label for="name">Student Name:</label> <br>
                    <input type="text" name="name" id=""> <br>

                    <br>

                    <label for="age">Student Age:</label> <br>
                    <input type="text" name="age" id=""> <br>

                    <br>

                    <label for="phone">Student Phone:</label> <br>
                    <input type="text" name="phone" id=""> <br>

                    <br>

                    <label for="parents">Student Parents Phone:</label> <br>
                    <input type="text" name="parents" id=""> <br><br>

                    <button name="add">Add Student</button>
                    
                    <button name="delete">Delete Student</button>
                    
                    <button name="clear">Clear</button>
                </div>
            </aside>


            <main>

                <table>
                    <tr>

                        <th>Id</th>
                        <th>Student Name</th>
                        <th>Student Age</th>
                        <th>Student Phone</th>
                        <th>Student Parents Phone</th>
                    </tr>
                    
                    <?php  
                        while($row = mysqli_fetch_array($res)){
                            echo "<a href='details.php' target='_blank'>";
                            echo "<tr>";
                            echo "<td>" . "<a href='details.php' target='_blank'>" . $row['id'] . "</a>" . "</td>";
                            echo "<td>" . "<a href='details.php' target='_blank'>" . $row['name'] .  "</a>". "</td>";
                            echo "<td>" . "<a href='details.php' target='_blank'>" . $row['age'] .  "</a>". "</td>";
                            echo "<td>" . "<a href='details.php' target='_blank'>" . $row['phone'] . "</a>" . "</td>";
                            echo "<td>" . "<a href='details.php' target='_blank'>" . $row['parents'] . "</a>" . "</td>";
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