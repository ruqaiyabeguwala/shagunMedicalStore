<?php
include "config.php";
$obj= new connection;
$con=$obj->connect();
    
class model{
 
    function insert($con,$table,$data)
    {      $flag=0;
        $key=implode(",",array_keys($data));
        $value=implode("','",array_values($data));
        $qry="insert into $table($key) values('$value')";
        $ex=$con->query($qry);
       if($ex>0){
           $flag=1;
       }
     return $flag;
    }
    
    function inserts($con,$table,$data)
    {
        $key=implode(",",array_keys($data));
        $value=implode("','",array_values($data));
        $qry="insert into $table($key) values('$value')";
        $ex=$con->query($qry);
      
        $last_id = $con->insert_id;
     

        return $last_id;
    }
  
     function view($con,$table){
     $icode='icode';
         $date='date';
    $qry="select * from $table ";
        $ex=$con->query($qry);
        while($rs=$ex->fetch_object()){
            if($rs->quantity >0){
            $res[]=$rs;
            }
        }
        return @$res; 
    }
    
     function viewm($con,$table){
   
    $qry="select * from $table ";
        $ex=$con->query($qry);
        while($rs=$ex->fetch_object()){
          
            $res[]=$rs;
          
        }
        return @$res; 
    }
    function viewOne($con,$table){
        $dat= 'date';
        $val= date("Y-m-j");
    $qry="select * from $table where $dat='$val'";
        $ex=$con->query($qry);
        while($rs=$ex->fetch_object()){
            if($rs->quantity >0){
            $res[]=$rs;
            }
        }
        return @$res; 
    }
    
    
    function search($con,$table,$where)
    {   $key=implode(",",array_keys($where));
     $value=implode(",",array_values($where));
        $qry="select * from $table where $key='$value' ";
     $ex=$con->query($qry);
     while($r=$ex->fetch_object() ){
     
           $res[]=$r;
        }
      
       return @$res;
     
    
    }
   
     function searchs($con,$table,$where)
    {   $key=implode(",",array_keys($where));
     $value=implode(",",array_values($where));
     $d='edate';
        $qry="select * from $table where $key='$value' ORDER BY $d";
     $ex=$con->query($qry);
     while($r=$ex->fetch_object() ){
     
           $res[]=$r;
        }
      
       return @$res;
     
    
    }
    function pcodesearch($con,$table,$where)
    {   $key=implode(",",array_keys($where));
     $value=implode(",",array_values($where));
    
        $qry="select * from $table where $key='$value' ";
     $ex=$con->query($qry);
     while($r=$ex->fetch_object() ){
      
           $res=$r->pcode;
        
        } 
       return @$res;
     
    }
    
   function sum($con,$table){
       
        $qry="select quantity,price  from $table";
      $ex= $con->query($qry);
       $f=0;
       while($r=$ex->fetch_object()){
           $p=$r->price*$r->quantity;
          $f=$f+$p;
          
        }
        return $f;
    }
    function count_entry($con,$table)
    {   // $key=implode(",",array_keys($where));
   //  $value=implode(",",array_values($where));
        $qry="select * from $table ";
        $ex=$con->query($qry);
        $f=0;
        while($r=$ex->fetch_object()){
         $f=$f+1;  
          
        } 
        
        
        return $f;
    }
    function sorte($con,$table,$from,$to)
    {    $f=$from- strtotime("+1 day");
        $date='date';
        $qry="select * from $table where $date BETWEEN '$from' AND '$to'";
        $ex=$con->query($qry);
        while($r=$ex->fetch_object()){
            $res[]=$r;
        }
        return @$res;
    }
    function esorte($con,$table,$from,$to)
    {    
        $date='edate';
        $qry="select * from $table where $date BETWEEN '$from' AND '$to' ORDER BY $date ";
        $ex=$con->query($qry);
        while($r=$ex->fetch_object()){
            $res[]=$r;
        }
        return @$res;
    }
    
   function profit($con,$table,$quantity,$price,$where){
       
        $key=implode(",",array_keys($where));
     $value=implode(",",array_values($where));
         $qry="select * from $table where $key='$value' ";
     $ex=$con->query($qry);
     while($r=$ex->fetch_object() ){
        
        $q=($r->quantity)-($quantity);
         $profit=($price)- ($r->rate);
        }
       $qu='quantity';
       $profitt=$profit*$quantity;
      // $profitt=$profit*$q;
        $qry1="update $table set $qu='$q' where  $key='$value' ";
       $ex1= $con->query($qry1);
       if($q<=0){
           $qr2="delete from $table where $qu='$q'";

      $ex=$con->query($qr2);

       }
      
          
      
       return $profitt;
   }
   
    
    function delete($cn,$table,$where)
   {
      $key=implode(",",array_keys($where));  //array(key)
      $value=implode("','",array_values($where));//array(value)

      $qry="delete from $table where $key='$value'";

      $ex=$cn->query($qry);
  if($ex>0){
      header("location:view.php");
  }
     
   }
      function deletes($cn,$table,$where)
   {
      $key=implode(",",array_keys($where));  //array(key)
      $value=implode("','",array_values($where));//array(value)

      $qry="delete from $table where $key='$value'";

      $ex=$cn->query($qry);
  if($ex>0){
      header("location:view_sold.php");
  }
     
   }
    function update($con,$table,$data,$where)
   {

    $k=array_keys($data);
    $v=array_values($data);
    //update table_name set key=value, key=value where key=value
      
     $up="update $table set";
     $size=count($data);

     $i=0;
     foreach($data as $d)
     {
           if($size==$i+1)
           {
               $up .=" ".$k[$i]."='".$v[$i]."'";
               $i++;

           }
           else
           {
               $up .=" ".$k[$i]."='".$v[$i]."',";
               $i++;
           }

     }
      
     $up .=" where 1=1 "; 
     $wk=array_keys($where);
     $wv=array_values($where);
      
     $j=0;

     foreach ($where as $w) {
       
       $up .=" && ".$wk[$j]."='".$wv[$j]."'";
       $j++;
     }
   $ex=$con->query($up);
    
 

   }
    
    
     function uploadFile($tmp,$destination)
   {

     $u=move_uploaded_file($tmp, $destination);
        
   }
      function getpcode($con,$table){
          $last= $con->insert_id;
      }

    
    function pcodeget($con,$table){
        $scode='scode';
        
        $qry = "Select * from $table ORDER BY $scode DESC
LIMIT 1";
$ex = $con->query($qry);
while( $res=$ex->fetch_object()){
    $r=$res->pcode;
}
return @$r;
    }
    
    function allexpire($con,$table){
        $qry= "select * from $table ";
        $ex = $con->query($qry);
        while( $res=$ex->fetch_object()){
         $today = date("Y-m-d");
$expire = $res->edate; //from db

$today_time = strtotime($today);
$expire_time = strtotime($expire);

if ($expire_time < $today_time){
    $rs[]=$res;
    
}
}
        return @$rs;
    }
    
    
}


?>