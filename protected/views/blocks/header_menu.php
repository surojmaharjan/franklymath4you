<div class="navigation-container-wrapper">
	<div class="navigation-container">
		<ul>
			<li class="first <?php if ($active_tab == 1)
	echo 'active' ?>"><a href="<?php echo Yii::app()->request->baseUrl . '/home' ?>">Home</a></li>
			<li class="<?php if ($active_tab == 2)
					echo 'active' ?>"><a href="<?php echo Yii::app()->request->baseUrl . '/howitworks' ?>">How It Works</a></li>
			<li class="<?php if ($active_tab == 3)
					echo 'active' ?>"><a href="<?php echo Yii::app()->request->baseUrl . '/getstarted' ?>">Get Started</a></li>
			<li class="<?php if ($active_tab == 4)
					echo 'active' ?>"><a href="<?php echo Yii::app()->request->baseUrl . '/whoisthisfor' ?>">Who Is This For</a></li>
			<li class="<?php if ($active_tab == 5)
					echo 'active' ?>"><a href="<?php echo Yii::app()->request->baseUrl . '/whychoosethismethod' ?>">Why Choose This Method</a></li>
			<li class="<?php if ($active_tab == 6)
				echo 'active' ?>"><a href="<?php echo Yii::app()->request->baseUrl . '/aboutme' ?>">About Me</a></li>
		</ul>
	</div>
</div>