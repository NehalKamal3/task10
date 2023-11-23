<?php

require_once 'db.php';

  $emp = "select  `employee_id`, concat(`first_name`,' ', `last_name`) as name, `email`, salary, gender,
  case gender  when '0' then 'male'  when '1' then 'female' end as gender FROM `employees` ";

  require_once 'boot.html';


?>

<h2>employees data</h2>
<a href="index.php"  ><button type="button" class="btn btn-primary">home</button></a>
 <table class="table">
 <thead>
   <tr>
     <th scope="col">#id</th>
     <th scope="col">full name</th>
     <th scope="col">email</th>
     <th scope="col">salary</th>
     <th scope="col">gender</th>

   </tr>
 </thead>
 <tbody>
    <?php
 $exc = mysqli_query($conn , $emp);


 while($row=mysqli_fetch_assoc($exc)):   ?>


    <tr>
      <th scope="row"><?=$row['employee_id']?></th>
      <td><?=$row['name']?></td>
      <td><?=$row['email']?></td>
      <td><?=$row['salary']?> </td>
      <td><?=$row['gender']?> </td>

    </tr>      

    <tr>
    <?php endwhile ;
    ?>

 
  </tbody>
</table>

