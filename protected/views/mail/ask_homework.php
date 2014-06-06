<div style="font:12px Arial, Helvetica, sans-serif">
   <h2> Hi <?php echo $sendTo; ?>, </h2>
   <p> <?php echo $homeworkQuestion['name']; ?> has ask his/her homework question. Here details: </p> 
   <p> 
      Name : <?php echo $homeworkQuestion['name']; ?> <br/>
      Email : <?php echo $homeworkQuestion['email']; ?> <br/>
      Phone Number : <?php echo $homeworkQuestion['phone_num']; ?> <br/>
      Grade : <?php echo $homeworkQuestion['grade']; ?> <br/>
      Course : <?php echo $homeworkQuestion['course']; ?> <br/>
      School : <?php echo $homeworkQuestion['school']; ?> <br/>
      Register User : <?php if ($homeworkQuestion['is_register_user']) echo 'Yes'; else echo 'No'; ?> <br/>
      Hear about the site : <?php echo $homeworkQuestion['how_know']; ?> <br/>
   </p>
   <p>
      <strong> Question: </strong> <br/>
      <?php echo $homeworkQuestion['question']; ?>
   </p>
   <p>
      <strong>Attach file list:</strong><br/>
      <?php
      foreach ($attachFiles as $file) {
         echo '<a href="' . Yii::app()->getBaseUrl(true) . '/uploads/' . $file->file_name . '">click to download file</a><br/>';
      }

      ?>
   </p>
   <br/>
   <p>Thanks,</p>
   <p>Frankly Math</p>
</div>