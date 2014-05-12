<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'heading'); ?>
		<?php echo $form->textField($model,'heading',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'heading'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php //echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50));
		?>
		<?php $this->widget('yiiwheels.widgets.redactor.WhRedactor', array(
//		'name' => 'content',
		 'model' => $model,
    'attribute' => 'content',
	 ));?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id', CHtml::listData(Category::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'published'); ?>
		<?php echo $form->radioButtonList($model,'published',array('Y'=>'Y','N'=>'N')); ?>
		<?php echo $form->error($model,'published'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frontpage'); ?>
		<?php echo $form->radioButtonList($model,'frontpage',array('Y'=>'Y','N'=>'N')); ?>
		<?php echo $form->error($model,'frontpage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'article_order'); ?>
		<?php echo $form->textField($model,'article_order'); ?>
		<?php echo $form->error($model,'article_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textArea($model,'tags',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	
	<?php if (!$model->isNewRecord) { ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'created_time'); ?>
		<?php echo $form->textField($model,'created_time',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'created_time'); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'modified_date'); ?>
		<?php echo $form->textField($model,'modified_date'); ?>
		<?php echo $form->error($model,'modified_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_visit_time'); ?>
		<?php echo $form->textField($model,'last_visit_time',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'last_visit_time'); ?>
	</div>
	<?php } ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->