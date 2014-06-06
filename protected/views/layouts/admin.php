<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
 <?php
      //-------------------  add css/js script here  -------------------//
      $script = Yii::app()->clientScript;
      $script->registerCssFile(Yii::app()->request->baseUrl . '/media/admin/style.css');
      $script->registerScriptFile(Yii::app()->request->baseUrl . '/media/admin/clockp.js');
      $script->registerScriptFile(Yii::app()->request->baseUrl . '/media/admin/clockh.js');
      $script->registerScriptFile(Yii::app()->request->baseUrl . '/media/js/jquery.js');
      ?>
<script type="text/javascript">
  $(document).ready(function() {
    $('.ask').jConfirmAction();
  });
</script>
</head>
<body>
<div id="main_container">
  <div class="header">
    <div class="logo"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/media/images/logo.png" alt="" title="Site Logo" border="0" /></a></div>

    <div class="right_header">Welcome Admin  | <a href="<?php echo Yii::app()->request->baseUrl;?>/home/logout" class="logout">Logout</a></div>
    <div id="clock_a"></div>
    </div>
    <div class="main_content">
    <div class="menu">
    <ul>
        <!--<li><a class="current" href="<?php echo Yii::app()->request->baseUrl?>/admin">Dashboard</a></li>
        <li><a href="<?php echo Yii::app()->request->baseUrl?>/admin">Question</a></li>
        <li><a href="<?php echo Yii::app()->request->baseUrl?>/admin" title="">Members</a></li> -->
       
        <li><a href="<?php echo Yii::app()->request->baseUrl?>/admin/setting">Site Setting</a></li>
        <li><a href="<?php echo Yii::app()->request->baseUrl?>/admin/editProfile">Edit Profile</a></li>
        <li><a href="<?php echo Yii::app()->request->baseUrl?>/page" title="">Page</a></li>
        </ul>
    </div>
    <div class="center_content">
    <div class="right_content">
<?php echo $content;?>
     </div><!-- end of right content-->
  </div>   <!--end of center content -->
    <div class="clear"></div>
    </div> <!--end of main content-->
    <div class="footer">
      <div class="left_footer">ADMIN PANEL</div>
      <div class="right_footer">
          <span>Contact us</span>
          <a href="#">Erica@franklymath4you.com </a>
          <span class="phone">
          <span>(914)</span>
          806-3820
          </span>
      </div>
    </div>
</div>
</body>
</html>