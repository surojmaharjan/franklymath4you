<div class="header-wrapper">
   <div class="header">
      <div class="logo">
         <h1><a href="<?php echo Yii::app()->request->baseUrl; ?>"><img alt="Frankly Math" src="<?php echo Yii::app()->request->baseUrl; ?>/media/images/logo.png"></a></h1>
      </div>
      <div class="widget-right">

            <?php if(isset(Yii::app()->user->user_id)){ ?>
            <div class="login-panel">
               <ul>
                  <?php 
                  if(Yii::app()->user->role == 'student'){
                     echo '<li><a href="'.Yii::app()->request->baseUrl.'/UserProfile'.'">'.Yii::app()->user->name.'</a></li>';
                  }
                  else{
                     echo '<li><a href="'.Yii::app()->request->baseUrl.'/admin'.'">'.Yii::app()->user->name.'</a></li>';
                  }
                  ?>
                  <li class="last"><a href="<?php echo Yii::app()->request->baseUrl.'/logout'?>">Log out</a></li>
               </ul>
               </div>

            <?php
            }
            else{
            ?>
            <div class="login-panel">
            <ul>
               <li><a href="<?php echo Yii::app()->request->baseUrl.'/login'?>">Login</a></li>
               <li class="last"><a href="<?php echo Yii::app()->request->baseUrl.'/register'?>">Register</a></li>
            </ul>
            </div>
            <?php } ?>

         <div class="social-network">
            <ul>
               <li class="last"><a class="tt" href="https://twitter.com/Frank_Math" target="_blank">Twitter</a></li>
               <!--<li class="last"><a class="fb" href="#">Facebook</a></li>-->
            </ul>
         </div>
         <span><a href="#"><?php if(isset(Yii::app()->user->email)){echo Yii::app()->user->email;}?></a></span> </div>
   </div>
   <!-- end header -->
</div>