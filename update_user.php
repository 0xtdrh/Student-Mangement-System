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
    <meta name="viewport" content="width=ff, initial-scale=1.0">
    <title>Update User</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="update_user.css">
</head>
<body>
<?php
    session_start();
    
    
        $host='localhost';
        $user='root';
        $pass='';
        $db='students';
        $con=mysqli_connect($host,$user,$pass,$db);

        $user =  @$_SESSION['username'] ;
        if($user == "reset"){
            header("location:login.php"); 
        }
    if (empty($user)){            
        header("location: login.php"); 
    }
    else {
        $res_user = mysqli_query($con, "SELECT prem FROM users WHERE name='$user'");
        
        if ($res_user) {
            $row = mysqli_fetch_assoc($res_user);
            
            if ($row['prem'] == "Coach") {
                die("<center><h1 style='color:red;'>Please Login With Suitable Premission</h1></center>");
                
            } 
            else if ($row['prem'] == "Secrtary") {
                die("<center><h1 style='color:red;'>Please Login With Suitable Premission</h1></center>");
            } 
            else if ($row['prem'] == "Team Leader") {
                die("<center><h1 style='color:red;'>Please Login With Suitable Premission</h1></center>");
            } 
        } 
        else {
            die("<h1>Error fetching user premmission: " . mysqli_error($con) . "</h1>");
        }
    }

        $id='';
        $name='';
        $password='';
        $prem='';

        
        if(isset($_POST['select'])){

            $select1 = $_POST['users'];
            
            if($select1 == "Users"){
                // echo "<h1>There Is No Students</h1>";
                // $select = ;  
                $stu = mysqli_query($con,'select name from Users');
                $fetch = mysqli_fetch_array($stu);
                $select = @$fetch['name'] or die("<h1>There Is No Users/h1>");
                $massege = "This Details For First User";
            }
            else{
                $select = $select1;
                $massege = $select . " Details";
            }

            $query_res = "SELECT * from users where name = '$select'";
            $res=mysqli_query($con,$query_res);





            $idq = "select id from users where name='$select'";
            $idResult = mysqli_query($con, $idq);
            $idRow = mysqli_fetch_array($idResult);
            $id = $idRow['id'];
        
            $nameq = "select name from users where name='$select'";
            $nameResult = mysqli_query($con, $nameq);
            $nameRow = mysqli_fetch_array($nameResult);
            $name = $nameRow['name'];
        
        
        
            $passwordq = "select password from users where name='$select'";
            $passwordResult = mysqli_query($con, $passwordq);
            $passwordRow = mysqli_fetch_array($passwordResult);
            $password = $passwordRow['password'];
        
        
        
            $premq = "select prem from users where name='$select'";
            $premResult = mysqli_query($con, $premq);
            $premRow = mysqli_fetch_array($premResult);
            $prem = $premRow['prem'];
        }

// ////////////////////////////////////////////////////////////////


        if (isset($_POST['save'])){

            if ($id != $_POST['id']){
                $id = $_POST['id'];
            }
            else{
                $id = $idRow['id'];
    
            }
    
            if ($name != $_POST['name']){
                $name = $_POST['name'];
            }
            else{
                $name = $nameRow['name'];
    
            }
    
            if ($password != $_POST['password']){
                $password = $_POST['password'];
            }
            else{
                $password = $passwordRow['password'];
    
            }
            if ($prem != $_POST['prem']){
                $prem = $_POST['prem'];
            }
            else{
                $prem = $premRow['prem'];
    
            }
            
            
            $query="UPDATE users SET  name='$name' ,password='$password' ,prem='$prem'  WHERE  id='$id'";
            mysqli_query($con,$query);
            header("location: update_user.php");

        }
        if (isset($_POST['clear'])){
            header("location: update_user.php");
        }
        if (isset($_POST['add'])){
            header("location: users.php");
        }
        if (isset($_POST['delete'])){
            $id_del = $_POST['id'];
            $query_delete="DELETE FROM users WHERE id='$id_del'";
            mysqli_query($con,$query_delete);
            header("location:update_user.php");
            exit();
        }
        if (isset($_POST['home'])){
            header("location: main.php");
        }

        



?>
    
<div class="div">
    
    <h1 class="header">Update User</h1>
    <h1>
        <?php 
            if (isset($select)){
                $h = $massege;
                echo  "[". $id . "] ". $h;
            }
            
            ?>

</h1>
<form method="post">
        <button name="home" class="homeb"><img src="images/home_page.png" alt="homa page" class="homei"></button>
        <div class="first">
            <div class="select">
                <select Name="users" autofocus required>  
                    <option > Users </option> 
                    <?php
                    $stu=mysqli_query($con,'select name from users');
                    while($fetch=mysqli_fetch_array($stu)){
                        echo "<option>" . $fetch['name'] . "</option>";
                    }
                    ?> 
                </select>  
                <br><br><br>
                <Button name="select">Select User</Button>
            </div>
        <!-- ////////////////////////////////////////////////////////// -->
        
        <br><br>
        <label for="id">User Id:</label>
        <br>
        <input type="text" name="id" readonly value="<?php echo (isset($id))?$id:'';?>">
        <br><br><br><br>
        <label for="name">User Name:</label>
        <br>
        <input type="text" name="name" value="<?php echo (isset($name))?$name:'';?>">
        <br><br><br><br>

        <label for="password">User Password:</label>
        <br>
        <input type="text" name="password" value="<?php echo (isset($password))?$password:'';?>">
        <br><br><br><br>
        <label for="prem">User Premmision:</label>
        <br>
        <input type="text" name="prem" readonly value="<?php echo (isset($prem))?$prem:'';?>">
        <br><br><br><br>
       
    </div>



        </div>
    
        <div class="btns">
            <button class="save" name="save">Save</button>
            <button class="add" name="add">Add User</button>
            <br><br>
            <button class="clear" name="clear">Clear</button>
            <button class="delete" name="delete">Delete User</button>
        </div>
    </form>
    <div class="tbl">
    <table  >
        <tr>
            <th>User Id</th>   
            <th>User Name</th>   
            <th>User Password</th>   
            <th>User Premmision</th>   
        </tr>
        <?php   
        if (isset($_POST['select'])){
            $rquery = "select * from users where name = '$select'";
            $res=mysqli_query($con,$rquery);
                while($row = mysqli_fetch_array($res)){
                    echo "<tr>";
                    echo "<td>" .  $row['id'] . "</td>";
                    echo "<td>" .  $row['name'] . "</td>";
                    echo "<td>" .  $row['password'] .  "</td>";
                    echo "<td>" .  $row['prem'] .  "</td>";
                    echo "</tr>";
                }
            }
        ?>
    </table>
    </div>
</div> 
</body>
</html>