<?php
require("function.inc.php");
// ACTION

if(isset($_POST['submit']) && $_POST['submit']=="save"){
  $name_member = mysqli_escape_string($con, $_POST['name_member']);
  //$type_member = $_POST['type_member'];
  $lastname_member = mysqli_escape_string($con, $_POST['lastname_member']);
  $Username_member = mysqli_escape_string($con, $_POST['Username_member']);
  $Password_member = mysqli_escape_string($con, $_POST['Password_member']);
  $date_member = date("Y-m-d H:i:s");
  $email_member = mysqli_escape_string($con, $_POST['email_member']);
  $address_member = mysqli_escape_string($con, $_POST['address_member']);
  $phone_member = mysqli_escape_string($con, $_POST['phone_member']);
 

  $sql = "SELECT * FROM member WHERE Username_member='$Username_member'"; // ฟังชั่นเช็ค ว่าสมัครสมาชิกชื่อซำ้กันหรือไม่
  $result = mysqli_query($con, $sql) or die(mysqli_error($con)); #ทำการอ่านค่าที่ก็บอยู่ $sql

  if ($result->num_rows > 0){
    echo "<script language='javascript'>alert('Username ซ้ำ');</script>";
    echo "<meta http-equiv='refresh' content='0;url=register.php' />";
  } else
  ///////////////// ถ้าไม่ซำ้  ให้ insert บันทึกฐานข้อมูลเลย////////////
  {
    $sql = "INSERT INTO member (type_member,name_member,lastname_member,Username_member,Password_member,email_member,address_member,phone_member) VALUES ('0','$name_member','$lastname_member','$Username_member','$Password_member','$email_member','$address_member','$phone_member')";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
	

  }
  
  if($result){
	echo "สมัครสมาชิก สำเร็จแล้ว";
echo "<meta http-equiv='refresh' content='0;url=index.php' />";

	}else{
echo"<h3>ERROR : ไม่สามารถแก้ไข</h3>";
echo "<META HTTP-EQUIV=\"REFRESH\" CONTENT=\"1; URL=index.php?status=failue\">";
}
}
  
  


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $sys_title;?></title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="e-commerce site well design with responsive view." />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link href="css/stylesheet.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link href="owl-carousel/owl.carousel.css" type="text/css" rel="stylesheet" media="screen" />
  <link href="owl-carousel/owl.transitions.css" type="text/css" rel="stylesheet" media="screen" />
  <script src="javascript/jquery-2.1.1.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="javascript/jstree.min.js"></script>
  <script type="text/javascript" src="javascript/template.js"></script>
  <script src="javascript/common.js" type="text/javascript"></script>
  <script src="javascript/global.js" type="text/javascript"></script>
  <script src="owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
</head>

<body class="account-register col-2">
  <?php
  include 'header.php'
  ?>

  <div class="container">
    <ul class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-home"></i></a></li>
      <li><a href="#">Account</a></li>
      <li><a href="register.html">Register</a></li>
    </ul>
    <div class="row">
      <div class="col-sm-3 hidden-xs column-left" id="column-center">
        <div class="column-block">

        </div>
      </div>
      <div class="col-sm-9" id="content">
        <h1>Register</h1>
        <form class="form-horizontal" method="post" action="">
          <fieldset id="account">
            <div style="display: none;" class="form-group required">
              <label class="col-sm-2 control-label">Customer Group</label>
              <div class="col-sm-10">
                <div class="radio">
                  <label>
                    <input type="radio" checked="checked" value="1" name="customer_group_id">
                    Default</label>
                </div>
              </div>
            </div>
            <div class="form-group required">
              <label for="input-firstname" class="col-sm-2 control-label">ชื่อ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="input-firstname" placeholder="First Name" name="name_member" required="">
              </div>
            </div>
            <div class="form-group required">
              <label for="input-lastname" class="col-sm-2 control-label">นามสกุล</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="input-lastname" placeholder="Last Name" name="lastname_member" required="">
              </div>
            </div>
            <div class="form-group required">
              <label for="input-email" class="col-sm-2 control-label">อีเมลล์</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="input-email" placeholder="E-Mail" name="email_member" required="">
              </div>
            </div>
            <div class="form-group required">
              <label for="input-telephone" class="col-sm-2 control-label">เบอร์โทร</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="input-telephone" placeholder="Telephone" name="phone_member" required="">
              </div>
            </div>
 

         

            <div class="form-group required">
              <label for="input-telephone" class="col-sm-2 control-label">ที่อยู่</label>
              <div class="col-sm-10">
                <TEXTAREA class="w3-input w3-border w3-sand" name="address_member" ROWS="10" COLS="55"></TEXTAREA>
              </div>
            </div>
           

            

          </fieldset>

          <fieldset>
            <legend>Your Password</legend>
            <div class="form-group required">
              <label for="input-password" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
			  
			  <input type="text" class="form-control" id="input-Username_member" placeholder="Username_member" name="Username_member" required="">

              </div>

            </div>


            <div class="form-group required">
              <label for="input-password" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="Password_member">
              </div>

            </div>


          </fieldset>



           
              <input type="submit" name="submit" class="btn btn-success" value="save">
         
        </form>
      </div>
    </div>
  </div>
  <footer>
   
      <?php
      include 'footter.php'
      ?>
</body>

</html>