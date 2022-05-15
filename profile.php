
<?php
include 'function.inc.php';

include 'chk_sess.php';

$query = sprintf('select * from member where id_member="%s" ',$_SESSION['mid']);

$result = mysqli_query($con,$query);
$rs = mysqli_fetch_array($result);

$Username_member=$rs['Username_member'];
$Password_member=$rs['Password_member'];
$name_member=$rs['name_member'];
$lastname_member=$rs['lastname_member'];
$email_member=$rs['email_member'];

$address_member=$rs['address_member'];

$phone_member=$rs['phone_member'];

?>

<!DOCTYPE html>

<html lang="en">
<head>
<title><?php echo $sys_title ?></title>
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
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="profile.php">แก้ไขข้อมูลส่วนตัว</a></li>
    </ul>
    <div class="row">
        <div class="col-sm-3 hidden-xs column-left" id="column-center">
            <div class="column-block">
                
            </div>
        </div>
        <div class="col-sm-9" id="content">
            <h1>แก้ไขข้อมูลส่วนตัว</h1>
      <form class="form-horizontal" enctype="multipart/form-data" method="post" action="edit_profile2.php">
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
                            <input type="text" class="form-control" id="input-firstname" placeholder="First Name" name="name_member" value="<?php echo $rs['name_member']; ?>">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-lastname" class="col-sm-2 control-label">นามสกุล</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-lastname" placeholder="Last Name" name="lastname_member" value="<?php echo $rs['lastname_member']; ?>">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-email" class="col-sm-2 control-label">อีเมลล์</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="input-email" placeholder="E-Mail" name="email_member" value="<?php echo $rs['email_member']; ?>">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-telephone" class="col-sm-2 control-label">เบอร์โทร</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-telephone" placeholder="Telephone" name="phone_member" value="<?php echo $rs['phone_member']; ?>">
                        </div> 
                    </div>

                  




                    <div class="form-group required">
                        <label for="input-telephone" class="col-sm-2 control-label">ที่อยู่</label>
                        <div class="col-sm-10">
     <TEXTAREA class="w3-input w3-border w3-sand" name="address_member" ROWS="10" COLS="70"><?php echo $rs['address_member']; ?></TEXTAREA>
                        </div>
                    </div>

            
                   
                </fieldset>
                <fieldset>
                    <legend>Your Password</legend>
                 
                  <div class="form-group required">
                        <label for="input-firstname" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                      <?php echo $rs['name_member']; ?>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label for="input-password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
     <input type="password" class="form-control" id="input-password" placeholder="Password" name="Password_member" type="password" value="<?php echo $rs['Password_member']; ?>">
                        </div>
                        
                    
                </fieldset>
               
<input name="id_edit" type="hidden" id="id_edit" value="<?php echo $rs['id_member']?>" />  


                <div class="buttons">
                    <div class="pull-right">
                        <input type="submit" class="btn btn-primary" value="Continue">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<footer>
  <div class="container">
  <hr>
   

<?php
include 'footter.php'
?>
</body>
</html>
