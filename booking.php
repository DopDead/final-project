<?php
include 'function.inc.php';
//include 'chk_sess.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo$sys_title;?></title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
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
<body>
<?php
include 'header.php'
?>

<div class="container">
  <div class="mainbanner">
  <div id="main-banner" class="owl-carousel home-slider">

    <div class="item"> <a href="#"><img src="image/banners/b80fb54cc34640c633b003422d08e1f1.jpg" width="1108" height="305"/></a> </div>
   
  </div>
</div>
</div>




   <div class="container">
  <div>
 
    <div class="cms_banner ">    
	<h2><center> <h3 class="productblock-title">
    เลือกคอร์ส</h2>
</center>
 <?php 
         
               $sql = "SELECT * FROM display";
 $result = mysqli_query($con,$sql);
    while($row = $result->fetch_assoc()) {
        
     ?>
      <div class="col-md-4 cms-banner-center"> 
	    <div align="center">
	      <p><a href="#"><img src="image/Tentrental/<?php echo $row['display_img']; ?>" style="width:350px; height:350px;"></a><br>
	        <?php echo $row["display_name"]; ?></p>
			 <?php echo $row["display_fulltime_price"]; ?>฿	   </p>
	      <p>     
	        <input name="id" type="hidden" id="id" value="<?php echo $row["display_id"]; ?>" />
	        <a href="booking_detail.php?id=<?php echo $row["display_id"]; ?>" class="btn btn-large btn-primary">กดจอง</a><br>
	        <br> 
            </p>
	    </div>
</div>
<?php
}

?>
   


    <?php
include 'footter.php'
?>


</body>
</html>
