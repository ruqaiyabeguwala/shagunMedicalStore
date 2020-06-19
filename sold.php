
<?php  include "control.php";
session_start(); 

if(!isset($_SESSION['user']))
{
  header('location:logout.php');
}
if(empty($_SESSION['count'])){

    $_SESSION['count'] = $pcode+1; 
}
 
if(isset($_POST['print'])){
  $_SESSION['count']++;
   header("location:view_sold.php");
    
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
      <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container-fluid">
        <div class="no-print">
         <div class="row " id="header" >
          <div class="col-sm-12">
               <ul class="nav nav-tabs nav navbar-inverse navbar-fixed-top" style="background:grey;">
       <li><a href="index1.php">Home</a></li>
       <li ><a href="add.php">Add</a></li>
       <li class="active"><a href="sell.php">Sell</a></li> 
       <li><a href="view.php">View</a></li>
       <li class="nav navbar-right"><a href="logout.php" id="log">Logout</a></li>
     
   </ul>
        
          </div>
      </div><!-- end of header-->
      
        <div class="row " >
           
           <div class="col-sm-5 col-sm-offset-4 no-print" id="form" style="margin-top:70px;" >
            <?php foreach(@$sold as $u)
            {
        ?>
             <form action="" method="post" class="" id="myform">
              
               <div class="form-group " style="display:none;">
                    <label for="" class="control-label ">Item code:</label>
                     <input type="text" class=" form-control " name="code" value="<?php echo $u->icode; ?>" readonly>
                 </div>
           <div class="form-group " style="display:none;">
                    <label for="" class="control-label ">eXpire:</label>
                     <input type="text" class=" form-control " name="dt" value="<?php echo $u->edate; ?>" readonly>
                 </div>
          
                 <div class="form-group ">
                    <label for="" class="control-label ">Medicine name:</label>
                     <input type="text" class=" form-control " name="nam" value="<?php echo $u->name; ?>" readonly>
                 
                 </div> 
                
                <div class="form-group " style="display:none;">
                    <label for="" class="control-label ">Pack:</label>
                     <input type="text" class=" form-control " name="pck" value="<?php echo $u->packe; ?>" readonly>
                 </div>
                 <div class="form-group " style="display:none;">
                    <label for="" class="control-label ">Mfr:</label>
                     <input type="text" class=" form-control " name="mfr" value="<?php echo $u->mfr; ?>" readonly>
                 </div>
                 <div class="form-group " style="display:none;">
                    <label for="" class="control-label ">batch:</label>
                     <input type="text" class=" form-control " name="bch" value="<?php echo $u->batch; ?>" readonly>
                 </div>
                 <div class="form-group">
                    <label for="" class="control-label">Quantity:</label>
                     <input type="text"  class=" form-control" name="qnty">
                     <div class="help-block" style="color:grey;" data->Donot enter Quantity more than <?php echo $u->quantity; ?></div>
                 </div>
                 
                 <div class="form-group">
                    <label for="" class="control-label">M.R.P.:</label>
                     <input type="text" class=" form-control" name="pr" required value="<?php echo $u->price;  ?>">
                     <div class="help-block">You bought the medicine at Rs.<?php echo $u->rate; ?></div>
                 </div>
               
                  <div class="form-group" style="display:none;" >
                    <label for="" class="control-label">Pcode:</label>
                     <input type="text" class=" form-control" name="pcode" value="<?php echo $_SESSION['count']; ?> ">
                     
                 </div>
                
                 <div class="form-group">
                     <button type="submit" class="btn btn-default" name="sold"   data-toggle="modal" data-target="#myModal">Sell Now!!</button>
                 </div>
                
                
                
                 
            </form>
           
             <?php
            }
               
               ?>
             
           </div>
        
         

  </div>
  
<div class="no-print modal fade " id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             
                <h4 class="modal-title" id="myModalLabel" style="color:grey;">Your item has been sold successfully</h4>
            </div>
            <div class="modal-body">
             <center>  <button class="btn btn-info no-print" onclick="window.print()" >Print </button>
               <a href="view.php" class="btn btn-info no-print">Add more to receipt</a>
                 <form action="" method="post">
                   
                    <button class="btn btn-info no-print" name="print" id="p" >Done</button>
               </form> 
                </center>            
            </div>    
        </div>
    </div>
</div>
  <!-- Trigger the modal with a button -->
</div>
            <div class="col-sm-6" style="min-height:150px;padding:10px;margin-top:70px;margin-left:10px;" id="receipt">
                
                 <center>
       <h1>  Shagun Medical Store</h1>
       <h3>Bhatpura Darwaza Bahar, Pratapgarh (Raj) Pin:312605</h3>
       <h4>TIN:08681203318</h4>
       <hr>
      <?php $t=0;  ?>
       <table width="100%" class="table-bordered">
          <th>S.No.</th>
           <th>Medicine</th>
           <th>Quantity</th>
           <th>Price</th>
           <?php
          
         $total=0;
        
         if(isset($_POST['sold'])){
             echo "<script>$('#myModal').modal('show')</script>";
            foreach(@$receipt as $s){
                if(!empty($s))
                {
                $t++;
                ?>
                <tr>
                   <td><?php echo $t;  ?></td>
                    <td><?php echo $s->name; ?></td>
                   <td><?php echo $s->quantity; ?></td>
                   
                   <td><?php
                    $p=($s->quantity)*($s->price);
                    
                    echo $p;  ?></td>
                </tr>
               
                
                <?php
                     $total=$total+($p);
                }
            }
         
           }
           ?>
       </table>
       <h5 style="float:right;"><?php echo "Total: Rs.", $total; ?></h5>
   </center>
                
            </div><!--- end of receipt-->
                

          
        </div>
       
      
          
        
        
    </div><!-- end of container-fluid-->
    
 
    
</body>
</html>
<?php //onclick="frames['frame1'].print()" ?>