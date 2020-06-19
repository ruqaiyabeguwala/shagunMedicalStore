
<?php
include "control.php";
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
    <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="jquery.js"></script>
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <div class="container-fluid">
        
   

    
    <div class="col-sm-12" id="">
        <h3 id="logout"><a href="logout.php"><span class=" glyphicon glyphicon-briefcase" ></span>Logout</a></h3>
    <h1>
   <span class=" glyphicon glyphicon-heart"></span>
    Shagun Medical Store 
    <span class=" glyphicon glyphicon-heart"></span>
    </h1>
    </div>
    </div><!-- end of title-->
   
        
     
   
        
   
    <div class="row" id="ruk" style="margin-top:60px;">
        <center><div class="col-sm-2 col-sm-offset-3"><a href="add.php" class="btn btn-default btn-lg">ADD</a></div>
            <div class="col-sm-2"><a class="btn btn-default btn-lg " href="sell.php">SELL</a></div>
            <div class="col-sm-2" ><a href="view.php" class="btn btn-default btn-lg">VIEW</a></div></center>
       
     
       
        
        
    </div><!-- end of button-->
   
    </div><!-- end of conatiner-->
    <script type="text/javascript">
    $('document').ready(function(){
          
       $('#cl').click(function(){
           
           $('#my').fadeToggle(1000);
       }) 
        
        
    });


    </script>
     <script type="text/javascript">
          function myFunction() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar")

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 10000);
}
          </script>
     <h4  style="color:grey;float:right;margin-top:150px;">DESIGNED AND DEVELOPED BY RUQAIYA BEGUWALA &copy; 2017</h4>
</body>
</html>