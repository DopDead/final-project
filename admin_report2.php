<?php
require 'function.inc.php';
include 'chk_sess.php';
if (isset($_GET["delete"])) {
    $iddelete = $_GET["delete"];
    $sql = "DELETE FROM bill_product WHERE id_bill='$iddelete'";
    $result3 = mysqli_query($con, $sql);


    if ($result3) {
        echo "<center><h3>ลบเรียบร้อยแล้ว</h3>";
        echo "<meta http-equiv='refresh' content='0;url=admin_history.php' />";

    } else {
        echo "<h3>ERROR : ไม่สามารถแก้ไข</h3>";
        echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=admin_history.php?status=failue\">";
    }
}
?>

<!DOCTYPE html>
<html>
<title> รายงาน|
    <?php echo $sys_title; ?>
</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
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
        html,
        body,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Raleway", sans-serif
        }

        table {
            border-collapse: collapse;
            width: 70%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
        }

        th {
            background: linear-gradient(to bottom, #323232 0%, #3F3F3F 40%, #1C1C1C 150%), linear-gradient(to top, rgba(255, 255, 255, 0.40) 0%, rgba(0, 0, 0, 0.25) 200%);
            background-blend-mode: multiply;
            color: white;
        }
    </style>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="w3-light-grey">

    <!-- Top container -->
    <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey"
            onClick="w3_open();"><i class="fa fa-bars"></i>  Menu
        </button>
        <span class="w3-bar-item w3-right">
            <?php echo $sys_title; ?>
        </span>
    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:250px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <br>

            <div class="w3-col s8 w3-bar">

                <?php
            $query10 = sprintf('select * from member where id_member="%s" ', $_SESSION['mid']);
            $result10 = mysqli_query($con, $query10);
            $rs10 = mysqli_fetch_array($result10);
            ?>

                <span>Welcome, <strong></strong>
                    <?php echo $_SESSION['mname']; ?>
                    <?php echo $_SESSION['mtype']; ?>
                </span><br>
                <a href="edit.php" class="w3-bar-item w3-button"><i class="fa fa-edit"></i></a>
                <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-user-times"></i></a>
            </div>
        </div>

        <hr>
        <div class="w3-container">
            <a href="main.php">
                <h5>Dashboard</h5>
            </a>
        </div>


        <div class="w3-bar-block">
            <a href="admin_member.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i> 
                การจัดการสมาชิก</a>
            <a href="admin_display.php" class="w3-bar-item w3-button w3-padding"><i class=" fa fa-flag"></i> 
                การจัดการห้องพัก</a>

            <a href="admin_booking.php" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-fw fa-check-square"></i>  การจัดการการจอง</a>
					 <a href="admin_other.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-fw fa-check-square"></i>  การจัดการเบ็ดเตล็ด</a>
            <a href="admin_information.php" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-sticky-note"></i> การจัดการข่าวสาร</a>

            <a href="admin_report.php" class="w3-bar-item w3-button w3-padding w3-black"><i
                    class="fa fa-fw fa-line-chart"></i>รายงาน</a>
            
            <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i
                    class="fa fa-fw fa-sign-out"></i>ออกจากระบบ</a>
        </div>
        </aside>
    </nav>


    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onClick="w3_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin:20px 0px 0px 300px">

        <!-- Header -->
        <div style="padding-top:45px;padding-bottom:5px">
            <center>
                <h2 style="text-align: center"><b><i class="fa fa-sticky-note"></i> รายงานยอดขาย</b></h2>
            </center>
        </div>
        
       
                            <select name="forma" onChange="location = this.value;">
    <option value="."></option>
     <option value="admin_report.php">รายงานทั้งหมด</option>
 <option value="admin_report2.php">รายงานยอดขาย</option>
 <option value="admin_report_other.php">รายงานเบ็ดเตล็ด</option>

</select>
                           
        <div class="container">
            <div class="row">
                <div class="col">
                    <center>
                        <form action="" method='POST'>
                            <div class="pl-0 font-weight-bold col-form-label">เลือกประเภทรายงาน :</div>
                            <span onclick='refresh()'><i class="fas fa-redo"></i></span>&nbsp 
                            <span class="col-form-label font-weight-bold">วันที่&nbsp;</span>
                            <input name="startdate" type="date" id="startdate" class="" value="<?php
                            if (isset($_POST['startdate'])) {
                                echo $_POST['startdate'];
                            }
                            ?>" /> <span class="col-form-label font-weight-bold">&nbsp;ถึง&nbsp;</span>
                            <input name="enddate" type="date" id="enddate" class="" value="<?php
                            if (isset($_POST['enddate'])) {
                                echo $_POST['enddate'];
                            }
                            ?>" />
                            <button class="btn btn-info ml-3" type="submit"> ค้นหา</button>
                        </form>
                    </center>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col">
                    <?php
					
				
                        if(isset($_POST["startdate"]) != null && $_POST["enddate"] != null){
						
 $sql = "select * from booking  where date_booking between '".$_POST["startdate"]."' and '".$_POST["enddate"]."'";
                        }else{
                            $sql = "select * from booking inner join display on (display.display_id = booking.display_id)";
                        }
						
			/// print_r($sql);
//die();	
					
						
                      $query = mysqli_query($con,$sql);
                        $total = 0;
                        $i = 0;
                        $num_row = mysqli_num_rows($query);
                        if($num_row < 1 ){
                            echo "<center>ไม่พบข้อมูลในช่วงเวลาดังกล่าว</center>";
                        }else{
                            
                    ?>
                    <table class="table table-striped table-bordered" style="font-size: 16px;font-family:Prompt ">
                        <tr>
                            <thead>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">วันที่</th>
                                <th class="text-center">เวลา</th>
                                <th class="text-center">ห้องพัก</th>
                                <th class="text-center">ราคา</th>
                            </thead>
                        </tr>

                        <!-- วนลูปแสดงผล & รวมยอดขายทั้งหมด-->
                        <?php 
                            while ($row = mysqli_fetch_array($query)) {
                              
                                $i += 1;
                                $total += $row["display_fulltime_price"];
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td class="text-center"><?php echo $row["date_booking"]; ?></td>
                            <td class="text-center"><?php echo $row["time_booking"]; ?></td>
                            <td class="text-center"><?php echo $row["date_booking"]; ?></td>
                            <td class="text-center"><?php echo $row["display_fulltime_price"]; ?></td>
                        </tr>

                        <!-- Exit Loop -->
                        <?php } ?>

                        <tr>
                            <td colspan="4" class="text-right">
                                <div class="ml-auto" style="font-size: 18px;font-family: Prompt">
                                    <span class="font-weight-bold">ยอดขายทั้งหมด :</span>

                                </div>
                            </td>

                            <!-- แสดงผลรวมยอดขายทั้งหมด -->
                            <td style="font-size: 18px;font-family: Prompt">
                                <span class="font-weight-bold"> <?php echo $total; ?> บาท</span>
                            </td>
                        </tr>
                    </table>
                    <!-- Exit Else -->
                    <?php } ?>
                </div>
            </div>
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
</body>

</html>