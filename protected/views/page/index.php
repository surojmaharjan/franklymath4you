<div>
	<h1>View Page</h1>
	<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
		<thead>
			<tr>
				<th scope="col" class="rounded-company"></th>
				<th scope="col" class="rounded">Page Name</th>
				<th scope="col" class="rounded">Edit</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($models as $model): ?>
				<tr>
					<td>&nbsp;</td>
					<td><?php echo $model->name ?></td>
					<td><a href="<?php echo $this->createUrl('page/edit',array('id'=>$model->id));?>">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/media/admin/images/user_edit.png" alt="" title="" border="0" />
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<div class="cb" style="margin:20px 0">
		<?php
		$this->widget('CLinkPager', array(
			'pages' => $pages,
		))
		?>
	</div>
</div>