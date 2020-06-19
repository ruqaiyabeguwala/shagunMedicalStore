<?php
include "control.php";
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
      <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
</head>
<body>
     <div class="container-fluid">
    <div class="row" id="title">
    <div class="col-sm-12" id="">
    <h1>
   <span class=" glyphicon glyphicon-heart"></span>
    Shagun Medical Store
    <span class=" glyphicon glyphicon-heart"></span>
    </h1>
    </div>
    
    
   
    </div><!-- end of title-->
    <?php
if(isset($_POST['login'])){
    $name=$_POST['nm'];;
    $pass=$_POST['ps'];
    if($name=='shagun' && $pass=='sarrah'){
         echo "<center><img src='img/ellipsis.gif' width='100px' ></center>";
        header('refresh:2;url=index1.php');
          session_start();
        $_SESSION['user']='shagun';
         $_SESSION['ps']='sarrah';
        $_SESSION['count']=$pcode+1;
       
      
        
    }
    else{
        echo "<center><h3>Wrong username or password..!!</h3></center>";
    }
}

?>
   <div class="container" >
       <div class="row">
           <div class="col-sm-5 col-sm-offset-4" id="login">
              
             
               <form action="" method="post">
                   <table>
                       <tr>
                           <td>Username:  </td>
                           <td><input type="text" name="nm"></td>
                       </tr>
                       <tr>
                           <td>Password: </td>
                           <td><input type="password" name="ps"></td>
                       </tr>
                       <tr>
                           <td><input type="submit"  name="login" value="login"></td>
                           
                       </tr>
                   </table>
               </form>
           </div><!-- end of login-->
       </div>
   </div>
  
    </div><!-- end of conatiner-->
     <h4 style="color:grey;float:right">DESIGNED AND DEVELOPED BY RUQAIYA BEGUWALA &copy; 2017</h4>
</body>
</html>