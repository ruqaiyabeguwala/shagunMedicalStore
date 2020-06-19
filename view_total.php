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
      <script type="application/javascript" src="js/export_total_item.js"></script>
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
  
   
 


  
       <li class="navbar-right"><a href="logout.php" id="log" style="float:right">Logout</a></li>
    
   </ul>
        
          </div>
      </div><!-- end of header-->
    
      <div class="row" style="margin-top:50px;">
        
       <center><h3 style="text-decoration:overline;">Total Enteries</h3></center>
          
             <form action=""  method="post" class="form-inline">
                <div class=" col-sm-offset-5 col-sm-7  ">
                 <h5><b>From:</b>
              <input type="date" class="form-control" name="dt" required>
             <b>To:</b>
                <input type="date" class="form-control" name="df" required>
                 
                 <input type="submit" class="btn btn-info" name="ts"  value="Search"></h5>
                 
                 </div>
                  </form>
                
                    
             
          </div>
         <form method="post"> 
      <input type="submit" name="ttoday" value="See Today's enteries">
      </form>
       <a href="#" id="test" onClick="javascript:fnExcelReport();" style="float:right">Export in Excel</a>
      <div class="row" id="view">
          <table class=" table table-hover" id="total_item">
            <?php 
              if(empty($tviewdata))
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
             
             
              </tr>
              <?php
             
              
             
            if(isset($_POST['ts']))
              {
                 if(empty($ts1))
                 {

        	 echo "<center><h1>No record found..!!</h></center>";
               }
                else
                {
                  foreach(@$ts1 as $u)
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
                             
                       
                </tr>
                
                <?php
                  }
              }
            }
        else if(isset($_POST['ttoday']))
              {
                 if(empty($tview1))
                 {

        	 echo "<center><h1>No record found..!!</h></center>";
               }
                else
                {
                  foreach(@$tview1 as $u)
                  {
                ?>
                <tr >
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
                     
                </tr>
                
                <?php
                  }
              }
            }
        
                else 
              {
                  
              foreach($tviewdata as $u){
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