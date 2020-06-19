<?php include "control.php";
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
      <script type="application/javascript" src="js/export1.js"></script>
            <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">
    .input[type=text] {
    width: 130px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

/* When the input field gets focus, change its width to 100% */
input[type=text]:focus {
    width: 80%;
}
    
    
    </style>
</head>
<body>
  <div class="container-fluid">
  <div class="row" id="header">
          <div class="col-sm-12">
               <ul class="nav nav-tabs navbar-fixed-top nav navbar-inverse" style="background:grey;">
       <li><a href="index1.php">Home</a></li>
       <li><a href="add.php">Add</a></li>
       <li><a href="sell.php">Sell</a></li> 
     <div class="dropdown">
  <li class="dropbtn active">View</li>
  <div class="dropdown-content" style="font-size:14px">
    <a href="view_total.php" >View total data</a>
    <a href="view.php">View main data</a>
    <a href="view_sold.php">View sold data</a>
    <a href="view_expire.php">View expiring data</a>
  </div>
</div>
   
  
   
 <?php $t=0; ?>


  
       <li class="navbar-right"><a href="logout.php" id="log" style="float:right">Logout</a></li>
    
   </ul>
        
          </div>
      </div><!-- end of header-->
      
      <div class="row" style="margin-top:50px;">
          <center><h3 style="text-decoration:overline;">Remaining Enteries</h3></center>
        
         <div class="col-sm-3">
        
     
          <h4><b>Total cost:<?php 
             
              if(isset($_POST['s'])){
                 if(empty($s))
                     $t=0;
                      else{
                  foreach(@$s as $u){
                       
                        $p=$u->price;
                             $q=$u->quantity;
                             $tp=$p*$q;                           
                            $t=$tp+$t;
                  }
                  }
                 
                  echo $t;
              }
              else  if(isset($_POST['today'])){
                  if(empty($view1))
                     $t=0;
                  else{
                  foreach(@$view1 as $u){
                        $p=$u->price;
                             $q=$u->quantity;
                             $tp=$p*$q;                           
                            $t=$tp+$t;
                  }
                  }
                   
                  echo $t;
              }
              else {
                  if(empty($viewdata))
                     $t=0;
                  else{
                  foreach(@$viewdata as $u){
                        $p=$u->price;
                             $q=$u->quantity;
                             $tp=$p*$q;                           
                            $t=$tp+$t;
                  }
                  }
                   
                  echo $t;
              }
              
              
              
              ?></b></h4>
          </div>
          
             <form action=""  method="post" class="form-inline">
                <div class=" col-sm-offset-2 col-sm-7  ">
                 <h5><b>From:</b>
              <input type="date" class="form-control" name="d1" required>
             <b>To:</b>
                <input type="date" class="form-control" name="d2" required>
                 
                 <button type="submit" class="btn btn-info" name="s">Search</button></h5>
                 
                 </div>
                  </form>
                
                    
             
          </div>
          
         <form method="post"> 
      <input type="submit" name="today" class="btn btn-info" value="See Today's enteries">
      </form>
      
      <a href="#" id="test" onClick="javascript:fnExcelReport();" style="float:right" class="btn btn-info">Export in Excel</a>
       
      <div class="row" id="view">
          <table class=" table table-hover" id="myTable1">
             <?php 
              if(empty($viewdata))
                 {

        	 echo "<center><h1>No record found..!!</h></center>";
               }
              
    else{
                  
             ?>
             <tr style="background:grey;"> 
              <th>Item Code</th>
              <th>Medicine name</th>
              <th>Pack</th>
              <th>Manufacturer</th>
              <th>Batch</th>
             <th>Date</th>
             <th>Expire date</th>
              <th>Quantity</th>
              <th>Rate</th>
              <th>M.R.P.</th>
              <th>Total price</th>
              <th>Action</th>
              </tr>
              <?php
             
              
             
            if(isset($_POST['s']))
              {
                 if(empty($s))
                 {

        	 echo "<center><h1>No record found..!!</h></center>";
               }
                else
                {
                  foreach(@$s as $u)
                  {
                ?>
                <tr>
                  
                    <td><?php  echo $u->icode; ?></td>
                     <td><?php  echo $u->name; ?></td>
                      
                      <td><?php echo $u->packe; ?></td>
                          <td><?php echo $u->mfr; ?></td>
                            <td><?php echo $u->batch; ?></td>
                         <td><?php  echo $u->date; ?></td>
                          <td><?php  echo $u->edate; ?></td>
                       <td><?php  echo $u->quantity; ?></td>
                        <td><?php  echo $u->rate; ?></td>
                        <td><?php  echo $u->price; ?></td>
                        
                          <td><?php 
                             $p=$u->rate;
                             $q=$u->quantity;
                             $tp=$p*$q;
                             echo $tp;
                             ?></td>
                              <?php 
                            $t=$tp+$t;
                    
                    ?>
                        
                         <td>
                         
                         <a href="sold.php?selid=<?php echo $u->icode; ?>">  Sell</a>
                         <a href="edit.php?editid=<?php echo $u->icode; ?>">Edit</a>
                          
                          <a href="control.php?delid=<?php echo $u->icode; ?>" onclick="return confirm('Delete this record?')">Delete</a></td>
                </tr>
                
                <?php
                  }
              }
            }
        else if(isset($_POST['today']))
              {
                 if(empty($view1))
                 {

        	 echo "<center><h1>No record found..!!</h></center>";
               }
                else
                {
                  foreach(@$view1 as $u)
                  {
                ?>
                <tr>
                    
                    <td><?php  echo $u->icode; ?></td>
                     <td><?php  echo $u->name; ?></td>
                      
                      <td><?php echo $u->packe; ?></td>
                          <td><?php echo $u->mfr; ?></td>
                            <td><?php echo $u->batch; ?></td>
                         <td><?php  echo $u->date; ?></td>
                          <td><?php  echo $u->edate; ?></td>
                       <td><?php  echo $u->quantity; ?></td>
                        <td><?php  echo $u->rate; ?></td>
                        <td><?php  echo $u->price; ?></td>
                          <td><?php 
                             $p=$u->rate;
                             $q=$u->quantity;
                             $tp=$p*$q;
                             echo $tp;
                             ?></td>
                              <?php $t=0;
                            $t=$tp+$t;   ?>
                         <td>
                         
                         <a href="sold.php?selid=<?php echo $u->icode; ?>">  Sell</a>
                         <a href="edit.php?editid=<?php echo $u->icode; ?>">Edit</a>
                          
                          <a href="control.php?delid=<?php echo $u->icode; ?>" onclick="return confirm('Delete this record?')">Delete</a></td>
                </tr>
                
                <?php
                  }
              }
            }
        
                else 
              {
                  
              foreach($viewdata as $u){
                ?>
                <tr>
                    
                    <td><?php  echo $u->icode; ?></td>
                     <td><?php  echo $u->name; ?></td>
                      
                      <td><?php echo $u->packe; ?></td>
                          <td><?php echo $u->mfr; ?></td>
                            <td><?php echo $u->batch; ?></td>
                         <td><?php  echo $u->date; ?></td>
                          <td><?php  echo $u->edate; ?></td>
                       <td><?php  echo $u->quantity; ?></td>
                        <td><?php  echo $u->rate; ?></td>
                        <td><?php  echo $u->price; ?></td>
                          <td><?php 
                             $p=$u->rate;
                             $q=$u->quantity;
                             $tp=$p*$q;
                             echo $tp;
                             ?></td>
                              <?php $t=0;
                            $t=$tp+$t;  ?>
                         <td>
                         <a href="sold.php?selid=<?php echo $u->icode; ?>">  Sell</a>
                         <a href="edit.php?editid=<?php echo $u->icode; ?>">Edit</a>
                         <a href="control.php?delid=<?php echo $u->icode; ?>" onclick="return confirm('Delete this record?')">  Delete</a></td>
                         
                         
                </tr>
                
                <?php
              }
              }
     
    }
              
              
              ?>
          </table>
      </div>
  </div>  <!-- end of container-->

<script type="text/javascript">
   $('a.delete').on('click', function() {
    var choice = confirm('Do you really want to delete this record?');
    if(choice === true) {
        return true;
    }
    return false;
});
    
    
     
    </script>


</body>
</html>