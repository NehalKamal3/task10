<?php  require_once 'db.php';

require_once 'boot.html';
if(isset($_POST['regis'])){

  if(!empty( $_POST['uname'] && $_POST['email'] && $_POST['pass'] && $_POST['re-pass'] && $_POST['gender'] )){


    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data ;
    }

    $uname=validate($_POST['uname']);
    $email=validate($_POST['email']);
    $pass=validate($_POST['pass']);
    $re_pass=validate($_POST['re-pass']);
    $gender=validate($_POST['gender']);


     if(strlen($uname) >22  || strlen($uname) < 7 ){
        $errors[]='username must be from 7 to 22 ';
     }

     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $errors[]='not a valid email';
      }

      if(strlen($pass) > 20 || strlen($pass < 7) ){
        $errors[]='password from 7 to 20 char or number';
      }

      if($re_pass !== $pass){
        $errors[]='passwords must be the same';
      }

$select =" select * from users ";
$res=mysqli_query($conn , $select);

if(  ($row=mysqli_fetch_assoc($res)) > 0 ){

  if($row['email'] == $email){
  $errors[]='this email already exists';
  
  

  }


   }if(empty($errors)){

      $insert="INSERT INTO users ( username, email, password, gender)
       VALUES ('$uname','$email','$pass','$gender')";
       $exct= mysqli_query($conn , $insert);

      if($exct && empty($errors) ){

        header("location: all_users.php");

      }else{
        echo "Error: " . $exct . "<br>" . mysqli_error($conn);
        die();
       }


      }

      
      

    }else{
        $errors[]='fill all the data';
    }
}



?>
<!DOCTYPE html>
<html>
    <link href="css.css" rel="stylesheet">
<body>

<h2>REGISTER</h2>

<form action="" method="post">
    <?php
if(isset($errors ) && !empty($errors) ):
      foreach($errors as $error){
        echo "<div class='alert alert-danger' role='alert'>
         $error
     
</div>";} endif;
?>

  <label class="txt"   for="fname">Username:</label><br>
  <input class="in" type="text" placeholder="username" name="uname" value=""><br>
  <label  class="txt"  for="lname">email:</label><br>
  <input  class="in" type="text" placeholder="email" name="email"  ><br><br>

  <label class="txt"   for="fname">password:</label><br>

  <input class="in"  type="text" placeholder="password" name="pass"  ><br>

  <label  class="txt"  for="lname">rep-password:</label><br>
  <input  class="in"  type="password" placeholder="rep-password" name="re-pass" ><br><br>

<input class="gen" type="radio" name="gender" value="male"  > Male
<input class="gen" type="radio" name="gender" value="female"> Female


  <input class="btn" type="submit" name="regis" value="register">

  <input class="btn2" type="submit" name="ref" href="#" value="refresh">
  <a href="all_emp.php"><button type="button" class="btn btn-primary">employees</button></a>

</form> 



</body>
</html>