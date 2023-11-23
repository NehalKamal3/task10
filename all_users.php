<?php

require_once 'db.php';
require_once 'boot.html';

  $users = "SELECT `id`, `username`, `email`, `password`, `type`, `gender` FROM `users` ";




?>

<h2>users data</h2>
<a href="index.php"  ><button type="button" class="btn btn-primary">home</button></a>
 <table class="table">
 <thead>
   <tr>
     <th scope="col">#id</th>
     <th scope="col">full name</th>
     <th scope="col">email</th>
     <th scope="col">password</th>
     <th scope="col">gender</th>
     <th scope="col">type</th>

   </tr>
 </thead>
 <tbody>
    <?php
 $exct = mysqli_query($conn , $users);


 //var_dump($exc);
 while($row=mysqli_fetch_assoc($exct)):   ?>


    <tr>
      <th scope="row"><?=$row['id']?></th>
      <td><?=$row['username']?></td>
      <td><?=$row['email']?></td>
      <td><?=$row['password']?> </td>
      <td><?=$row['gender']?> </td>
      <td><?=$row['type']?> </td>

    </tr>      

    <tr>
    <?php endwhile ;
    ?>

 
  </tbody>
</table>

