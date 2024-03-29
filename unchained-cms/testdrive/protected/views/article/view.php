<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Article', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'Update Article', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Article', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Article', 'url'=>array('admin')),
);
?>

<h1>View Article #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'heading',
		'content:html',
		array(               // related category displayed as a link
            'label'=>'Category',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->Category->name), array('category/'.CHtml::encode($data->id)))
        ),
		'published',
		'frontpage',
		'article_order',
		'tags',
		'created_time',
		'modified_date',
		'last_visit_time',
	),
)); ?>
