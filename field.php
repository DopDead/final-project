<?php
include 'function.inc.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>ห้องสัมมนา YOKMANEE.COM</title>
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
    <div class="item"> <a href="#"><img src="image/banners/NovotelBangkokImpact_BC_02-1500x400.jpg" alt="main-banner1" class="img-responsive" /></a> </div>
    <div class="item"> <a href="#"><img src="image/banners/DSC_5321.jpg" alt="main-banner2" class="img-responsive" /></a> </div>
    <div class="item"> <a href="#"><img src="image/banners/DSC_5338-retouch.jpg" alt="main-banner3" class="img-responsive" /></a> </div>
  </div>
</div>
</div>

   <div class="container">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae provident minus similique porro assumenda illo dolore ducimus vero ipsum illum ipsa velit, deleniti accusantium repellat facilis tempora ab consectetur! Sequi.
  <div class="mainbanner">
  <h2><center> <h3 class="productblock-title">กิจกรรมต่างๆ</h2></center>
   <div id="brand_carouse" class="owl-carousel brand-logo">

    <?php for($i=0;$i<6;$i++){ ?>
        <div class="item text-center"> <a href="image/boxslide/DSC_4491.jpg" data-fancybox="gallery"><img src="image/boxslide/DSC_4491.jpg" alt="Disney" class="img-responsive" style="width:230px; height:200px;"/></a> </div>



      
<?php
  }?>

      </div>


      
    <div class="cms_banner ">    
	<h2><center> <h3 class="productblock-title">ข่าวสาร</h2></center>
	<?php for($i=0;$i<6;$i++){ ?>
      <div class="col-md-4 cms-banner-left"> 
	  <a href="#"><img alt="#" src="image/banners/Hen-room_170215_0006-512x384.jpg" style="width:380px; height:380px;"></a><br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae provident minus similique porro assumenda illo dolore ducimus.<br><br>

	  <center><a href="detail.php" class="btn btn-large btn-primary">กดดูรายละเอียด</a></center><br>
<br> </div>
     <?php
	}?>

    </div>
  </div>

  <div class="row">
    <div id="content" class="col-sm-12">
      <div class="customtab">
        <div id="tabs" class="customtab-wrapper">
          <ul class='customtab-inner'>
            <li class='tab'><a href="#tab-latest">Latest Product</a></li>
           
          </ul>
        </div>
	
        <div id="tab-latest" class="tab-content">
          <div class="box"> 
            <div id="latest-slidertab" class="row owl-carousel product-slider">
              <?php for($i=0;$i<7;$i++){ ?>
			  
              <div class="item">
                <div class="product-thumb transition">
                  <div class="image product-imageblock"> <a href=""><img src="image/product/conferance_01.jpg" style="width:380px; height:300px;" alt="lorem ippsum dolor dummy" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
                    <div class="button-group">
                      <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                      <button type="button" class="addtocart-btn" >Add To Cart</button>
                      <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                    </div>
                  </div>
                  <div class="caption product-detail">
                    <h4 class="product-name"><a href="detail1.php" title="lorem ippsum dolor dummy">จัดแบบเธียรเตอร์รองรับ 50 คน</a></h4>
                    <p class="price product-price">$122.00<span class="price-tax">Ex Tax: $100.00</span></p>
					
					
					<br><br>
	  <center><a href="detail1.php" class="btn btn-large btn-primary">กดดูรายละเอียด</a></center><br>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                  </div>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn" >Add To Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
					
                  </div>
                </div>
			  </div>
			  <?php } ?>
			  
            </div>
          </div>
        </div>
		
    </div>
  </div>
  

  <!--<div id="subbanner4" class="banner" >
  <div class="item"> <a href="#"><img src="image/banners/subbanner4.jpg" alt="Sub Banner4" class="img-responsive" /></a> </div>
</div>  
</div>-->



		<footer>
  <div class="container">
  <hr>
		
		
<script type="text/javascript">
        $(window).load(function() {
            // The slider being synced must be initialized first
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 170,
                itemMargin: 10,
                asNavFor: '#slider'
            });
            
            $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel"
            });
        });
        
        $(window).load(function() {
            // The slider being synced must be initialized first
            $('#carousel-mobile').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 90,
                itemMargin: 5,
                asNavFor: '#slider-mobile'
            });
            
            $('#slider-mobile').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel-mobile"
            });
        });
    </script>
    

<?php
include 'footter.php'
?>
</body>
</html>
