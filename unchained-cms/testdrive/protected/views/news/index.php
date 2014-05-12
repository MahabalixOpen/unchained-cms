<?php/* @var $this NewsController */?>
<?php $heading = (Yii::app()->name). " News"; 	$this->beginWidget('bootstrap.widgets.TbHeroUnit',array(    'heading'=>CHtml::encode($heading),)); ?>
<br/>
<?php$sql2 = "SELECT tbl_category.name AS heading , tbl_category.id AS identifierFROM tbl_categorywhere tbl_category.published = 'Y'";$connection = Yii::app()->db;$command2 = $connection->createCommand($sql2);$dataReader2=$command2->query();
while(($row=$dataReader2->read())!==false) { 	$catid = $row['identifier'];	$topcatlink = Yii::app()->baseUrl."/index.php/news?category=$catid";	$hd = $row['heading'];    $this->widget('bootstrap.widgets.TbButton', array(				'label'=>$hd,				'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'				'size'=>'large', // null, 'large', 'small' or 'mini'				'url'=>$topcatlink,));echo "&nbsp;";}?><?php $this->endWidget(); ?>
<?php$sql1 = "SELECT tbl_category.name AS heading , tbl_category.id AS identifierFROM tbl_categorywhere tbl_category.published = 'Y'";$connection = Yii::app()->db;$command1 = $connection->createCommand($sql1);$dataReader=$command1->query();while(($row=$dataReader->read())!==false) { 	$identifier = $row['identifier'];	$galleryheading =$row['heading'];	echo "<br/><hr/>";	echo "<h1 id=$galleryheading>$galleryheading</h1>";	$sql2 = "SELECT 			tbl_article.id AS idforuse,			tbl_article.heading AS artheading ,			tbl_article.content AS content  ,			tbl_article.created_timed AS create_time 			FROM tbl_article			where tbl_article.category_id = $identifier			AND			tbl_article.published = 'Y'			";	$command2 = $connection->createCommand($sql2);	$dataReader2=$command2->query();
	while(($row2=$dataReader2->read())!==false) 	{			$heading = $row2['artheading'];	$content = $row2['content'];	$create_time = $row2['created_time'];	$articleid = $row2['idforuse'];	$create_time=date('m/d/Y', $create_time);
?>
	<div id="mydiv<?php echo $count?>">	<?php		echo "<h2>$heading</h2>";		$this->widget('bootstrap.widgets.TbBadge', array(    'type'=>'success', // 'success', 'warning', 'important', 'info' or 'inverse'    'label'=>$create_time,	)); 

	$display = substr($content,0,150);
	echo "<p>$display..</p>";	$readmore = Yii::app()->baseUrl."/index.php/news?article=$articleid";	$this->widget('bootstrap.widgets.TbButton', array(    'label'=>'Read More',    'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'    'size'=>'small', // null, 'large', 'small' or 'mini'	'url'=>$readmore,));

echo "&nbsp;&nbsp;";
$catlink = Yii::app()->baseUrl."/index.php/news?category=$identifier";
$this->widget('bootstrap.widgets.TbButton', array(    'label'=>$galleryheading,    'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'    'size'=>'small', // null, 'large', 'small' or 'mini'	'url'=>$catlink,));?><br/><br/>	</div>	<?php	
	}
}
?>