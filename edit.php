<?php
include 'function.inc.php';

include 'chk_sess.php';


$query = sprintf('select * from member where id_member="%s" ',$_SESSION['mid']);

$result = mysqli_query($con,$query);
$rs = mysqli_fetch_array($result);


$Username_member=$rs['Username_member'];
$Password_member=$rs['Password_member'];
$name_member=$rs['name_member'];
$idcard_member=$rs['idcard_member'];

$email_member=$rs['email_member'];


?>
<!DOCTYPE html>
<html>
<title> แก้ไขข้อข้อมูลส่วนตัว| <?php echo$sys_title;?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!------ ปฏิทิน----->     
      
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
    width: 100%;
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

<body class="w3-light-grey">

<!-- Top container -->
<?php include 'top.php'; ?>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
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
      <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-user-times"></i></a>
    </div>
  </div>

  <hr>
  <div class="w3-container">
  <a href="main.php"><h5>Dashboard</h5></a>
  </div>

  <?php if ($_SESSION['mtype']==1) { ?>

  <div class="w3-bar-block">
    <a href="admin_member.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  การจัดการลูกค้า</a>
     <a href="admin_emp.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-fw fa-check-square"></i>  การจัดการพนักงาน</a>
    <a href="admin_display.php" class="w3-bar-item w3-button w3-padding"><i class=" fa fa-flag"></i>  การจัดการห้องพัก</a>

    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-fw fa-sign-out"></i>ออกจากระบบ</a>


  </div>
  <?php } ?>
    </aside>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onClick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<div class="container"style="padding-top:45px">
<h2 style="text-align: center"><b><i class="fa fa-edit"></i> แก้ไขข้อข้อมูลส่วนตัว</b></h2>
<hr>
<div class="col-sm-8" style="padding-top:45px">
<form action="editsave.php" method="POST" name="form1" enctype="multipart/form-data">    
  
<TABLE height="376">
<TR>
	<TD width="94"><B>Username :</B></TD>
	<TD width="561"><?php echo $rs['Username_member']; ?></TD>
</TR>
<TR>
	<TD><B>Password :</B></TD>
	<TD><input type="password"name="Password_member" id="Password_member" value="<?php echo $rs['Password_member']; ?>" required>
	  </input></TD>
</TR>
<TR>
	<TD><B>ชื่อ:</B></TD>
	<TD><input type="text" name="name_member" id="name_member" value="<?php echo $rs['name_member']; ?>" size="30" required></TD>
</TR>
<TR>


  <TD><B>นามสกุล :</B></TD>
  <TD><input type="text" name="lastname_member" id="lastname_member" value="<?php echo $rs['lastname_member']; ?>" size="30" required></TD>
</TR>
<TR> 


	<TD><B>ที่อยู่ติดต่อ :</B></TD>
	<TD>
    <textarea name="address_member" rows="5" cols="60"><?php echo $rs['address_member']; ?> </textarea>
  
         
    </TD>
</TR>
<TR>
  <TD><b>โทรศัพท์ :</b></TD>
  <TD>
  
  <input type="text" name="phone_member" id="phone_member" value="<?php echo $rs['phone_member']; ?>" size="30" required></TD>
</TR>
<TR>
	<TD><b>อีเมล์ :</b></TD>
	<TD><input type="text" name="email_member" id="email_member" value="<?php echo $rs['email_member']; ?>" size="30" required>
	  *</TD>
</TR>
<TR>
 

 
	<TD><B>&nbsp;</B></TD>
	<TD><button class="w3-button w3-black w3-round" type="submit" name="Edit" value="Save" class="btn btn-success"></i> บันทึก</button>
        
        
<input name="id_edit" type="hidden" id="id_edit" value="<?php echo $rs['id_member']?>" />     
</TD>
</TR>
</TABLE>
</FORM>           </p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;  </p>
        </section>
        


</body>
</html>
