<?php
require 'function.inc.php';

include 'chk_sess.php';

$id=$_GET['id'];
error_reporting (E_ALL ^ E_NOTICE);


$sqld = "SELECT * FROM display WHERE display_id='$id' ";
          $resultd = mysqli_query($con,$sqld);
          $rsd= mysqli_fetch_array($resultd);  



$query = "select * from member where id_member='$_SESSION[mid]'";

//print_r($query);
$result = mysqli_query($con,$query);
$rs = mysqli_fetch_array($result);

if(isset($_POST['submit']) && $_POST['submit']=="save"){

  $id = $_POST['id'];
  $startday = $_POST['startday'];
  $starttime = $_POST['starttime'];
  $comment = $_POST['comment'];
  $book_type_time = $_POST['book_type_time'];
  $check_out = $_POST['check_out'];
  $time_checkout = $_POST['time_checkout'];



  $sql = "SELECT * FROM booking WHERE display_id = '$id' AND
  ((date_booking BETWEEN '$startday' AND '$check_out')
  OR
  (check_out BETWEEN '$startday' AND '$check_out')
  OR
  ('$startday' BETWEEN date_booking AND check_out)
  OR
  ('$check_out' BETWEEN date_booking AND check_out ))";
  
  $result = mysqli_query($con,$sql);
  $num=mysqli_num_rows($result);
  if($num>0){
      echo "<script>";
      echo "alert('ห้องนี้มีการจองแล้วในวันที่เลือก!');";
      echo "window.history.back();";
      echo "</script>";
  }else{
    $date = (strtotime($check_out) - strtotime($startday) )/  ( 60 * 60 * 24 );
    $total = $book_type_time * $date;
    $quert = "INSERT INTO booking (date_booking,display_id,id_member,comment,book_type_time,member_status,slips_img,check_out)
    VALUES ('$startday','$id','$rs[id_member]','$comment','$total','1','0','$check_out')";
///print_r($quert);

    $result1 = mysqli_query($con,$quert) or die(mysqli_error($con));
  }
  if ($result1) {  
    echo "<h3><center>เพิ่มข้อมูลเรียบร้อย</h3></center>";
echo "<meta http-equiv='refresh' content='1;url=index.php' />";
  }else{  
    echo "แก้ไขไม่สำเร็จ";
echo "<meta http-equiv='refresh' content='0;url=booking_detail.php' />";
  }
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo$sys_title;?></title>
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="stylenew.css">

<script src="javascript/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="javascript/jstree.min.js" type="text/javascript"></script>
<script src="javascript/template.js" type="text/javascript" ></script>
<script src="javascript/common.js" type="text/javascript"></script>
<script src="javascript/global.js" type="text/javascript"></script>
<script src="owl-carousel/owl.carousel.min.js" type="text/javascript"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<!------ Include the above in your HEAD tag ---------->

  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>   
 <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css">
        <script>
            $().ready(function(e) {

                var popupEvent = function() {
                    //弹出层中的事件
                }

                $('#popupReturn').hunterPopup({
                    width: '180px',
                    height: '200px',
                    title: "รายชื่อทั้งหมด",
                    content: $('#tableContent'),
                    event: popupEvent
                });

            });
        </script>




  





</head>
<body class="blog col-2">

<?php
include 'header.php'
?>

<?php
$id=$_GET['id'];
$sqlm = "SELECT * FROM member WHERE id_member='$id' ";
          $resultm = mysqli_query($con,$sqlm);
          $rsm= mysqli_fetch_array($resultm); 
?>
<div class="container">
  <ul class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-home"></i></a></li>
      <li><a href="about.php">รายละเอียด <?php echo $rsd["display_id"]; ?></a></li>
    </ul>
<div class="row">
    <div id="content" class="col-sm-9">
      <div class="blog1 blog">
       




      <p align="center"><img src="image/Tentrental/<?php echo $rsd['display_img']; ?>" style="width:350px; height:350px;">&nbsp;</p>
      <p align="center"><?php echo $rsd['display_detail']; ?>&nbsp;</p>
      <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
<fieldset>
<div class="col-md-9">
  
    <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-8 inputGroupContainer"><center>
                              ฟอร์มจอง<?php echo $rsd["display_name"]; ?>
                            </center>
                               <div class="input-group"></div>
                            </div>
                         </div>


                     
                    


  <div class="form-group">
                            <label class="col-md-4 control-label">ชื่อ:</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                              <?php echo $rs['name_member']; ?></div>
            
                            </div>
                         </div>





  <div class="form-group">
                            <label class="col-md-4 control-label">นามสกุล :</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                              <?php echo $rs['lastname_member']; ?></div>
            
                            </div>
                         </div>




  <div class="form-group">
                            <label class="col-md-4 control-label">อเีมล :</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group">
                              <?php echo $rs['lastname_member']; ?></div>
            
                            </div>
                         </div>









   <div class="form-group">
    <label class="col-md-4 control-label"></label>
     <div class="col-md-8 inputGroupContainer">


    </label> <input class="w3-radio" type="hidden" name="book_type_time" value="<?php echo $rsd["display_fulltime_price"]; ?>">
    <label>เต็มวัน :<?php echo $rsd["display_fulltime_price"]; ?></label>
            </div>
                         </div>


                         




                        


                         <div class="form-group">
                            <label class="col-md-4 control-label">วันที่เช็คอิน</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                               <input id="date" name="startday" class="form-control" value="<?php echo Date('Y-m-d');?>" type="date" required="" min="<?php echo Date('Y-m-d');?>" ></div>
            
                            </div>
                         </div>

 <?php if($full=='0')
 { ?>
                         <div class="alert alert-danger">
                          <strong>ขออภัย!</strong>คอร์สนี้มีผู้ใช้บริการแล้ว...
                        </div>
                        <?php } ?>


                       

                        
                        
                        
                         <div class="form-group">
                            <label class="col-md-4 control-label">วันที่เช็คเอ้าท์</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                               <input id="date" name="check_out" class="form-control" value="" type="date" required="" min="<?php echo Date('Y-m-d');?>" ></div>
            
                            </div>
                         </div>
                         
                         
                         
                  
                         
                         
                         
                         

                         <div class="form-group">
                            <label class="col-md-4 control-label">หมายเหตุ</label>
                            <div class="col-md-8 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                                <textarea id="comment" name="comment" class="form-control"></textarea></div>
                            </div>
                         </div>





                        <input name="id" type="hidden" value="<?php echo $rsd["display_id"]; ?>" /> 
</div>

<div class="col-md-3">
  
</div> 
</fieldset>
                    </div>
          </tbody>

          <div class="buttons">
            <div class="pull-right">
              <input type="submit" name="submit" class="btn btn-primary" value="save">
            </div>
          </div>
    
        </TABLE>
       
      </FORM>   

        </div>


    <TD>&nbsp;</TD>
            <TD>&nbsp;</TD>
          </TR>
          <TR>
           <TD>&nbsp;</TD>
            <TD>
            
        
      </FORM>      
        </div>

     
  
    <!-- end blog-home -->

 </div>
  </div>
</center>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script type="text/javascript">
        $(window).load(function() {
            // The slider being synced must be initialized first
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 170,
                itemMargin: 10,
                asNavFor: '#slider'
            });
            
            $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel"
            });
        });
        
        $(window).load(function() {
            // The slider being synced must be initialized first
            $('#carousel-mobile').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 90,
                itemMargin: 5,
                asNavFor: '#slider-mobile'
            });
            
            $('#slider-mobile').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel-mobile"
            });
        });
    </script>
    




 <script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js"></script>
    <script language="javascript">
        $(document).ready(function() {
            $('a[id^="parts"]').fancybox({
                'width'             : '40%',
                'autoScale'         : true,
                'transitionIn'      : 'none',
                'transitionOut'     : 'none',
                'type'              : 'iframe'
            });
        });
        function add_parts() {
            if (document.getElementById('pid').value=='' || document.getElementById('pamount').value=='') {
                alert('กรุณาเลือกอะไหล่และป้อนจำนวน');
            } else {
                if (parseInt(document.getElementById('pamount').value)>parseInt(document.getElementById('pstock').value)) {
                    alert('จำนวนอะไหล่ไม่พอ');
                    document.getElementById('pamount').value='';
                } else {
                    document.getElementById('frame1').src='add_jobs_parts_item.php?sid='+document.getElementById('sess_id').value+'&pid='+document.getElementById('pid').value+'&pamount='+document.getElementById('pamount').value+'&pname='+document.getElementById('pname').value+'&punit='+document.getElementById('punit').value;
                    
                    document.getElementById('pname').value='';
                    document.getElementById('pid').value='';
                    document.getElementById('pamount').value='';
                    document.getElementById('punit').value='';
                    document.getElementById('pstock').value='';
                }
            }
        }
    </script>


</div>

     
    <div class="container">
      <hr>

    <?php
include 'footter.php'
?>

</body>
</html>
