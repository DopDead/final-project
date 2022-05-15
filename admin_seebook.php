<?php
include 'function.inc.php';
//เรียกใช้งานไฟล์เเชื่อมต่อฐานข้อมูล
include 'chk_sess.php';
//ไฟล์ใช้ตรวจสอบการเข้าสู่ระบบ
    $sql3 = "SELECT * FROM booking WHERE id_booking='$_GET[id]' ";
    $result3 = mysqli_query($con,$sql3);
    $rs1 = mysqli_fetch_array($result3); 
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
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:200px;" id="mySidebar"><br>
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
    <a href="admin_display.php" class="w3-bar-item w3-button w3-padding"><i class=" fa fa-flag"></i>  การจัดการห้องพัก</a>

    <a href="admin_booking.php" class="w3-bar-item w3-button w3-padding w3-black"><i class="fa fa-fw fa-check-square"></i>  การจัดการการจอง</a>
   <a href="admin_information.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sticky-note"></i> การจัดการข่าวสาร</a>

    <a href="admin_report.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-fw fa-line-chart"></i>รายงาน</a>

    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-fw fa-sign-out"></i>ออกจากระบบ</a>
  
    </aside>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onClick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:200px;margin-top:43px;">

  <!-- Header -->

  <div class="container"style="padding-top:45px">
    <h2 style="text-align: center"><b><i class="fa fa-eye"></i> รายละเอียดใบเสร็จการจอง</b></h2>
    <hr>
    <br>
  </div>

    <div class="container">
        <div class="row">
       <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>คุณ <?php //นำหมายเลขสมาชิกมาค้นหาในตาราง member แล้วแสดงชื่อออกมา
    $sql1 = "SELECT * FROM member WHERE id_member='$rs1[id_member]' ";
    $result1 = mysqli_query($con,$sql1);
    $rs2 = mysqli_fetch_array($result1);  
    echo $rs2['name_member']; ?></strong>
                        <br>
                        <abbr title="Phone">โทร:</abbr> <?php echo $rs2['phone_member']; ?>
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>วันที่จอง : <?php echo $rs1['date_booking']; ?></em>
                    </p>
                    <p>
                        <em>Receipt #: <?php echo $rs1['id_booking']; ?></em>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>ราคา</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em>ห้อง:<?php 
    //นำหมายเลขสนามจากการดึงค่ามาค้นหาในตาราง display เพื่อหาชื่อของห้อง
                            $x=0;
    $sql = "SELECT * FROM display WHERE display_id='$rs1[display_id]' ";
    $result2 = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($result2);  
    echo $rs['display_name']; 
     ?> ประเภท :<?php  echo$rs['display_size'];?> </td>
                            <td class="col-md-1"> <?php echo$rs1['book_type_time'];?></td>
                            
                           
                        </tr>
                        <?php  if ($rs1['book_type_time']=='1') {
        
            } else{ ?> 
                         <tr>
                            
                        </tr>
                             <tr> 
                        </tr>
                 
        <?php } ?>
                        <tr>
                            <td> <form action="sendmail_approve.php" method="get"  >
  <input type="hidden" name="edit_id" value="<?php echo $rs1['id_booking']; ?>">
<select name="member_status" id="member_status" onchange="this.form.submit()">
        
              
        <option value="0">รออนุมัติ</option>
      <option value="1">อนุมัติ</option>

            </select>
  
        
            </select>
</form>  </td>
                            <td>รวม  <?php echo$rs1['book_type_time'];?></td>
                           
                           
                        </tr>
                    </tbody>
                </table><a href="admin_booking.php"  class="btn btn-success btn-lg btn-block">     กลับ </a>
            </td>
            </div>
        </div>
    </div>
  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">

  </footer>

  <!-- End page content -->
</div>
<script type="text/javascript">
            var $btnDLtoExcel = $('#DLtoExcel');
            $btnDLtoExcel.on('click', function () {
              $("#tableData").excelexportjs({
                  containerid: "tableData"
                  ,datatype: 'table'
              });
            });
        </script>

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
