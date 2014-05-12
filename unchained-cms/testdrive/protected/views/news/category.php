<?php
/* @var $this NewsController */
?>

<br/>

<?php$category = Yii::app()->request->getParam('category');$sql2 = "SELECT tbl_category.name AS heading , tbl_category.id AS identifierFROM tbl_categorywhere tbl_category.published = 'Y' AND tbl_category.id = $category";
$connection = Yii::app()->db;$command2 = $connection->createCommand($sql2);$dataReader2=$command2->query();
while(($row=$dataReader2->read())!==false) { $button = '#'.$row['heading'];$hd = $row['heading'];  $this->widget('bootstrap.widgets.TbButton', array(    'label'=>$hd,    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'    'size'=>'large', // null, 'large', 'small' or 'mini'	'url'=>$button,));
}
?>


<?php$sql1 = "SELECT tbl_category.name AS heading , tbl_category.id AS identifierFROM tbl_categorywhere tbl_category.published = 'Y'";
$connection = Yii::app()->db;$command1 = $connection->createCommand($sql1);$dataReader=$command1->query();
while(($row=$dataReader->read())!==false) { 	$identifier = $row['identifier'];	$galleryheading =$row['heading'];	echo "<br/><hr/>";	echo "<h1 id=$galleryheading>$galleryheading</h1>";				$sql2 = "SELECT 		tbl_article.id AS articleid ,		tbl_article.heading AS artheading ,		tbl_article.content AS content  ,		tbl_article.create_time AS create_time 		FROM tbl_article		where tbl_article.category_id = $identifier		AND		tbl_article.published = 'Y'		";
	$command2 = $connection->createCommand($sql2);	$dataReader2=$command2->query();	while(($row2=$dataReader2->read())!==false) 	{		$heading = $row2['artheading'];	$content = $row2['content'];	$create_time = $row2['create_time'];	$create_time=date('m/d/Y', $create_time);	$articleid = $row2['articleid'];?>
		<div id="mydiv<?php echo $count?>">	<?php	
	echo "<h2>$heading</h2>";		$this->widget('bootstrap.widgets.TbBadge', array(    'type'=>'success', // 'success', 'warning', 'important', 'info' or 'inverse'    'label'=>$create_time,)); 

$readmore = Yii::app()->baseUrl."/index.php/news?article=$articleid";$catlink = Yii::app()->baseUrl."/index.php/news?category=$identifier";$backlink = Yii::app()->baseUrl."/index.php/news";

	$display = substr($content,0,300);	echo "<p>$display...</p>";	?>	</div>	<?php

$this->widget('bootstrap.widgets.TbButton', array(    'label'=>'Read More',    'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'    'size'=>'small', // null, 'large', 'small' or 'mini'	'url'=>$readmore,));

echo "&nbsp;&nbsp;";$this->widget('bootstrap.widgets.TbButton', array(    'label'=>'Back to News Page',    'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'    'size'=>'small', // null, 'large', 'small' or 'mini'	'url'=>$backlink,));
echo "<br/><br/>";	}}?>