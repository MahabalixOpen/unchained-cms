<?php
<?php 
<br/>
<?php
while(($row=$dataReader2->read())!==false) 
<?php
	while(($row2=$dataReader2->read())!==false) 
?>
	<div id="mydiv<?php echo $count?>">	<?php	

	$display = substr($content,0,150);
	echo "<p>$display..</p>";

echo "&nbsp;&nbsp;";
$catlink = Yii::app()->baseUrl."/index.php/news?category=$identifier";
$this->widget('bootstrap.widgets.TbButton', array(
	}
}
?>