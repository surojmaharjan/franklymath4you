<div>
   <h1>Error <?php if(isset($code)){echo $code;}else{echo " Page";} ?></h1>
   <p><?php if(isset($message)){echo CHtml::encode($message);} ?></p>
</div>