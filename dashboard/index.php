<?php
$title="Dashboard ";
include("../header_inner.php");
?>
       
        
        
        
        
        
        
        
        <style>
		.inner
		{
		text-align:center;
		font-family:DIN Medium,Arial, Helvetica, sans-serif;	
		}
		.headt
		{
					text-align:center;	
					font-family:DIN Medium,Arial, Helvetica, sans-serif;
		}
		.bg-secondary h3
		{
		font-size:1.2em; !important	
		font-family:DIN Medium,Arial, Helvetica, sans-serif;
		text-align:center;
		}
		
		.bg-warning h3
		{
		font-size:1.2em; !important	
		font-family:DIN Medium,Arial, Helvetica, sans-serif;
		text-align:center;
		}
		
		.bg-success h3
		{
		font-size:1.2em; !important	
		font-family:DIN Medium,Arial, Helvetica, sans-serif;
		text-align:center;
		}
		
		.bg-danger h3
		{
		font-size:1.2em; !important	
		font-family:DIN Medium,Arial, Helvetica, sans-serif;
		text-align:center;
		}
		.text-white
		{
		font-size:14px !important;	
		}
		</style>
        
        
        
        
        
        
        
        
        
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <?php
									if(!isset($title))
									$title="";
									?>
             
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                
                
                
                




















<?php

//include("../header.php");
include("../db/connectionI.php");
function countdb($table,$location,$field)
{
include("../db/connectionI.php");

 if($_SESSION['privilege']=="admin")
						{
							
			 $sql2 = "select count(*) as cc  from $table  ";				
						}
						else
						{
	  $sql2 = "select count(*) as cc  from $table WHERE branch='$_SESSION[bid]'  ";
						}
    $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));	
	$row2 =mysqli_fetch_array($result2);
	$cc=$row2['cc'];
	

//$cc=3456789;
$amount = moneyFormatIndia($cc);
	
	
	
	if(strlen($amount)>5)
	$amount=$amount;
	else
	$amount=" Count " . $amount;

	return $amount;
}
function countdb33($table,$location,$field)
{
include("../db/connectionI.php");

 if($_SESSION['privilege']=="admin")
						{
							
			 $sql2 = "select count(*) as cc  from $table  ";				
						}
						else
						{
	  $sql2 = "select count(*) as cc  from $table WHERE branch='$_SESSION[bid]' and  status!='Closed' and status!='Close With Success'  ";
						}
    $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));	
	$row2 =mysqli_fetch_array($result2);
	$cc=$row2['cc'];
	

//$cc=3456789;
$amount = moneyFormatIndia($cc);
	
	
	
	if(strlen($amount)>5)
	$amount=$amount;
	else
	$amount=" Count " . $amount;

	return $amount;
}


function countdb25($table,$location,$field)
{
include("../db/connection.php");

 if($_SESSION['privilege']=="admin")
						{
							
			 $sql2 = "select count(*) as cc  from $table  ";				
						}
						else
						{
	  $sql2 = "select count(*) as cc  from $table  ";
						}
    $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));	
	$row2 =mysqli_fetch_array($result2);
	$cc=$row2['cc'];
	

//$cc=3456789;
$amount = moneyFormatIndia($cc);
	
	
	
	if(strlen($amount)>5)
	$amount=$amount;
	else
	$amount=" Count " . $amount;

	return $amount;
}



function countdb2($table,$location,$field)
{
include("../db/connection.php");
$date=date("Y-m-d");

if($_SESSION['privilege']=="admin")
						{
							
			$sql2 = "select count(*) as cc  from $table where $field='$date'";			
						}
						else
						{
	  $sql2 = "select count(*) as cc  from $table where  $field='$date'";
	  
						}
    $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));	
	$row2 =mysqli_fetch_array($result2);
	$cc=$row2['cc'];



$amount = moneyFormatIndia($cc);
	
	
	
	if(strlen($amount)>5)
	$amount=$amount;
	else
	$amount="  " . $amount;

	return $amount;
}







function moneyFormatIndia($num) {
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}












function num2text($cc)
{
	
	
   $number = round($cc);
   $no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
	return $result;	
	
	
}


	
					 if($_SESSION['type']=="admin")
						{
							

?>

	<div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="inner bg-primary text-center">
                              <a class="small-box-footer" title="Branches" href="../registartion/select.php">  
             
                                   
                                <h3 class="text-white">View <br>User</h3>
                           <p><?php
            
			//echo countdb33("registartion",$_SESSION['location'],'location');
		
			?></p>
                                </a>
                            </div>
                        </div>
			</div>  



                
          <?php
						}
		
										if($_SESSION['type']=="owner" || $_SESSION['type']=="admin")
										{
									?>
    
<div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="inner bg-success text-center">
                              <a class="small-box-footer" title="Branches" href="../private/select.php">  
             
                                   
                                <h3 class="text-white">Text <br>Upload</h3>
                           <p><?php
            
			//echo countdb33("uploads",$_SESSION['location'],'location');
		
			?></p>
                                </a>
                            </div>
                        </div>
			</div>

      
		<div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="inner bg-danger text-center">
                              <a class="small-box-footer" title="Branches" href="../private/Dec.php">  
             
                                   
                                <h3 class="text-white">Decrypt <br> Text File</h3>
                           <p><?php
            
			//echo countdb33("uploads",$_SESSION['location'],'location');
		
			?></p>
                                </a>
                            </div>
                        </div>
			</div>


<div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="inner bg-success text-center">
                              <a class="small-box-footer" title="Branches" href="../image/select.php">  
             
                                   
                                <h3 class="text-white">Image <br>Upload</h3>
                           <p><?php
            
			//echo countdb33("uploads",$_SESSION['location'],'location');
		
			?></p>
                                </a>
                            </div>
                        </div>
			</div>


<div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="inner bg-danger text-center">
                              <a class="small-box-footer" title="Branches" href="../image/Dec.php">  
             
                                   
                                <h3 class="text-white">Decrypt <br>Image</h3>
                           <p><?php
            
			//echo countdb33("uploads",$_SESSION['location'],'location');
		
			?></p>
                                </a>
                            </div>
                        </div>
			</div>

						<?php
										}
										?>

                    
                    
                    
                    
                  
                    
                    
                    
                    
                    
                    
                    
                    
                
                    
                  
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
         
                               
                                <div class="row" style="background:#F5F5F5;">
                                    <!-- column -->
                                    
                                                
                                                
                                    
                                    
                                    
                                       <?php
		   include("reminder.php");
		   
		   ?>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                             
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           <script src="../assets/libs/jquery/dist/jquery.min.js"></script> 
          <?php
		  
		 include("../footer_inner.php");
		  ?>