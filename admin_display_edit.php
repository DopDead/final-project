<?php
include 'function.inc.php';
include 'chk_sess.php';



$query = sprintf('select * from display where display_id="%s"',s($con,$_GET['id_edit']));
$result = mysqli_query($con,$query);
$rs = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<title>การจัดการห้องพัก|<?php echo$sys_title;?></title>
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

<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<div class="container"style="padding-top:45px">
<h2 style="text-align: center"><b><i class="fa fa-flag"></i> การจัดการห้องพัก|แก้ไขห้องพัก</b></h2>
<hr>

<div class="col-sm-8" style="padding-top:45px">

     <form action="admin_display_edit_acc.php" method="POST" name="form1" enctype="multipart/form-data">
  <p>&nbsp;</p>

  <table width="81%"  height="376">
    <tr>
	
	 <td width="36%" ><b>ห้องพัก:</b></td>
      <td width="64%"><input type="text" name="display_name"  value="<?php echo $rs['display_name'] ?>" required></td>
    </tr>
     <tr>
      
      
        <TD width="197"><B>ราคา :</B></TD>
            <TD width="329"><INPUT TYPE="text" NAME="display_fulltime_price" value="<?php echo $rs['display_fulltime_price'] ?>"/>
            /บาท</TD>
          </TR>
          <TR>
      <td><b>รายละเอียด:</b></td>
       <td><TEXTAREA name="display_detail" rows="5" cols="50"><?php echo $rs['display_detail']; ?></TEXTAREA>


       <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('display_detail');
                    function CKupdate() {
                        for (instance in CKEDITOR.instances)
                            CKEDITOR.instances[instance].updateElement();
                    }
                </script></td>
     </tr>
     <tr>
      <td><b>รูปภาพ :</b></td>
      <td><input type="file" name="fileToUpload" id="fileToUpload">



<img width="150" height="150" src="image/Tentrental/<?php 
    if($rs['display_img']==''){
echo 'nophoto.jpg';
  }else{
echo $rs['display_img'];

  } ?>"></td>
    </tr>
   
    <tr>
      <td height="54" colspan="2">
      
      
    <input name="id" type="hidden" id="id" value="<?php echo $rs['display_id']?>" />  
   
     <input class="w3-button w3-black w3-round"  type="submit" value="บันทึกการแก้ไข" name="submit"> </td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
                
           
        </div>

    <script type="text/javascript" src="../booking_Equipment_dev/js/jquery.js"></script>
    <script type="text/javascript" src="../booking_Equipment_dev/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../booking_Equipment_dev/js/sidebar_menu.js"></script>

</body>
</html>