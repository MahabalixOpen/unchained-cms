<?php
/**
 * Copyright (c) 2011
 * @license LGPL 3.0
 * @version 0.1
 */

/**
 * EEditArea is an Edit Area extension 
 *
 * @author konarski.t
 * 
 * example usage:

	$this->widget('application.extensions.editarea.EEditArea', array(
																	'name'=>'name',
																	'value'=>'value',
																	'htmlOptions'=>array(
																						'syntax'=>'php',
																						'allow_toggle'=>'false'
																						)
																	)
				);

 */
class EEditArea extends CInputWidget
{

	private $options = array(
		'cols'=>110,
		'rows'=>11,
		'class'=>'textarea_class',
		'start_highlight'=>true, // to display with highlight mode on start-up
		'syntax'=> 'css', // syntax to be uses for highgliting
		'value'=> '', 
		'language'=>'en', // language
		'allow_toggle'=>true // to display with highlight mode on start-up

	);
	/**
	 * Updating options
	 */
	
	private function updateOptions(){
		if (is_array($this->htmlOptions) && count($this->htmlOptions))
		{
			foreach($this->htmlOptions as $k=>$v)
			{
				$this->options[$k]=$v;
			}
		}
		$this->options['value'] = $this->value;
	}
   
	/**
	 * Executes the widget.
	 * This method registers all needed client scripts and renders
	 * the text field.
	 */
	public function init()
	{
		$this->updateOptions();
		$baseDir = dirname(__FILE__);
		$assets = Yii::app()->getAssetManager()->publish($baseDir.DIRECTORY_SEPARATOR.'assets');

		$cs = Yii::app()->getClientScript();

		$cs->registerScriptFile($assets.'/edit_area_full.js', CClientScript::POS_HEAD);
		$rand = md5(uniqid(rand(), true));
		$html = CHtml::textArea($this->options['name'], $this->options['value'],
			array(
				'rows'=>$this->options['rows'],
				'cols'=>$this->options['cols'],
				'id'=>$rand,
				'encode'=>true
			));
		unset($this->options['rows']);
		unset($this->options['cols']);
		unset($this->options['name']);
		unset($this->options['class']);
		unset($this->options['value']);

		$js = "\teditAreaLoader.init({ \n\t\tid : \"$rand\"";
		foreach($this->options as $k=>$v)
		{
			if($v===true || $v === 'true')
				$v = 'true';
			elseif($v===false || $v === 'false')
				$v = 'false';
			else
				$v = '\''.$v.'\'';
			
			$js .=",\n\t\t$k: ".$v;
		}
		$js.="\n\t});";
		Yii::app()->clientScript->registerScript($rand, $js, CClientScript::POS_READY);
		 
		echo $html;
	}
}