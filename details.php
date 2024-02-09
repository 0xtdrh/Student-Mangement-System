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
    <title>Details</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="details.css">
</head>
<body>  
<?php
ob_start();
session_start();
    $user =  @$_SESSION['username'] ;

    if($user == "reset"){
        header("location: login.php"); 
    }
    if (empty($user)){            
        header("location:login.php"); 
        // echo "<h1>" . $user . "</h1>"; 
    }
    $host='localhost';
    $user='root';
    $pass='';
    $db='students';
    $con=mysqli_connect($host,$user,$pass,$db);
    $res=mysqli_query($con,"select * from student");
    $query='';
    
    $id = '';
    $name = '';
    $age = '';
    $phone = '';
    $parents = '';
    $course = '';
    $level = '';
    $instructor = '';
    $subs = '';
    $payed = '';
    $discount = '';
    $remain = '';
    $day = '';
    $hour = '';
    $national = '';
    $day2 = '';
    $hour2 = '';
    $notes = '';
    if (isset($_POST['students'])){
        $select1 = '';
        if(isset($_POST['select'])){
            $select1 = $_POST['students'];
            
            if($select1 == "Students"){
                // echo "pleese select Student";
                // $select = ;  
                $stu = mysqli_query($con,'select name from student');
                $fetch = mysqli_fetch_array($stu);
                $select = @$fetch['name'] or die("<h1>There Is No Students</h1>");
                $massege = "This Details For First Student";
            }
            else{
                $select = $select1;
                $massege = $select . " Details";
            }
            
            $idq = "select id from student where name='$select'";
            $idResult = mysqli_query($con, $idq);
            $idRow = mysqli_fetch_array($idResult);
            $id = $idRow['id'];
            
            $nameq = "select name from student where name='$select'";
            $nameResult = mysqli_query($con, $nameq);
            $nameRow = mysqli_fetch_array($nameResult);
            $name = $nameRow['name'];
            
            
            
            $ageq = "select age from student where name='$select'";
            $ageResult = mysqli_query($con, $ageq);
            $ageRow = mysqli_fetch_array($ageResult);
            $age = $ageRow['age'];
            
            
            
            $phoneq = "select phone from student where name='$select'";
            $phoneResult = mysqli_query($con, $phoneq);
            $phoneRow = mysqli_fetch_array($phoneResult);
            $phone = $phoneRow['phone'];
            
            
            
            $parentsq = "select parents from student where name='$select'";
            $parentsResult = mysqli_query($con, $parentsq);
            $parentsRow = mysqli_fetch_array($parentsResult);
            $parents = $parentsRow['parents'];

            $courseq = "SELECT course from student where name='$select'";
            $courseResult = mysqli_query($con, $courseq);
            $courseRow = mysqli_fetch_array($courseResult);
            $course = $courseRow['course'];

            $levelq = "select level from student where name='$select'";
            $levelResult = mysqli_query($con, $levelq);
            $levelRow = mysqli_fetch_array($levelResult);
            $level = $levelRow['level'];

            $instructorq = "SELECT instructor from student where name='$select'";
            $instructorResult = mysqli_query($con, $instructorq);
            $instructorRow = mysqli_fetch_array($instructorResult);
            $instructor = $instructorRow['instructor'];


            $subsq = "select subs from student where name='$select'";
            $subsResult = mysqli_query($con, $subsq);
            $subsRow = mysqli_fetch_array($subsResult);
            $subs = $subsRow['subs'];


            $payedq = "select payed from student where name='$select'";
            $payedResult = mysqli_query($con, $payedq);
            $payedRow = mysqli_fetch_array($payedResult);
            $payed = $payedRow['payed'];


            $discountq = "select discount from student where name='$select'";
            $discountResult = mysqli_query($con, $discountq);
            $discountRow = mysqli_fetch_array($discountResult);
            $discount = $discountRow['discount'];

            $dayq = "select day from student where name='$select'";
            $dayResult = mysqli_query($con, $dayq);
            $dayRow = mysqli_fetch_array($dayResult);
            $day = $dayRow['day'];


            $hourq = "select hour from student where name='$select'";
            $hourResult = mysqli_query($con, $hourq);
            $hourRow = mysqli_fetch_array($hourResult);
            $hour = $hourRow['hour'];

            $day2q = "select day2 from student where name='$select'";
            $day2Result = mysqli_query($con, $day2q);
            $day2Row = mysqli_fetch_array($day2Result);
            $day2 = $day2Row['day2'];


            $hour2q = "select hour2 from student where name='$select'";
            $hour2Result = mysqli_query($con, $hour2q);
            $hour2Row = mysqli_fetch_array($hour2Result);
            $hour2 = $hour2Row['hour2'];

            
            $nationalq = "select national from student where name='$select'";
            $nationalResult = mysqli_query($con, $nationalq);
            $nationalRow = mysqli_fetch_array($nationalResult);
            $national = $nationalRow['national'];

            $notesq = "select notes from student where name='$select'";
            $notesResult = mysqli_query($con, $notesq);
            $notesRow = mysqli_fetch_array($notesResult);
            $notes = $notesRow['notes'];
            
            
        }
    }
    
    else{
        $isnotselect = "Please Select Student";
    }
    
    
    
    if (isset($_POST['course'])){
        $course=$_POST['course'];
    }
    if (isset($_POST['level'])){
        $level=$_POST['level'];
    }
    if (isset($_POST['instructor'])){
        $instructor=$_POST['instructor'];
    }
    if (isset($_POST['sub'])){
        $subs=$_POST['sub'];
        
    }
    if (isset($_POST['payed'])){
        $payed=$_POST['payed'];
    }
    if (isset($_POST['discount'])){
        $discount=$_POST['discount'];
    }
    if (isset($_POST['day'])){
        $day=$_POST['day'];
    }
    if (isset($_POST['hour'])){
        $hour=$_POST['hour'];
    }
    if (isset($_POST['day2'])){
        $day2=$_POST['day2'];
    }
    if (isset($_POST['hour2'])){
        $hour2=$_POST['hour2'];
    }
    if (isset($_POST['national'])){
        $national=$_POST['national'];
    }
    if (isset($_POST['notes'])){
        $notes=$_POST['notes'];
    }
    
    
    if (isset($_POST['save'])){

        if ($age != $_POST['age']){
            $age = $_POST['age'];
        }
        else{
            $age = $ageRow['age'];

        }

        if ($phone != $_POST['phone']){
            $phone = $_POST['phone'];
        }
        else{
            $phone = $phoneRow['phone'];

        }

        if ($parents != $_POST['parents']){
            $parents = $_POST['parents'];
        }
        else{
            $parents = $parentsRow['parents'];

        }
        if(isset($_POST['sub'])){
            $remain1 = (int)$subs-(int)$payed;
            $remain2 = (int)$remain1 * (int)$discount / 100;
            $remain = (int)$remain1 - (int)$remain2;
        }
        else{
            $remain = '';
            $payed = '';
            $discount = '';
        }
        
        $name_student=$_POST['name'];
        $query="UPDATE student SET  age='$age' ,phone='$phone' ,parents='$parents' ,course='$course' ,level='$level' ,instructor='$instructor' ,subs='$subs' ,payed='$payed' ,discount='$discount' ,remain='$remain' ,national='$national' ,day='$day' ,hour='$hour' ,day2='$day2' ,hour2='$hour2' ,notes='$notes' WHERE  name='$name_student'";
        mysqli_query($con,$query);
        header("location: details.php");
        
    }
    if (isset($_POST['add'])){
        header("location:index.php");
       
    }

    if (isset($_POST['clear'])){
        header("location:details.php");
    }
    if (isset($_POST['delete'])){
        $name_del = $_POST['name'];
        $query_delete="DELETE FROM student WHERE name='$name_del'";
        mysqli_query($con,$query_delete);
        header("location:details.php");
        exit();
    }
    if (isset($_POST['home'])){
        header("location: main.php");
    }
?>
<div class="div">
    <h1>
        <?php 
            if (isset($select)){
                $h = $massege;
                echo  "[". $id . "] ". $h;

            }
            // else{
            //     echo $isnotselect;
            // }
            
        
        ?>

    </h1>

    <form method="post">
    <button name="home" class="homeb"><img src="images/home_page.png" alt="homa page" class="homei"></button>
        <div class="first">
        <select Name="students" autofocus required>  
            <option > Students </option>  
            <?php
                    $stu=mysqli_query($con,'select name from student');
                    while($fetch=mysqli_fetch_array($stu)){
                        echo "<option>" . $fetch['name'] . "</option>";
                    }
            ?>
        </select>  
        <br>
        <Button name="select">Select Student</Button>
        <!-- ////////////////////////////////////////////////////////// -->
        
        <br><br>
        <label for="name">Name:</label>
        <br>
        <input type="text" name="name" readonly value="<?php echo (isset($name))?$name:'';?>">
        <br><br>
        <label for="age">Age:</label>
        <br>
        <input type="text" name="age" value="<?php echo (isset($age))?$age:'';?>">
        <br><br>
        <label for="phone">Phone:</label>
        <br>
        <input type="text" name="phone" value="<?php echo (isset($phone))?$phone:'';?>">
        <br><br>
        <label for="parents">Parents phone:</label>
        <br>
        <input type="text" name="parents" value="<?php echo (isset($parents))?$parents:'';?>">
        <br><br>
        <label for="notes">Notes:</label>
        <br>
        <input type="text" class="notes" name="notes" value="
        <?php 
            if (isset($notesRow)){
                echo $notesRow['notes'];
            }
        ?>
        ">
        
        <br><br>
    </div>
    <!-- ////////////////////////////////////////////////////////// -->
    <div class="second">
        <label for="course">Course:</label>
        <br>
        <input type="text" name="course" id="" value="<?php if (isset($courseRow)){echo $courseRow['course'];}?>">
        <br>
        
        <br><br>
        
        <label for="level">Level:</label>
        <br>
        <input type="text" name="level" value="<?php if (isset($levelRow)){echo $levelRow['level'];}?>">
        <br>
        
        <br><br>
        <label for="instructor">Instructor:</label>
        <br>
        <input type="text" name="instructor" id="" value="<?php if (isset($instructorRow)){echo $instructorRow['instructor'];}?>">
        <br>
        <br><br>
        <label for="day">Day:</label><br>
        <input type="text" name="day" value="<?php 
            if (isset($dayRow)){
                echo $dayRow['day'];
            }
        ?>">
        <br><br>
        <label for="hour">Hour:</label><br>
        <input type="text" name="hour" value="<?php if (isset($hourRow)){echo $hourRow['hour'];}?>">    
       

        <!-- ////////////////////// -->
            <br><br>
        </div>
        <!-- ///////////////////////////////////////////////////////////// -->
        <div class="third">        
        <label for="sub">Subscription:</label>
        <br>
        <input type="text" name="sub" value="<?php if (isset($subsRow)){echo $subsRow['subs'];}?>">

        <br><br>
        
        <label for="payed">Payed:</label>
        <br>
        <input type="text" name="payed" value="<?php if (isset($payedRow)){echo $payedRow['payed'];}?>">
        
        <br><br>
        
        <label for="discount">Discount:</label>
        <br>
        <input type="text" name="discount" id="" value="<?php if (isset($discountRow)){echo $discountRow['discount'];}?>">
        <br><br>
        
        <label for="national">National Number:</label>
        <br>
    <input type="text" name="national" maxlength="14" value="<?php if (isset($nationalRow)){echo $nationalRow['national'];}?>">

        <br><br>
        <label for="day2">Day2:</label><br>
        <input type="text" name="day2" value="<?php if (isset($day2Row)){echo $day2Row['day2'];}?>">
        <br><br>
        <label for="hour2">Hour2:</label><br>
        <input type="text" name="hour2" value="<?php if (isset($hour2Row)){echo $hour2Row['hour2'];}?>">  



        </div>
    
        <div class="btns">
            <button class="save" name="save">Save</button>
            <button class="add" name="add">Add Student</button>
            <br><br>
            <button class="clear" name="clear">Clear</button>
            <button class="delete" name="delete">Delete Student</button>
        </div>
    </form>
    <div class="tbl">
    <table  >
        <tr>
            <th>Id</th>   
            <th>Name</th>   
            <th>Age</th>   
            <th>Phone</th>   
            <th>Parents phone</th>   
            <th>Course</th>   
            <th>Level</th>   
            <th>Instructor</th>   
            <th>Subscription</th>   
            <th>Payed</th>   
            <th>Discount</th>   
            <th>Remain</th>   
            <th>National Number</th>   
            <th>Day </th>   
            <th>Hour</th>   
            <th>Day2 </th>   
            <th>Hour2</th>   
            <th>notes</th>   
        </tr>
        <?php   
        if (isset($_POST['select'])){
            $rquery = "select * from student where name = '$select'";
            $res=mysqli_query($con,$rquery);
                while($row = mysqli_fetch_array($res)){
                    echo "<tr>";
                    echo "<td>" .  $row['id'] . "</td>";
                    echo "<td>" .  $row['name'] . "</td>";
                    echo "<td>" .  $row['age'] .  "</td>";
                    echo "<td>" .  $row['phone'] .  "</td>";
                    echo "<td>" .  $row['parents'] . "</td>";
                    echo "<td>" .  $row['course'] . "</td>";
                    echo "<td>" .  $row['level'] . "</td>";
                    echo "<td>" .  $row['instructor'] . "</td>";
                    echo "<td>" .  $row['subs'] . "</td>";
                    echo "<td>" .  $row['payed'] . "</td>";
                    echo "<td>" .  $row['discount'] . "</td>";
                    echo "<td>" .  $row['remain'] . "</td>";
                    echo "<td>" .  $row['national'] . "</td>";
                    echo "<td>" .  $row['day'] . "</td>";
                    echo "<td>" .  $row['hour'] . "</td>";
                    echo "<td>" .  $row['day2'] . "</td>";
                    echo "<td>" .  $row['hour2'] . "</td>";
                    echo "<td>" .  $row['notes'] . "</td>";
                    echo "</tr>";
                }
            }
        ?>

    </table>
    </div>
</div> 
</body>
</html>