<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?> 
<div class='main dBlock w100 hidden'>
    <div id="content">
		<?php echo $content; ?>
	</div><!-- content -->

	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Ver',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
    
</div>
	

<?php $this->endContent(); ?>