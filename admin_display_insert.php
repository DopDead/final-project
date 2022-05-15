<?php
include 'function.inc.php';
include 'chk_sess.php';
?>

<!DOCTYPE html>
<html>
<title>เพิ่มห้องพัก|<?php echo$sys_title;?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
      
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<script>
$(function() {
    $( '#datepicker' ).datepicker();
});
</script>

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
th {
    background: linear-gradient(to bottom, #323232 0%, #3F3F3F 40%, #1C1C1C 150%), linear-gradient(to top, rgba(255,255,255,0.40) 0%, rgba(0,0,0,0.25) 200%);
 background-blend-mode: multiply;
    color: white;
}
</style>
<script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>


<body class="w3-light-grey">

<!-- Top container -->
<?php include 'top.php'; ?>

<!-- Sidebar/menu -->
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
  </div>

  <hr>
  <div class="w3-container">
  <a href="main.php"><h5>Dashboard</h5></a>
  </div>



  <div class="w3-bar-block">
<a href="admin_member.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  การจัดการสมาชิก</a>
     <a href="admin_booking.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-fw fa-check-square"></i>  การจัดการจอง</a>
    <a href="admin_display.php" class="w3-bar-item w3-button w3-padding w3-black"><i class=" fa fa-flag"></i>  การจัดการห้องพัก</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-fw fa-sign-out"></i>ออกจากระบบ</a>
    </aside>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onClick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->

  <div class="container"style="padding-top:45px">
  <h2 style="text-align: center"><b><i class="fa fa-flag"></i> การจัดการห้องพัก| เพิ่มห้องพัก</b></h2>
  <hr>
<div class="col-sm-8" style="padding-top:45px">
             <form action="admin_display_insert_acc.php" method="POST" name="form1" enctype="multipart/form-data">
        <TABLE width="89%" height="173">
          <TR>
		  
		   <TD width="197"><B>ห้องพัก :</B></TD>
            <TD width="329"><INPUT TYPE="text" NAME="display_name"/>            </TD>
          </TR>
          <TR>
           
            <TD width="197"><B>ราคา :</B></TD>
            <TD width="329"><INPUT TYPE="text" NAME="display_fulltime_price"/>
            /บาท</TD>
          </TR>
          <TR>
           <TD><B>รายละเอียด:</B></TD>
            <TD><TEXTAREA NAME="display_detail" ROWS="10" COLS="40"></TEXTAREA>

<script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('display_detail');
                    function CKupdate() {
                        for (instance in CKEDITOR.instances)
                            CKEDITOR.instances[instance].updateElement();
                    }
                </script>            </TD>
          </TR>
          <TR>
		  <TD height="43">รูปภาพ :</TD>
            <TD> <input type="file" name="filUpload"></TD>
          </TR>
          <TR>
		  
            <TD><B>&nbsp;</B></TD>
            <TD><input class="w3-button w3-black w3-round" type='submit' name='submit'>
                <INPUT class="w3-button w3-black w3-round" TYPE='Reset' VALUE='Reset'></TD>
          </TR>
        </TABLE>
      
      </FORM>           </p>
            
     </div>
             
  <!-- Footer -->

  </div>
  <hr>
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
<script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/sidebar_menu.js"></script>

</body>
</html>