
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
    <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script style="text/javascript" src="jquery.js"></script>
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <div class="container-fluid">
         <div class="row" id="header">
          <div class="col-sm-12">
               <ul class="nav nav-tabs">
       <li><a href="index1.php">Home</a></li>
       <li ><a href="add.php">Add</a></li>
       <li class=""><a href="sell.php">Sell</a></li> 
       <li><a href="view.php">View</a></li>
       <li class="nav navbar-right"><a href="logout.php" id="log">Logout</a></li>
     
   </ul>
        
          </div>
      </div><!-- end of header-->
       
        <div class="row">
           
           <div class="col-sm-5 col-sm-offset-3" id="form">
         <?php 
             foreach(@$edit1 as $u)
            {
    ?>
             <form action="" method="post">
              
               <div class="form-group ">
                    <label for="" class="control-label ">Item code:</label>
                     <input type="text" class=" form-control " name="code" value="<?php echo $u->icode; ?>" required>
                 </div><br>
               
                 <div class="form-group ">
                    <label for="" class="control-label ">Item name:</label>
                     <input type="text" class=" form-control " name="nam" value="<?php echo $u->name; ?>" required >
                 
                 </div><br>
                 
                 <div class="form-group ">
                    <label for="" class="control-label ">Pack:</label>
                     <input type="text" class=" form-control " name="pck" value="<?php echo $u->packe; ?>" required >
                 
                 </div><br>                 
                  <div class="form-group ">
                    <label for="" class="control-label ">Manufacturer:</label>
                     <input type="text" class=" form-control " name="mf" value="<?php echo $u->mfr; ?>" required >
                 
                 </div><br>
                 
                  <div class="form-group ">
                    <label for="" class="control-label ">Batch:</label>
                     <input type="text" class=" form-control " name="bch" value="<?php echo $u->batch; ?>" required >
                 
                 </div><br>
                 <div class="form-group ">
                    <label for="" class="control-label ">Date:</label>
                     <input type="date" class=" form-control " name="dt" value="<?php echo $u->date; ?>" required >
                 
                 </div><br>
                 <div class="form-group ">
                    <label for="" class="control-label ">Expire Date:</label>
                     <input type="date" class=" form-control " name="edt" value="<?php echo $u->edate; ?>" required >
                 
                 </div><br>
                
                 <div class="form-group">
                    <label for="" class="control-label">Quantity:</label>
                     <input type="text"  class=" form-control" name="qnty" value="<?php echo $u->quantity; ?>" required>
                 </div><br>
                 
                 <div class="form-group">
                    <label for="" class="control-label">M.R.P.:</label>
                     <input type="text" class=" form-control" name="pr" value="<?php echo $u->price; ?>" required>
                 </div><br>
                 <div class="form-group">
                    <label for="" class="control-label">Profit:</label>
                     <input type="text" class=" form-control" name="pro" value="<?php echo $u->profit; ?>" required>
                 </div><br>
                 <div class="form-group">
                     <input type="submit" class="btn btn-default" name="update_data1" Value="Update!" >
                 </div>
                
                
                
                
            </form>
           
             <?php
            }
               ?>
           </div>
            
        </div>
        
        
        
    </div><!-- end of container-fluid-->
     <h4 style="color:grey;float:right;font-family:fantasy;">DESIGNED AND DEVELOPED BY RUQAIYA BEGUWALA &copy; 2017</h4>
    <script>
          
           $("form").submit(function(){
    alert("data updated successfully");
              
});
</script>
</body>
</html>