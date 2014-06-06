<div style="font:12px Arial, Helvetica, sans-serif">
   <h2> Hi <?php echo $sendTo; ?>, </h2>
   <p> <?php echo $parctricExamRequest['name']; ?> has request practice exam. Here details: </p> 
   <p> 
      Name : <?php echo $parctricExamRequest['name']; ?> <br/>
      Email : <?php echo $parctricExamRequest['email']; ?> <br/>
      Phone Number : <?php echo $parctricExamRequest['phone_num']; ?> <br/>
      Grade : <?php echo $parctricExamRequest['grade']; ?> <br/>
      Course : <?php echo $parctricExamRequest['course']; ?> <br/>
      School : <?php echo $parctricExamRequest['school']; ?> <br/>
      Exam Type : <?php echo $parctricExamRequest['exam_type']; ?> <br/>
      Exam Date : <?php echo $parctricExamRequest['exam_date']; ?> <br/>
      Register User : <?php if($parctricExamRequest['is_register_user']) echo 'Yes'; else echo 'No'; ?> <br/>
   </p>
   <p>
      <strong> Exam Topics : </strong> <br/>
      <?php echo $parctricExamRequest['exam_topics']; ?>
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