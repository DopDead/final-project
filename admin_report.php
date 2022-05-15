<?php
include 'function.inc.php';

include 'chk_sess.php';


$totalpage = 0; $each = 5; $send_url='';
if (isset($_GET['page'])!="") { $page = $_GET['page']; } else { $page=1; }


?>

<!DOCTYPE html>
<html>
<title> รายงาน|<?php echo$sys_title;?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
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
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onClick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right"><?php echo$sys_title;?></span>
</div>

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
      <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-user-times"></i></a>
    </div>
  </div>

  <hr>
  <div class="w3-container">
  <a href="main.php"><h5>Dashboard</h5></a>
  </div>

 

  <div class="w3-bar-block">


<a href="admin_member.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  การจัดการสมาชิก</a>
     <a href="admin_emp.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-fw fa-check-square"></i>  การจัดการพนักงาน</a>
    <a href="admin_display.php" class="w3-bar-item w3-button w3-padding"><i class=" fa fa-flag"></i>  การจัดการห้องพัก</a>
    <a href="admin_report.php" class="w3-bar-item w3-button w3-padding w3-black"><i class="fa fa-fw fa-line-chart"></i>รายงาน</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-fw fa-sign-out"></i>ออกจากระบบ</a>
    </aside>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onClick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->

  <div class="container"style="padding-top:45px">
  <h2 style="text-align: center"><b><i class="fa fa-sticky-note"></i> ข้อมูลรายงาน</b></h2>
  <hr>
  <div class="row" style="padding-top:35px">
  <div class="col-sm-6">


 <form action="#" class="form form-horizontal"  name="frm1" id="frm1" data-toggle="validdator">
                       <div class="form-group">
                            <div class="col-md-1"><label>รายงาน</label></div>
                            <div class="col-md-3">
                                
                             <select name="forma" onChange="location = this.value;">
    <option value="."></option>
     <option value="admin_report.php">รายงานทั้งหมด</option>
 <option value="admin_report2.php">รายงานยอดขาย</option>
 <option value="admin_report_other.php">รายงานเบ็ดเตล็ด</option>

</select>
                            </div>
                        </div>
                    
               

    
    
    
     <script>
        function refresh(){
            let start = document.getElementById('startdate');
            let end = document.getElementById('enddate');
            start.value = null;
            end.value = null;
            console.loq('hello')
        }
    </script>

 <div class="container" style="padding-top:45px">
<h2 align="center"> รายงานข้อมูลสมาชิก</h2>
<p align="center">&nbsp;             </p>
             <table id='tableData'>
                <tr>
                    <th>รหัส</th>
                    <th>ชื่อสมาชิก</th>
                    <th>วันที่สมัคร</th>
                    <th>อีเมลล์</th>
                </tr>
                <tbody>
                <?php 
                        $where='';
                        if (isset($_GET['name_member'])!='') {
                            if ($_GET['name_member']!='') {
                                $where=' where name_member="'.$_GET['name_member'].'"';
                                
                            }
                        }
                        if (isset($_GET['date_member'])!='') {
                            if ($_GET['date_member']!='') {
                                if ($where=='') {
                                    $where=' where date_member like "%'.$_GET['date_member'].'%" ';
                                } else {
                                    $where=' and date_member like "%'.$_GET['date_member'].'%" ';
                                }
                                
                            }
                        }
										
						
						
						
						
                        $query = sprintf('select * from member %s ',$where);
                        $result = mysqli_query($con,$query);
                        if (mysqli_num_rows($result)>0) {
                            $total = mysqli_num_rows($result);
                            $totalpage = ceil($total/$each);
                            $goto = ($page-1) * $each;

                            $query = sprintf('select * from member %s limit %s,%s',$where,$goto,$each);
                            $result = mysqli_query($con,$query);
                            for ($i=1;$i<=mysqli_num_rows($result);$i++) {
                                $rs = mysqli_fetch_array($result);
                    ?>
                        <tr>
                          <td><?php echo $rs['id_member']; ?></td>
                          <td><?php echo $rs['name_member']; ?></td>
                          <td><?php echo $rs['date_member']; ?></td>
                          <td><?php echo $rs['email_member']; ?> </td>
                        </tr>
                        <?php } } ?>
                </tbody>
            </table>
            <br>
            <!--Export Data to Excell -->
            
    </div>
   <!-- <script type="text/javascript">
            var $btnDLtoExcel = $('#DLtoExcel');
            $btnDLtoExcel.on('click', function () {
              $("#tableData").excelexportjs({
                  containerid: "tableData"
                  ,datatype: 'table'
              });
            });
        </script>  -->




   <!-- <div class="container" style="padding-top:45px">
    <ul class="pagination" >
    <li <?php if ($page==1) {echo'class="disabled"';} ?>><a href="admin_report.php?page=<?php echo ($page-1).$send_url; ?>" arial-label="Previous"><span>&laquo;</span></a></li>
                        <?php
                            for ($j=1;$j<=$totalpage;$j++) {
                                if ($j==$page) {echo '<li class="active">';} else {echo '<li>';}
                                echo '<a href="admin_report.php?page='.$j.$send_url.'">'.$j.'</a></li>';
                            }
                        ?>
                    <li><a href="admin_report.php?page=<?php echo ($page+1).$send_url; ?>" arial-label="Next"><span>&raquo;</span></a></li>
    </ul>
    </div> -->

    <!--รายงานข้อมูลอุปกรณ์-->
    <!--รายงานข้อมูลสนาม-->
<div class="container" style="padding-top:45px">
<h2 align="center"> รายงานห้องพักทั้งหมด</h2>
<p align="center">&nbsp;             </p>
             <table id='tableData'>
                <tr>
                    <th>รหัส</th>
                    <th>ห้องพัก</th>
                    <th>จอง/ครั้ง</th>
                </tr>
                <tbody>
                <?php 
                        $where='';
                        if (isset($_GET['display_name'])!='') {
                            if ($_GET['display_name']!='') {
                                $where=' where display_name="'.$_GET['display_name'].'"';
                                
                            }
                        }
                        if (isset($_GET['display_price'])!='') {
                            if ($_GET['display_price']!='') {
                                if ($where=='') {
                                    $where=' where display_price like "%'.$_GET['display_price'].'%" ';
                                } else {
                                    $where=' and display_price like "%'.$_GET['display_price'].'%" ';
                                }
                                
                            }
                        }
										
						
						
						
						
                        $query = sprintf('select * from display %s ',$where);
                        $result = mysqli_query($con,$query);
                        if (mysqli_num_rows($result)>0) {
                            $total = mysqli_num_rows($result);
                            $totalpage = ceil($total/$each);
                            $goto = ($page-1) * $each;

                            $query = sprintf('select * from display %s limit %s,%s',$where,$goto,$each);
                            $result = mysqli_query($con,$query);
                            for ($i=1;$i<=mysqli_num_rows($result);$i++) {
                                $rs = mysqli_fetch_array($result);
                    ?>
                        <tr>
                          <td><?php echo $rs['display_id']; ?></td>
                          <td><?php echo $rs['display_name']; ?></td>
                          <td><?php echo $rs['display_fulltime_price']; ?></td>
                        </tr>
                        <?php } } ?>
                </tbody>
            </table>
            <br>
            <!--Export Data to Excell -->
            
    </div>
   

    <!--รายงานสรุปตัวเลข-->

    <div class="col-sm-6" style="padding-top:45px">
    <h2 align="center"> รายงานโดยสรุป </h2>

    <table id='tableData'>
        <tr>
            <th >รายงานต่างๆ</th>
            <th >จำนวน</th>
        </tr>
        <tbody>

            <?php 
            $query = "SELECT `id_booking`,COUNT(`display_id`) as total FROM `booking`";
            $result = mysqli_query($con,$query);
                            
            $rs = mysqli_fetch_array($result);
            ?>
        <tr>
            <td>จำนวนการจอง</td>
            <td>&nbsp; <?php echo $rs['total']; ?> &nbsp;&nbsp;</td>
        </tr>

            <?php  $query = "SELECT `display_id`,COUNT(`display_id`) as total FROM `display`";
                            $result = mysqli_query($con,$query);
                            
                                $rs = mysqli_fetch_array($result);
            ?>
        <tr>  
            <td>จำนวนห้องพัก</td>
            <td>&nbsp; <?php echo $rs['total']; ?>&nbsp;&nbsp;(ห้อง) </td>
        </tr>
 <?php  $query = "SELECT `display_id`,COUNT(`display_id`) as total FROM `display`";
                      $result = mysqli_query($con,$query);
                      
                          $rs = mysqli_fetch_array($result);
            ?>  

          <?php 
                      
				

                            $query = "SELECT `id_member`,COUNT(`id_member`) as total FROM `member`";
                            $result = mysqli_query($con,$query);
                            
                                $rs = mysqli_fetch_array($result);
            ?>
        <tr>
            <td>สมาชิกทั้งหมด</td>
            <td>&nbsp;&nbsp;<?php echo $rs['total']; ?> &nbsp;&nbsp;(คน)</td>
        </tr>
        </tbody>
    </table>
    <br>
            
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
