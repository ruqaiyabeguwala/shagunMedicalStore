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
      <script type="application/javascript" src="js/export_sell_item.js"></script>
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
  <li class="dropbtn">View</li>
  <div class="dropdown-content" style="font-size:14px">
    <a href="view_total.php" >View total data</a>
    <a href="view.php">View main data</a>
    <a href="view_sold.php">View sold data</a>
     <a href="view_expire.php">View expiring data</a>
  </div>
</div>
   
  
   
 <?php
$t=0;
?>
  
       <li class="navbar-right"><a href="logout.php" id="log" style="float:right">Logout</a></li>
    
   </ul>
        
          </div>
      </div><!-- end of header-->
     
      <div class="row" style="margin-top:50px;">
         <center><h3 style="text-decoration:overline;">Sold Enteries</h3></center>
         <div class="col-sm-3">
        
          <h4><b>Total cost:<?php 
             
              if(isset($_POST['ssold'])){
                 if(empty($ssold))
                     $t=0;
                      else{
                  foreach(@$ssold as $u){
                       
                        $p=$u->price;
                             $q=$u->quantity;
                             $tp=$p*$q;                           
                            $t=$tp+$t;
                  }
                  }
                 
                  echo $t;
              }
              else  if(isset($_POST['todaysold'])){
                  if(empty($view1sold))
                     $t=0;
                  else{
                  foreach(@$view1sold as $u){
                        $p=$u->price;
                             $q=$u->quantity;
                             $tp=$p*$q;                           
                            $t=$tp+$t;
                  }
                  }
                   
                  echo $t;
              }
              else {
                  if(empty($viewdatasold))
                     $t=0;
                  else{
                  foreach(@$viewdatasold as $u){
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
                 
                 <button type="submit" class="btn btn-info" name="ssold">Search</button></h5>
                 
                 </div>
                  </form>
                
                    
             
          </div>
         <form method="post"> 
      <input type="submit" name="todaysold" value="See Today's enteries">
      </form>
       <a href="#" id="test" onClick="javascript:fnExcelReport();" style="float:right">Export in Excel</a>
      <div class="row" id="view">
          <table class=" table table-hover" id="sell_item">
             <?php 
              if(empty(@$viewdatasold || $view1sold || $ssold))
                 {

        	 echo "<center><h1>No record found..!!</h></center>";
               }
              
    else{
                  
             ?>
             <tr style="background:grey;"> 
              <th>Item Code</th>
              <th>Medicine name</th>
              <th>Packing</th>
              <th>Manufacturer</th>
              <th>Batch</th>
             <th>Date</th>
             <th>Expire Date</th>
              <th>Quantity</th>
              
              <th>M.R.P.</th>
              <th>Total price</th>
              <th>Profit</th>
             
              <th>Action</th>
              </tr>
              <?php
             
              
             
            if(isset($_POST['ssold']))
              {
                 if(empty($ssold))
                 {

        	 echo "<center><h1>No record found..!!</h></center>";
               }
                else
                {
                  foreach(@$ssold as $u)
                  {
                ?>
                <tr>
                    <td><?php  echo $u->icode; ?></td>
                     <td><?php  echo $u->name; ?></td>
                         <td><?php  echo $u->packe; ?></td>
                          <td><?php  echo $u->mfr; ?></td>
                           <td><?php  echo $u->batch; ?></td>
                         <td><?php  echo $u->date; ?></td>
                          <td><?php  echo $u->edate; ?></td>
                       <td><?php  echo $u->quantity; ?></td>
                        
                         <td><?php  echo $u->price; ?></td>
                          <td><?php 
                             $p=$u->price;
                             $q=$u->quantity;
                             $tp=$p*$q;
                             echo $tp;
                             ?></td>
                              <?php $t=0;
                            $t=$tp+$t;   ?> 
                           <td><?php  echo $u->profit; ?></td>
                          
                         <td>
                        
                         <a href="edits.php?editid1=<?php echo $u->scode; ?>">Edit</a>
                          
                          <a href="control.php?delid1=<?php echo $u->scode; ?>" onclick="return confirm('Delete this record?')">Delete</a></td>
                </tr>
                
                <?php
                  }
              }
            }
        else if(isset($_POST['todaysold']))
              {
                 if(empty($view1sold))
                 {

        	 echo "<center><h1>No record found..!!</h></center>";
               }
                else
                {
                  foreach(@$view1sold as $u)
                  {
                ?>
                <tr>
                    <td><?php  echo $u->icode; ?></td>
                     <td><?php  echo $u->name; ?></td>
                       <td><?php  echo $u->packe; ?></td>
                          <td><?php  echo $u->mfr; ?></td>
                           <td><?php  echo $u->batch; ?></td>
                       <td><?php  echo $u->date; ?></td>
                        <td><?php  echo $u->edate; ?></td> 
                       <td><?php  echo $u->quantity; ?></td>
                      
                         <td><?php  echo $u->price; ?></td>
                          <td><?php 
                             $p=$u->price;
                             $q=$u->quantity;
                             $tp=$p*$q;
                             echo $tp;
                             ?></td>
                              <?php $t=0;
                             ?>
                           <td><?php  echo $u->profit; ?></td>
                          
                         
                         <td>
                       
                         <a href="edits.php?editid1=<?php echo $u->scode; ?>">Edit</a>
                          
                          <a href="control.php?delid1=<?php echo $u->scode; ?>" onclick="return confirm('Delete this record?')">Delete</a></td>
                </tr>
                
                <?php
                  }
              }
            }
        
                else 
              {
                  
              foreach(@$viewdatasold as $v){
                ?>
                <tr>
                    <td><?php  echo $v->icode; ?></td>
                     <td><?php  echo $v->name; ?></td>
                        <td><?php  echo $u->packe; ?></td>
                          <td><?php  echo $u->mfr; ?></td>
                           <td><?php  echo $u->batch; ?></td>
                        <td><?php  echo $v->date; ?></td>
                         <td><?php  echo $u->edate; ?></td>
                       <td><?php  echo $v->quantity; ?></td>
                       
                         <td><?php  echo $v->price; ?></td>
                         <td><?php 
                             $p=$v->price;
                             $q=$v->quantity;
                             $tp=$p*$q;
                             echo $tp;
                             ?></td>
                              <?php $t=0;
                            $t=$tp+$t;   ?>
                          <td><?php  echo $v->profit; ?></td>
                          
                     <td>
                         <a href="edits.php?editid1=<?php echo $v->scode; ?>">Edit</a><a href="control.php?delid1=<?php echo $v->scode; ?>" onclick="return confirm('Delete this record?')">  Delete</a></td>
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