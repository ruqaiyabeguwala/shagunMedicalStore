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
      <script style="text/javascript" src="jquery.js"></script>
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

      <link rel="stylesheet" href="css/custom.css">
       <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <link rel="stylesheet" type="text/css" href="file/bvalidator.css">
	<script type="text/javascript" src="file/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="file/jquery.bvalidator-yc.js"></script>
</head>
<body>
  <div class="container-fluid">
      <div class="row" id="header">
          <div class="col-sm-12">
               <ul class="nav nav-tabs navbar-fixed-top nav navbar-inverse" style="background:grey;">
       <li><a href="index1.php">Home</a></li>
       <li class="active "><a href="add.php">Add</a> </li>
       
         
       <li><a href="sell.php">Sell</a></li> 
     <div class="dropdown">
  <li class="dropbtn">View</li>
  <div class="dropdown-content" style="font-size:14px">
    <a href="view_total.php" >View total data</a>
    <a href="view.php">View main data</a>
    <a href="view_sold.php">View sold data</a>
    <a href="view_expire.php">View Expiring data data</a>
    
  </div>
</div>
       
       <li class="nav navbar-right"><a href="logout.php" id="log">Logout</a></li>
     
   </ul>
        
          </div>
      </div><!-- end of header-->
      
      <div class="row" id="entry">
       

      <div class="row" >
         
          <div class="container" id="form" >
            <div class="row" id="left-right">
           
            
                
             <form action="" method="post"  class="form-inline"  id="form1">
                 <div class=" col-sm-6">
                
              
               
               <div class="form-group ">
                    <label for="" class="control-label ">Item name:</label>
                  <input type="text" class="form-control" name="nm" data-bvalidator="alphanum,required">
                  
                 </div><br>
                
                   <div class="form-group">
                    <label for="" class="control-label">Packing:</label>
                     <input type="text"  class=" form-control"  name="pack" data-bvalidator="alphanum,required">
                 </div><br>
                    <div class="form-group">
                    <label for="" class="control-label">Manufacturer:</label>
                     <input type="text"  class=" form-control"  name="mf" data-bvalidator="alpha,required">
                 </div><br>
                  <div class="form-group">
                    <label for="" class="control-label">Batch:</label>
                     <input type="text"  class=" form-control"  name="bch" data-bvalidator="alphanum,required">
                 </div><br>
                    <div class="form-group">
                    <label for="" class="control-label">Expire Date:</label>
                    <input type="date" class="form-control"   name="dt" required >
                 </div><br>
                 <div class="form-group">
                    <label for="" class="control-label">Quantity:</label>
                     <input type="text"  class=" form-control"  name="qty" data-bvalidator="number,required">
                 </div><br>
                
               
                  
                 <div class="form-group">
                    <label for="" class="control-label">M.R.P:</label>
                     <input type="text" class=" form-control" name="p" required data-bvalidator="number,required">
                 </div><br>
                  <div class="form-group">
                    <label for="" class="control-label">Rate:</label>
                     <input type="text" class=" form-control" name="rt" required data-bvalidator="number,required">
                 </div><br>
                 <div class="form-group">
                     <button  class="btn btn-info" name="submit" >Add Item</button>
                 </div>
            
          </div><!-- end of col-sm-6-->
        
        
          </form>
          
         
      </div><!-- end of form-->
     <h4 style="color:grey;float:right;font-family:fantasy;">DESIGNED AND DEVELOPED BY RUQAIYA BEGUWALA &copy; 2017</h4>
  </div>  <!-- end of container-->
  <span data-toggle=snackbar data-content="Hey! Im a snackbar">Click me</span>
 <script>
          
           $("form").submit(function(){
    alert("data added successfully");
              
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
          <script type="text/javascript"> 
    $(document).ready(function () {
        $('#form1').bValidator();
    });
</script> 
</body>
</html>