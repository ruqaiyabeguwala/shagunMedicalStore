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
      <script type="application/javascript" src="js/export_expire.js"></script>
            <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

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
    <a href="view_expire.php">View Recently expiring data</a>
  </div>
</div>
   
  
   
 <?php $t=0; ?>


  
       <li class="navbar-right"><a href="logout.php" id="log" style="float:right">Logout</a></li>
    
   </ul>
        
          </div>
      </div><!-- end of header-->
      
      <div class="row" style="margin-top:50px;">
          <center><h3 style="text-decoration:overline;">Recently Expiring Enteries</h3></center>
        
          
                
                    
             
          </div>
          <form action="" method="post">
              <input type="submit" class="btn btn-info" name="aex" value="Expired Records">
              
          </form>
       
      <a href="#" id="test" onClick="javascript:fnExcelReport();" style="float:right" class="btn btn-info">Export in Excel</a>
      
      <div class="row" id="view">
          <table class=" table table-hover" id="e_item">
             <?php 
              if(empty($eviewdata))
                 {

        	 echo "<center><h1>No record found..!!</h></center>";
               }
             
    
               else{ 
                   ?>
                   
                   <tr style="background:grey;"> 
              <th>Item Code</th>
              <th>Item name</th>
              <th>Packing</th>
              <th>Manufacturer</th>
              <th>Batch</th>
             <th>Date</th>
             <th>Expire Date</th>
              <th>Quantity</th>
             <th>Rate</th>
              <th>Price/piece</th>
              <th>Total price</th>
              
             
              
              </tr>
                   
                   <?php
                   if(isset($_POST['aex'])){
                     
                       
                        foreach($expire as $v){
                ?>
                <tr>
                    <td><?php  echo $v->icode; ?></td>
                     <td><?php  echo $v->name; ?></td>
                         <td><?php  echo $v->packe; ?></td>
                         <td><?php  echo $v->mfr; ?></td>
                          <td><?php  echo $v->batch; ?></td>
                        <td><?php  echo $v->date; ?></td>
                         <td><?php  echo $v->edate; ?></td>
                       <td><?php  echo $v->quantity; ?></td>
                        <td><?php  echo $v->rate; ?></td>
                         <td><?php  echo $v->price; ?></td>
                          <td><?php 
                             $p=$v->rate;
                             $q=$v->quantity;
                             $tp=$p*$q;
                             echo $tp;
                             ?></td>
                              <?php $t=0;
                            $t=$tp+$t;  ?>
                       
                </tr>
                
                <?php
              }
                       
                   }
                 else{   
              foreach($eviewdata as $v){
                ?>
                <tr>
                    <td><?php  echo $v->icode; ?></td>
                     <td><?php  echo $v->name; ?></td>
                         <td><?php  echo $v->packe; ?></td>
                         <td><?php  echo $v->mfr; ?></td>
                          <td><?php  echo $v->batch; ?></td>
                        <td><?php  echo $v->date; ?></td>
                         <td><?php  echo $v->edate; ?></td>
                       <td><?php  echo $v->quantity; ?></td>
                        <td><?php  echo $v->rate; ?></td>
                         <td><?php  echo $v->price; ?></td>
                          <td><?php 
                             $p=$v->rate;
                             $q=$v->quantity;
                             $tp=$p*$q;
                             echo $tp;
                             ?></td>
                              <?php $t=0;
                            $t=$tp+$t;  ?>
                       
                </tr>
                
                <?php
              }
                   }
              
               }
    
              ?>
          </table>
      </div>
  </div>  <!-- end of container-->
</body>
</html>