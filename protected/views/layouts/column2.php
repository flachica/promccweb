<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container-fluid">
	<div class="row-fluid">
      <div class="span12">
		   <?php echo $content; ?>
      </div>
	</div><!-- content -->
</div>
<div class="container-fluid">
	<div class="row-fluid">
      <div class="span12">
	      <?php
		      $this->beginWidget('zii.widgets.CPortlet', array(
			      'title'=>'Operaciones',
		      ));
		      $this->widget('zii.widgets.CMenu', array(
			      'items'=>$this->menu,
			      'htmlOptions'=>array('class'=>'operations'),
		      ));
		      $this->endWidget();
	      ?>
      </div>
	</div>
</div>
<?php $this->endContent(); ?>
