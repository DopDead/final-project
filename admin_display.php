<?php
include 'function.inc.php';

include 'chk_sess.php';

$query = sprintf('select * from member where id_member="%s" ',$_SESSION['mid']);

$result = mysqli_query($con,$query);
$rs = mysqli_fetch_array($result);

$totalpage = 0; $each = 9; $send_url='';//จำนวนหน้าทั้งหมด โดยแบ่งเป็น 9 หน้า
if (isset($_GET['page'])!="") { $page = $_GET['page']; } else { $page=1; }


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
  <h2 style="text-align: center"><b><i class="fa fa-flag"></i> การจัดการห้องพัก</b></h2>
  <hr>
  <div class="row" style="padding-top:35px">
  <div class="col-sm-6">

  <form action="admin_display.php" method="get" name="frm1" id="frm1" class="form form-horizontal">
  
  <div class="input-group">
    <input type="text" class="form-control" name="display_name" id="display_name" placeholder="ค้นหาศูนย์อาหาร">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>
</div>
<div class="col-sm-6">
<button class="w3-button w3-black w3-round" type="submit"><a href="admin_display_insert.php" id="parts"various iframe">เพิ่มข้อมูล  <i class="fa fa-plus"></i></a></button>
<button class="w3-button w3-black w3-round" ><a href="main.php">กลับหน้าหลัก  <i class="fa fa-home"></i></a></button>
</div>
</div>

 <div class="container" style="padding-top:45px">
             <table id='tableData'>
             <tr>
                  <th>รหัส</th>
                  <th>ห้องพัก</th>
         
                  <th>ราคา</th>
     
                 
                  <th>รูปภาพ</th>
                  <th></th>
             </tr>
                <tbody>
                <?php 
                        $where='';
                        if (isset($_GET['name_member'])!='') {
                            if ($_GET['name_member']!='') {
                                $where=' where name_member="'.$_GET['name_member'].'"';
                                
                            }
                        }
                        if (isset($_GET['display_name'])!='') {
                            if ($_GET['display_name']!='') {
                                if ($where=='') {
                                    $where=' where display_name like "%'.$_GET['display_name'].'%" ';
                                } else {
                                    $where=' and display_name like "%'.$_GET['display_name'].'%" ';
                                }
                                
                            }
                        }

                        $query = sprintf('SELECT * FROM `display` ORDER BY `display`.`display_id` ASC %s ',$where);
                        $result = mysqli_query($con,$query);
                        if (mysqli_num_rows($result)>0) {
                            $total = mysqli_num_rows($result);
                            $totalpage = ceil($total/$each);
                            $goto = ($page-1) * $each;

                            $query = sprintf('SELECT * FROM `display` ORDER BY `display`.`display_id` ASC %s limit %s,%s',$where,$goto,$each);
                            $result = mysqli_query($con,$query);
                            for ($i=1;$i<=mysqli_num_rows($result);$i++) {
                                $rs = mysqli_fetch_array($result);
                    ?>

                    <tr>
                        <td><?php echo $rs['display_id']; ?></td>
                        <td><?php echo $rs['display_name']; ?></td>
        
                        <td><?php echo $rs['display_fulltime_price']; ?></td>
                       <td>
                        
                        <img width="150" height="150" src="image/Tentrental/<?php 
    if($rs['display_img']==''){
echo 'nophoto.jpg';
  }else{
echo $rs['display_img'];

  } ?>">                        </td>
                        <td>
                            <a href="admin_display_edit.php?id_edit=<?php echo $rs['display_id']; ?>" id="parts"various iframe" class="btn btn-info" title="แก้ไข"><i class="fa fa-edit"></i></a> <a href="#" onClick="javascript:if (confirm('ยืนยันการลบข้อมูล')==true) {top.window.location='del_display.php?id_del=<?php echo $rs['display_id']; ?>';}" class="btn btn-danger" title="ลบ"><i class="fa fa-trash"></i></a> </td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
<br>
            <!--Export Data to Excell -->
           
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

    <div class="container" style="padding-top:75px">
    <ul class="pagination" >
    <li <?php if ($page==1) {echo'class="disabled"';} ?>><a href="admin_display.php?page=<?php echo ($page-1).$send_url; ?>" arial-label="Previous"><span>&laquo;</span></a></li>
                        <?php
                            for ($j=1;$j<=$totalpage;$j++) {
                                if ($j==$page) {echo '<li class="active">';} else {echo '<li>';}
                                echo '<a href="admin_display.php?page='.$j.$send_url.'">'.$j.'</a></li>';
                            }
                        ?>
                    <li><a href="admin_display.php?page=<?php echo ($page+1).$send_url; ?>" arial-label="Next"><span>&raquo;</span></a></li>
  </ul>
   </div>
    </div>
  
  <hr>
                      
  <!-- Footer -->


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
