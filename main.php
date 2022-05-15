<?php
include 'function.inc.php';

include 'chk_sess.php';
if($_SESSION['mtype']!=1){ header("Location:".$siteurl); }

$totalpage = 0; $each = 9; $send_url='';
if (isset($_GET['page'])!="") { $page = $_GET['page']; } else { $page=1; }


?> 
<!DOCTYPE html>
<html>
<title>Admin <?php echo$sys_title;?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
table {
    border-collapse: collapse;
    width: 70%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);}

th {
    background: linear-gradient(to bottom, #323232 0%, #3F3F3F 40%, #1C1C1C 150%), linear-gradient(to top, rgba(255,255,255,0.40) 0%, rgba(0,0,0,0.25) 200%);
 background-blend-mode: multiply;
    color: white;
}
</style>

<body class="w3-light-grey">


<?php include 'top.php'; ?>
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:250px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      
    </div>

    <div class="w3-col s8 w3-bar">

    <?php
					$query10 = sprintf('select * from member where id_member="%s" ',$_SESSION['mid']);
					$result10 = mysqli_query($con,$query10);
					$rs10 = mysqli_fetch_array($result10); 
				?>

      <span>Welcome, <strong></strong><?php echo $_SESSION['mname']; ?> <?php echo $_SESSION['mtype']; ?></span><br>
<a href="edit.php" class="w3-bar-item w3-button"><i class="fa fa-edit"></i></a>
      <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-user-times"></i></a>    </div>
  </div>

 <hr>
  <div class="w3-container w3-black">
  <a href="main.php"><h5>Dashboard</h5></a>
  </div>


  <div class="w3-bar-block">


    <a href="admin_member.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  การจัดการสมาชิก</a>
     <a href="admin_booking.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-fw fa-check-square"></i>  การจัดการจอง</a>
    <a href="admin_display.php" class="w3-bar-item w3-button w3-padding"><i class=" fa fa-flag"></i>  การจัดการห้องพัก</a>

    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-fw fa-sign-out"></i>ออกจากระบบ</a>

  </div>


    </aside>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onClick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h2><b><i class="fa fa-dashboard"></i> My Dashboard</b></h2>
    <hr>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
        <?php 
                      
				

            $query = "SELECT `id_booking`,COUNT(`display_id`) as total FROM `booking`";
            $result = mysqli_query($con,$query);
                            
            $rs = mysqli_fetch_array($result);
            ?>
          <h3>&nbsp; <?php echo $rs['total']; ?> &nbsp;&nbsp;</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>จำนวนการจอง</h4>
      </div>
    </div>

    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
        <?php 
                      
				

                            $query = "SELECT `display_id`,COUNT(`display_id`) as total FROM `display`";
                            $result = mysqli_query($con,$query);
                            
                                $rs = mysqli_fetch_array($result);
            ?>
          <h3>&nbsp; <?php echo $rs['total']; ?>&nbsp;&nbsp;</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>ห้องพัก</h4>
      </div>
    </div>

   

    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
        <?php 
                       $query = "SELECT `id_member`,COUNT(`id_member`) as total FROM `member`";
                      $result = mysqli_query($con,$query);
                      
                          $rs = mysqli_fetch_array($result);
      ?>
          <h3>&nbsp;&nbsp;<?php echo $rs['total']; ?> &nbsp;&nbsp;</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>จำนวนสมาชิก</h4>
      </div>
    </div>
  </div>

  <div class="w3-panel w3-dark-grey" >
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h3>เกี่ยวกับเรา</h3>
        <hr>
        <h2><?php echo$sys_title;?></h2>
        <h2>โทร 081-607-3333</h2>
      <br><br>ที่อยู่:  </div>

      <div class="w3-twothird">
        
        <!--<h3>แผนที่ร้าน</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31642.916056429603!2d99.58261777725332!3d7.535164552180196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMzMnMDcuNiJOIDk5wrAzNic0OS40IkU!5e0!3m2!1sth!2sth!4v1542399089800" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        <br><br>-->
      </div>
    </div>
  </div>


  <hr>

  <!-- Footer -->
 <!-- <footer class="w3-container w3-padding-16 w3-green">
    <h4>© 2020 YOKMANEE FOOD MARKET. All rights reserved</h4>
   
  </footer>-->
  <?php include 'footter.php'; ?>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>
</html>
