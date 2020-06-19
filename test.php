<?php  include "control.php";
session_start(); 

if(!isset($_SESSION['user']))
{
  header('location:logout.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
  <?php  $t=0;  ?>
      <form action="" method="post">
         
        <?php 
          if(isset($_POST['btn'])){
              $t=$t+1;
          }
          $i=1; do{
                   ?>
                   
                   Name<input type="text" name="nm"> 
                  
                   Quantity <input type="text" name="qnty">
                   <input type="submit" name="sub">
                    <button name="btn" >Add more</button>
                  <?php
              $i=$i+1;
                 }while($i<=$t); 
          
          
          ?>
                 
         
      </form>    
</body>
</html>