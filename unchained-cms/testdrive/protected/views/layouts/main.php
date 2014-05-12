<?php Yii::app()->bootstrap->register(); ?>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('bootstrap.widgets.TbNavbar',array(
		'color' => TbHtml::NAVBAR_COLOR_INVERSE,
    'brandLabel' => Yii::app()->name,
    'collapse' => false,
	//'display' => null, // default is static to top
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbNav',
     		'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				//array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				//array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
				array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
				array('url'=>array('/auditTrail'), 'label'=>'Audit Trail', 'visible'=>Yii::app()->user->isAdmin()),
			),
			),
			),
		)); ?>
		
		
			
		
		<?php
		/* 
		 *In case you want to use YiiSmartMenu, you can uncomment the following lines
		 * YiiSmartMenu does a simple access check to see whether a menu item is accessible for current user
		 * and decides whether a menu item should be visible or not
		 *
		 */
		 /*$this->widget('application.components.YiiSmartMenu',
			array(
				'partItemSeparator'=>'.',	
				'type'=>'pills',
				'stacked'=>false,
				'upperCaseFirstLetter'=>true,	
				'items'=>array(				
							array('label'=>'List article',
							'url'=>array('index')),	
							array('label'=>'Create article', 'url'=>array('create')),                 
								),
				));  
		*/		
		
	
		?>
	
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

<!-- LeftSide Bar and Right Side Bar -->
<?php
	/*
	 *In case you want to use left and right sidebars you can 
	 *uncomment the following code
		$this->beginWidget('application.extensions.rightsidebar.RightSidebar');
		//put your sidebar content here
		$this->endWidget();
	 * Replace right with left wherever appropriate. Use wisely!	
	 */
?>
</body>
</html>
