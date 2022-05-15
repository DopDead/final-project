<?php include 'function.inc.php';




$id = $_GET["id"];
          $sqlw = "SELECT * FROM  information where  information_id= '$id' ";
       
          $result2 = mysqli_query($con,$sqlw);

          $rs1 = mysqli_fetch_array($result2);



          $information_id=$rs1["information_id"];
    $information_title=$rs1["information_title"];
    $information_detail=$rs1["information_detail"];
    $information_date=$rs1["information_date"];



 

?>



<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $sys_title;?></title><meta http-equiv="content-type" content="text/html;charset=utf-8" />
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
<script src="javascript/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="javascript/jstree.min.js"></script>
<script type="text/javascript" src="javascript/template.js"></script>
<script src="javascript/common.js" type="text/javascript"></script>
<script src="javascript/global.js" type="text/javascript"></script>
<script src="owl-carousel/owl.carousel.min.js" type="text/javascript"></script>



</head>
<body class="blog col-2">

<?php
include 'header.php'
?>


<div class="container">
  <ul class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i></a></li>
      <li><a href="about.php">รายละเอียด</a></li>
    </ul>
<div class="row">


 <?php
$query1 = "SELECT * FROM  information where  information_id= '$id'";
 $result1 = mysqli_query($con,$query1);
while($row2 = $result1->fetch_array())
{
          $information_id=$row2["information_id"];
    $information_title=$row2["information_title"];
    $information_detail=$row2["information_detail"];
    $information_date=$row2["information_date"];


    ?>
<table width="365" height="328" border="1" align="center">
  <tr>
    <td width="355" height="77"><?php echo $row2['information_title']; ?>&nbsp;</td>
  </tr>
  <tr>
    <td height="103"><img src="image/information_images/<?php echo $row2['information_img']; ?>" alt="" /></td>
   
  </tr>
  <tr>
    <td height="82"><?php echo $row2['information_detail']; ?>.&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $row2['information_date']; ?>&nbsp;</td>
  </tr>
</table>

<?php  } ?>
<p>&nbsp;</p>
<p>
  <?php
include 'footter.php'
?>
</p>
</body>
</html>
