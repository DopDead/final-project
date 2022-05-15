<?php
require 'function.inc.php';
include 'chk_sess.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $sys_title ?></title><meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="e-commerce site well design with responsive view." />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="css/stylesheet.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<link href="owl-carousel/owl.carousel.css" type="text/css" rel="stylesheet" media="screen" />
<link href="owl-carousel/owl.transitions.css" type="text/css" rel="stylesheet" media="screen" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>   
 <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="stylenew.css">
<script src="javascript/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="javascript/jstree.min.js" type="text/javascript"></script>
<script src="javascript/template.js" type="text/javascript" ></script>
<script src="javascript/common.js" type="text/javascript"></script>
<script src="javascript/global.js" type="text/javascript"></script>
<script src="owl-carousel/owl.carousel.min.js" type="text/javascript"></script>

</head>
<body class="blog col-12">

<?php
include 'header.php'
?>


<div class="container">
  <ul class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i></a></li>
      <li>รายละเอียด </li>
    </ul>

   
        
         
               <h3 align="center">ประวัติการจอง</h3>
               <p align="center">&nbsp;</p>
<form id="frmcart" name="frmcart" method="post" action="?update=true"> 
           
              
              <table class="table table-hover" border="1" width="1444">
                <thead>
                    <tr >
               
                        <th width="136">หมายเลข</th>

                      <th width="169" class="text-center">ห้อง</th>
                      <th width="165" class="text-center">วันที่จอง</th>
       
                      <th width="151" class="text-center">วันที่ออก</th>
      
                  
                      <th width="124" class="text-center">ราคา</th>
                      <th width="127" class="text-center">จำนวนวัน</th>
                      <th width="160" class="text-center">ราคาทั้งหมด</th>
                      <th width="151"> </th>
                  </tr>
                </thead>
                <tbody>
 <?php
$query1 = "SELECT * FROM booking inner join display on display.display_id = booking.display_id WHERE id_member='$_SESSION[mid]'";
///print_r($query1);
///die();
 $result2 = mysqli_query($con,$query1);
while($row1 = $result2->fetch_array())
{
   ?>
                    <tr>
                        <td >NO.<?php echo $row1['display_id']; ?></td>
                        <td ><div align="center">
                          <?php 
        $sqlpro2 = "SELECT * FROM display WHERE display_id='$row1[display_id]' ";
          $resultpro2 = mysqli_query($con,$sqlpro2);
          $rspro2 = mysqli_fetch_array($resultpro2); 
          echo $rspro2['display_name']; 
    ?>
                        </div></td>
                        <td style="text-align: center"><?php 
        $sqlpro2 = "SELECT * FROM booking WHERE id_booking='$row1[id_booking]' ";
          $resultpro2 = mysqli_query($con,$sqlpro2);
          $rspro2 = mysqli_fetch_array($resultpro2); 
          echo $rspro2['date_booking']; 
    ?></td>
         



    <td style="text-align: center"><?php 
        $sqlpro2 = "SELECT * FROM booking WHERE id_booking='$row1[id_booking]' ";
          $resultpro2 = mysqli_query($con,$sqlpro2);
          $rspro2 = mysqli_fetch_array($resultpro2); 
          echo $rspro2['check_out']; 
    ?></td>
    


      <td ><strong>
        <?php echo $row1['display_fulltime_price'];

        ?>
      </strong></td>
      <td >
      <?php 
                $date = (strtotime($row1['check_out']) - strtotime($row1['date_booking']) )/  ( 60 * 60 * 24 );
                echo $date;
              ?></td>
      <td ><strong>
      
      
      
      <?php $total=$date*$row1['display_fulltime_price'] ;
			  
			  echo $total;
			  
			  
			  ?> </strong></td>
                  
                        <td><a href="preorder.php?id=<?php echo $row1['id_booking']; ?>"  class="btn btn-success">ดูใบบิล</a></button></a>
						
<a href="#" onClick="javascript:if (confirm('ยืนยันการลบข้อมูล')==true) {top.window.location='cancel_bill.php?id=<?php echo $row1['id_booking']; ?>';}" title="ลบ" class="btn btn-success"><i class="fa fa-trash"></i>ยกเลิก</a>                        </td>
                    </tr>  
      
                    <tr>
                       <?php
 } 
 ?>
                </tbody>           
            </table>
  </form>  
    

</div>



	<?php
include 'footter.php'
?>
	
</body>
</html>
