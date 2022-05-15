<hr>
  <div class="w3-container w3-green">
  <a href="main.php"><h5>Dashboard</h5></a>
  </div>

  <?php if ($_SESSION['mtype']==1) { ?>

  <div class="w3-bar-block">
        <a href="edit.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-edit"></i>  แก้ไขข้อมูล</a>
    <a href="admin_member.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  การจัดการสมาชิก</a>
    <a href="admin_display.php" class="w3-bar-item w3-button w3-padding"><i class="	fa fa-flag"></i>  การจัดการห้องพัก</a>
  
    <a href="admin_booking.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-calendar-plus-o"></i>  การจัดการการจอง</a>

    <a href="admin_report.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sticky-note"></i>  รายงานทั้งหมด</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user-times"></i>  ออกจากระบบ</a>
    <?php } else { ?>
        <a href="edit.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-edit"></i>  แก้ไขข้อมูล</a>
        
        <a href="logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user-times"></i>  ออกจากระบบ</a>

  </div>
  <p><?php } else($_SESSION['mtype']==2) { ?></p>
  <p>USERNAME : <span class="style1"><?php echo $_SESSION['mname']; ?> </span> </p>
<ul class="dropdown-menu"></ul>
<li><a href="."><i class="glyphicon glyphicon-home"></i> <span>หน้าหลัก</span></a></li>    
<li><a href="profile.php"><i class="fa fa-fw fa-wrench"></i><span>แก้ไขข้อมูลส่วนตัว</span></a></li> 

<li><a href="manage_emp.php"><i class="fa fa-users"></i><span>การจัดการสมาชิก</span></a></li>  
  <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> <span>ออกจากระบบ</span></a></li>  
			   <?php } ?>
  <?php } ?>
    </aside>
</nav>