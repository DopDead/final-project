<?php
include 'function.inc.php';
//เรียกใช้งานไฟล์เเชื่อมต่อฐานข้อมูล
include 'chk_sess.php';
//ไฟล์ใช้ตรวจสอบการเข้าสู่ระบบ

$totalpage = 0; $each = 9; $send_url='';
if (isset($_GET['page'])!="") { $page = $_GET['page']; } else { $page=1; }


 if ( isset($_GET["delete"]) )
   {
    $iddelete = $_GET["delete"];
    $sql = "DELETE FROM booking WHERE id_booking='$iddelete'";
    $result3 = mysqli_query($con,$sql);
	
	
	if($result3){
	echo "<center><h3>ลบเรียบร้อยแล้ว</h3>";
echo "<meta http-equiv='refresh' content='0;url=admin_booking.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=admin_booking.php?status=failue\">";
}
}


?>


<!DOCTYPE html>
<html>
<title> รายละเอียดการจอง |<?php echo$sys_title;?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="excelexportjs.js"></script>
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

      <span>Welcome, <strong></strong><?php echo $_SESSION['mname']; ?> </span><br>
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
	    
    <a href="admin_booking.php" class="w3-bar-item w3-button w3-black"><i class="fa fa-fw fa-check-square"></i>  การจัดการการจอง</a>
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

  <div class="container"style="padding-top:45px">
    <h2 style="text-align: center"><b><i class="fa fa-fw fa-check-square"></i> การจัดการจอง</b></h2>
    <hr>

      <div class="container" style="padding-top:45px">
        <table id='tableData'>
            <tr>
              <th>รหัสการจอง</th>
              <th>ชื่อผู้จอง</th>
              <th>วันที่จอง</th>
              
              <th>จองเวลา</th>  
              <th>ถึงเวลา</th>
              <th>สถานะ</th>      
              <th>รายละเอียด</th>
            </tr>
          <tbody>
  <?php
  // ดึงข้อมูลทั้งหมดในตาราง booking
  $query = "SELECT * FROM booking";
  $result = mysqli_query($con,$query); // เชื่อมต่อฐานข้อมูล
  while($row = $result->fetch_array())
  // นำค่ามาวนลูบแสดงค่าออกมา
  {
  ?>
          <tr>

            <td><?php echo $row['id_booking'];//แสดงหมายเลขการจอง ?> </td>
<td><?php //นำหมายเลขสมาชิกมาค้นหาในตาราง member แล้วแสดงชื่อออกมา
    $sql3 = "SELECT * FROM member WHERE id_member='$row[id_member]' ";
    $result3 = mysqli_query($con,$sql3);
    $rs1 = mysqli_fetch_array($result3);  
    echo $rs1['name_member']; ?></td>
            <td><?php echo $row['date_booking'];//แสดงวันที่ ?></td>

           
            <td><?php //นำหมายเลขสนามจากการดึงค่ามาค้นหาในตาราง display เพื่อหาชื่อของสนาม
    $sql = "SELECT * FROM booking WHERE display_id='$row[display_id]' ";
    $result2 = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($result2);  
    echo $rs['time_booking']; ?></td>

            <td><?php //นำหมายเลขสนามจากการดึงค่ามาค้นหาในตาราง display เพื่อหาชื่อของสนาม
    $sql = "SELECT * FROM booking WHERE display_id='$row[display_id]' ";
    $result2 = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($result2);  
    echo $rs['time_booking2']; ?></td>
<td><?php 
            $member_status=1;
                        if ($rs['member_status']=="0")
              {
    echo "<div style='background-color:#FF3366'>ยังไม่ชำระเงิน</div>";
}
else if($rs['member_status']=="1")
{
        echo "<div style='background-color:#33FFFF'>ชำระเงินแล้ว</div>";
}


           ?></td>
            <td>
<form action="sendmail_approve.php" method="get"  >
  <input type="hidden" name="edit_id" value="<?php echo $rs['id_booking']; ?>">
<select name="member_status" id="member_status" onChange="this.form.submit()">
        
              
        <option value="0">ยังไม่ชำระเงิน</option>
      <option value="1">ชำระเงินแล้ว</option>

            </select>
  
        
            </select>
</form>  
             

  <a href="?delete=<?php echo $row['id_booking']; ?>"  class="btn btn-danger">ลบ</a>
       
 
       
       
        
       
       <img width="172" height="131" src="image/slips_img/<?php 
    if($rs['slips_img']=='0'){
echo 'nopic.jpg';
  }else{
echo $rs['slips_img'];

  } ?>" width="150" height="150">
       
       <a href="admin_order.php?id=<?php echo $row['id_booking']; ?>" class="btn btn-info"
                               title="Bill"><i class="fa fa-eye"></i></a></td>
        </tr>
  <?php
  }
  ?>
          </tbody>
        </table>
    </div>
  </div>

  <div class="container" style="padding-top:75px">
    <ul class="pagination" >
    <li <?php if ($page==1) {echo'class="disabled"';} ?>><a href="admin_booking.php?page=<?php echo ($page-1).$send_url; ?>" arial-label="Previous"><span>&laquo;</span></a></li>
                        <?php
                            for ($j=1;$j<=$totalpage;$j++) {
                                if ($j==$page) {echo '<li class="active">';} else {echo '<li>';}
                                echo '<a href="admin_booking.php?page='.$j.$send_url.'">'.$j.'</a></li>';
                            }
                        ?>
                    <li><a href="admin_booking.php?page=<?php echo ($page+1).$send_url; ?>" arial-label="Next"><span>&raquo;</span></a></li>
  </ul>
    </div>


<!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">

  </footer>

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