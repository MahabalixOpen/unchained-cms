<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>

<!--FRONTPAGE ARTICLE-->
<div class="row-fluid">
<div class="span9">

<table  cellpadding="10" cellspacing="10"/>	

<?php 

$sql = "SELECT 	tbl_article.id AS identification ,	tbl_article.heading AS heading , tbl_article.content AS content  FROM tbl_article , tbl_category 
where tbl_category.id=tbl_article.category_id 	AND 	tbl_category.published = 'Y' AND tbl_article.published = 'Y' AND tbl_article.frontpage = 'Y';";

$connection = Yii::app()->db;
$command1 = $connection->createCommand($sql);
$dataReader=$command1->query();


function truncate($string,$length=100,$append="&hellip;") {
  $string = trim($string);

  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n",$string);
    $string = array_shift($string) . $append;
  }

  return $string;
}
$counter=0;
while(($row=$dataReader->read())!==false) { 
$counter++;
if($counter%5==0) {echo "<tr>";}
$heading = $row['heading'];
$content = truncate($row['content']);
$theid = $row['identification'];
//$this->beginWidget('bootstrap.widgets.TbHeroUnit');
echo "<td style=\"border:1px #666666; border-radius:20px;\" width=\"200\" >";
echo "<br/><h4>$heading</h4><br>";
echo "$content<br/>";
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'More..',
    'type'=>'null', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'url'=>'/index.php/news?article='.$theid,
));
echo "</td>";
if($counter%4==0) {echo "</tr>";}
//$this->endWidget();
}
?>

</table>
</div>
