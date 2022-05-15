


<div class="preloader loader" style="display: block; background:#f2f2f2;"> <img src="image/loader.gif"  alt="#"/></div>
<header>

  <div class="header-top">
    <div class="container">
	
      <div class="row">
	  
        <div class="col-sm-12">
         
        <div class="top-left pull-left">
            <div class="language">
              
            </div>
            <div class="currency">
              <form action="#" method="post" enctype="multipart/form-data" id="currency">
                <div class="btn-group">
                 
                </div>
              </form>
            </div>
          </div>
          <div class="top-right pull-right">
            <div id="top-links" class="nav pull-right">
              <ul class="list-inline">

               <?php 
if (isset($_SESSION['sess_id'])=="") {
           ?>

                <li class="dropdown account"><a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown" style="color: #fff;font-weight: bold;> <i class="fa fa-user">
        </i><span>My Account</span> <span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-menu-right">

                  <li><a href="register.php">สมัครสมาชิก</a></li>

                    <li><a href="login.php">ล็อคอิน</a></li>

<?php } else {
          $query10 = sprintf('select * from member where id_member="%s" ',$_SESSION['mid']);
          $result10 = mysqli_query($con,$query10);
          $rs10 = mysqli_fetch_array($result10); 
           $sqlw = "SELECT * FROM type_member WHERE id='$rs10[type_member]' ";
          $result = mysqli_query($con,$sqlw);
          $rs1 = mysqli_fetch_array($result); 

            ?>  
 
<li class="dropdown account"><a href="#" title="My Account" class="dropdown-toggle" data-toggle="dropdown" style="color: #fff;font-weight: bold;> <i class="fa fa-user">
        </i><span>My:</span><?php echo $_SESSION['mname']; ?> <span class="caret"></span></a>
                    
                  <ul class="dropdown-menu dropdown-menu-right"></a></li>
                     <li><a href="history_order.php">ประวัติการจอง</a></li>
                    <li><a href="profile.php">แก้ไขข้อมูลส่วนตัว</a></li>
                      <li><a href="logout.php">ออกจากระบบ</a></li>
                  

                <?php } ?>
                  </ul>
                </li>
               
              </ul>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  <nav id="menu" class="navbar">
      <div class="nav-inner">
        <div class="navbar-header"><span id="category" class="visible-xs">Menu</span>
          <button type="button" class="btn btn-navbar navbar-toggle" ><i class="fa fa-bars"></i></button>
        </div>
        <div class="navbar-collapse">
          <ul class="main-navigation">
            <li><a href="index.php"   class="parent"  >หน้าแรก</a> </li>
            <li><a href="about.php"   class="parent"  >เกี่ยวกับเรา</a> </li>
           
            <li><a href="booking.php"   class="parent"  >เลือกห้อง</a> </li>
           
<li><a href="contact.php"   class="parent"  >ติดต่อกับเรา</a> </li>
            
           
            </li>
            <!--<li><a href="blog.php" class="parent"  >Blog</a></li>
            <li><a href="about-us.html" >About us</a></li>
            <li><a href="contact.php" >Contact Us</a> </li>-->
          </ul>
        </div>
      </div>
    </nav>
  
</header>
 <center>
</center>