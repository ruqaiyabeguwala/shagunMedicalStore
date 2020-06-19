<?php

include "model.php";
$obj_model = new model;

if(isset($_POST['addm'])){
    $a=$_POST['nm'];
    $b=$_POST['mg'];
    $c=$a." ".$b." mg";
    $data= array('fname'=>$c);
    $obj_model->insert($con,'med',$data);
}
$med= $obj_model->viewm($con,'med');
if(isset($_POST['submit']))
{
    
   $dt=date("Y-m-j  ");
    $q=$_POST['qty'];
    $data=array(
     'packe'=>$_POST['pack'],
        'mfr'=>$_POST['mf'],
         'name'=>$_POST['nm'],
         'batch'=>$_POST['bch'],
        'date'=>$dt,
        'edate'=>$_POST['dt'],
         'quantity'=>$q,
        'rate'=>$_POST['rt'],
         'price'=>$_POST['p']
       
        
        
    );
    $flag1=$obj_model->insert($con,'add_item',$data);
   $flag2= $obj_model->insert($con,'total_item',$data);
 
    
   
}
 $viewdata = $obj_model->view($con,'add_item');
$viewdatasold = $obj_model->view($con,'sold_item');
$tviewdata = $obj_model->view($con,'total_item');
$ed1=date("Y-m-j");
$ed2=date('Y-m-j', strtotime("+30 days"));

$eviewdata=$obj_model->esorte($con,'add_item',$ed1,$ed2);

if(isset($_POST['views'])){
    $data= array('name'=>$_POST['search']);
   $viewsearch= $obj_model->search($con,'add_item',$data);
}

if(isset($_POST['today'])){
     $view1 = $obj_model->viewOne($con,'add_item');
}

if(isset($_POST['todaysold'])){
     $view1sold = $obj_model->viewOne($con,'sold_item');
}
if(isset($_POST['ttoday'])){
     $tview1 = $obj_model->viewOne($con,'total_item');
}


 if(isset($_GET['sid']))
 {
    $s=$_GET['sid'];
    $where=array('icode'=>$s);
   $sell= $obj_model->search($con,'add_item',$where);

    
}
if(isset($_GET['eid']))
{
    $eid=$_GET['eid'];
    $where = array('icode'=>$eid);
    $obj_model->sell($con,'add_item',$where);
}

$total=$obj_model->sum($con,'add_item');
$total_sell=$obj_model->sum($con,'sold_item');


$count=$obj_model->count_entry($con,'add_item');
if(isset($_POST['s']))
{
    $from=$_POST['d1'];
    $to=$_POST['d2'];
    $s=$obj_model->sorte($con,'add_item',$from,$to);
    //$btwn_total($con,'add_item',$from,$to);
    
}
if(isset($_POST['ssold']))
{
    $from=$_POST['d1'];
    $to=$_POST['d2'];
    $ssold=$obj_model->sorte($con,'sold_item',$from,$to);
    //$btwn_total($con,'add_item',$from,$to);
    
}
if(isset($_POST['ts']))
{
    $from=$_POST['dt'];
    $to=$_POST['df'];
    $ts1=$obj_model->sorte($con,'total_item',$from,$to);
    //$btwn_total($con,'add_item',$from,$to);
    
}

if(isset($_GET['selid']))
   {
        $selid=$_GET['selid'];
    $where = array('icode'=>$selid);
     $sold=$obj_model->searchs($con,'add_item',$where);

if(isset($_POST['sold']))
{

$q=$_POST['qnty'];
    $p=$_POST['pr'];
  $dat= date("Y-m-j");

 $profitt= $obj_model->profit($con,'add_item',$q,$p,$where);
  $d = array(
      
    'icode'=>$_POST['code'],
    'name'=>$_POST['nam'],
      'mfr'=>$_POST['mfr'],
      'batch'=>$_POST['bch'],
      'packe'=>$_POST['pck'],
      'date'=>$dat,
      'edate'=>$_POST['dt'],
     'quantity'=>$_POST['qnty'],
     
     'price'=>$_POST['pr'], 
      'profit'=>$profitt,
    'pcode'=>$_POST['pcode']
      
    );
   $id= $obj_model->inserts($con,'sold_item',$d);
    
   $se= array('scode'=>$id);
  

      
  
   $r=$obj_model->pcodesearch($con,'sold_item',$se);
    $re= array('pcode'=>$r);
    $receipt=$obj_model->search($con,'sold_item',$re);
  
  
   
}

}

$pcode=$obj_model->pcodeget($con,'sold_item');
 


if(isset($_POST['s1']))
{
    $from=$_POST['d1'];
    $to=$_POST['d2'];
    $sortdata=$obj_model->sorte($con,'add_item',$from,$to);
    //$btwn_total($con,'add_item',$from,$to);
    
}
$total1=$obj_model->sum($con,'add_item');
if(isset($_GET['delid']))
{   
 
    
    $where= array('icode'=>$_GET['delid']);
    $obj_model->delete($con,'add_item',$where);
}

if(isset($_GET['editid']))
{

 $editid=$_GET['editid'];
  
 $where= array('icode'=>$editid); 

 $edit=$obj_model->search($con,'add_item',$where);

 if(isset($_POST['update_data']))
{

 $d = array(
    'icode'=>$_POST['code'],
    'name'=>$_POST['nam'],
     'packe'=>$_POST['pck'],
     'mfr'=>$_POST['mf'],
     'batch'=>$_POST['bch'],
     'date'=>$_POST['dt'],
     'edate'=>$_POST['edt'],
     'quantity'=>$_POST['qnty'],
     'price'=>$_POST['pr'],
     'rate'=>$_POST['rt'],
     
      
    );

  $obj_model->update($con,'add_item',$d,$where);
     
     $obj_model->update($con,'total_item',$d,$where);
  header("location:view.php");
}
}


if(isset($_GET['delid1']))
{
    $delid=$_GET['delid1'];
    $where= array('scode'=>$delid);
    $obj_model->deletes($con,'sold_item',$where);
}

if(isset($_GET['editid1']))
{

 $editid=$_GET['editid1'];
  
 $where= array('scode'=>$editid); 

 $edit1=$obj_model->search($con,'sold_item',$where);

 if(isset($_POST['update_data1']))
{

 $d = array(
    'icode'=>$_POST['code'],
    'name'=>$_POST['nam'],
     'date'=>$_POST['dt'],
     'edate'=>$_POST['edt'],
     'packe'=>$_POST['pck'],
     'mfr'=>$_POST['mf'],
     'batch'=>$_POST['bch'],
     'quantity'=>$_POST['qnty'],
    
     'price'=>$_POST['pr'],
     'profit'=>$_POST['pro']
      
    );

  $obj_model->update($con,'sold_item',$d,$where);
  header("location:view_sold.php");
}
}



if(isset($_POST['upload'])){
    
    $path="file/".$_FILES['file']['name']; //file/abc.jpg
   $tmp = $_FILES['file']['tmp_name'];

   $obj_model->uploadFile($tmp,$path);
     if(isset($_POST['submit']))
            {
                $d= array('receipt'=>$path);
                $obj_model->insert($con,'total_item',$d);
            }
}

if(isset($_POST['aex'])){
   $expire= $obj_model->allexpire($con,'add_item');
}
?>
