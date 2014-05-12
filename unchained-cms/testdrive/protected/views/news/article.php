<?php
/* @var $this NewsController */
?>

<?php$article = Yii::app()->request->getParam('article');$model=article::model()->findByPk($article);$galleryheading =$row['heading'];echo "<h1 id=$galleryheading>$galleryheading</h1>";
$sql2 = "SELECT 		tbl_article.heading AS artheading ,		tbl_article.content AS content  ,		tbl_article.category_id AS catid  ,		tbl_article.created_time AS create_time 		FROM tbl_article		where tbl_article.id = $article		AND		tbl_article.published = 'Y'		";
	$connection = Yii::app()->db;	$command2 = $connection->createCommand($sql2);	$dataReader2=$command2->query();	while(($row2=$dataReader2->read())!==false) 	{		
	$heading = $row2['artheading'];	$content = $row2['content'];	$create_time = $row2['create_time'];	$catid = $row2['catid'];	$create_time=date('m/d/Y', $create_time);?>
		<div id="mydiv<?php echo $count?>">	<?php	
	echo "<h1>$heading</h1>";	
	$this->widget('bootstrap.widgets.TbBadge', array(    'type'=>'success', // 'success', 'warning', 'important', 'info' or 'inverse'    'label'=>$create_time,)); 
	echo "<p>$content</p>";
	?>	</div>	<?php

$catlink = Yii::app()->baseUrl."/index.php/news?category=$catid";$backlink = Yii::app()->baseUrl."/index.php/news";$backtocatheading = "";
$sql3 = "SELECT tbl_category.name AS headingFROM tbl_categorywhere tbl_category.published = 'Y' AND tbl_category.id = $catid";$connection = Yii::app()->db;$command3 = $connection->createCommand($sql3);$dataReader3=$command3->query();
while(($row=$dataReader3->read())!==false) { $backtocatheading = $row['heading'];}
$this->widget('bootstrap.widgets.TbButton', array(    'label'=>$backtocatheading,    'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'    'size'=>'small', // null, 'large', 'small' or 'mini'	'url'=>$catlink,));
echo "&nbsp;&nbsp;";
$this->widget('bootstrap.widgets.TbButton', array(    'label'=>'Back to News Page',    'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'    'size'=>'small', // null, 'large', 'small' or 'mini'	'url'=>$backlink,));
echo "<br/><br/>";	
	}
			
?>
