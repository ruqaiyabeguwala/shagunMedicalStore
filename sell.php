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
      <link rel="stylesheet" href="css/custom.css">
      <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
</head>
<body>
   <div class="container-fluid">
       <div class="row" id="header">
          <div class="col-sm-12">
               <ul class="nav nav-tabs navbar-fixed-top nav navbar-inverse" style="background:grey;">
       <li><a href="index1.php">Home</a></li>
       <li><a href="add.php">Add</a></li>
       <li class="active"><a href="sell.php">Sell</a></li> 
       <li ><a href="view.php">View</a></li>
       <li class="nav navbar-right"><a href="logout.php" id="log">Logout</a></li>
   </ul>
          </div>
      </div><!-- end of header-->
      <div class="row" style="margin-top:50px">
     <center>  <div  id="sell-search" class="col-sm-8">
       
         
       
             <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for medicine" class="form-control"> 

<ul id="myUL" >
  
  <?php
    foreach(@$viewdata as $s){
        ?>
        <li style="display:none;position:relative;"  ><a href="sell.php?sid=<?php echo $s->icode; ?>"><?php echo $s->name;  echo "\t (expire:",$s->edate ,")"; ?>     </a></li>
        <?php
    }
    
    
    ?>
</ul>
          
          
           
      
      </div><!-- end of sell-->
       
       
      <div class="row" id="sell">
          <div class="col-sm-offset-2 col-sm-9">
              <table class="table table-hover">
                 
                  <?php
                   if(empty($sell))
                    {

        	            echo "<h2>No record found...!!</h2>";
                     }
                  else{
                      ?>
                       <tr>
                      <th> Code</th>
                      <th>Medicine name</th>
                      <th>Packing</th>
                      <th>Manufacturer</th>
                      <th>Batch</th>
                      <th>Date</th>
                      <th>Expire Date</th>
                      <th>Quantity</th>
                     
                      <th>Price</th>
                      <th>Rate</th>
                      <th>Action</th>
                  </tr>
                      
                      
                      <?php
                  foreach(@$sell as $s)
                  {?>
                  <tr>
                      <td><?php  echo $s->icode; ?></td>
                     <td><?php  echo $s->name; ?></td>
                      <td><?php  echo $s->packe; ?></td>
                       <td><?php  echo $s->mfr; ?></td>
                        <td><?php  echo $s->batch; ?></td>
                      <td><?php  echo $s->date; ?></td>
                      <td><?php  echo $s->edate; ?></td>
                      
                       <td><?php  echo $s->quantity; ?></td>
                        
                         <td><?php  echo $s->price; ?></td>
                          <td><?php  echo $s->rate; ?></td>
                         <td><a href="sold.php?selid=<?php echo $s->icode; ?>">   Sell</a></td>
                  </tr>
                  
                  <?php    
                  }
                  }
                  ?>
              </table>
          </div>
      </div>  
      
      </div> <!-- end of contanier-->
     
    
   
<script>
    
function myFunction() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
    
    
</script>
<script>
    $('document').ready(function(){
   $('#myInput').focusin(function(){
         $('#myUL').css('display','block');
     });
      
        
    });
    
    </script>
</body>
</html>