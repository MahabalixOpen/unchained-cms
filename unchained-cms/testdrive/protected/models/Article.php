<?php

/**
 * This is the model class for table "{{article}}".
 *
 * The followings are the available columns in table '{{article}}':
 * @property integer $id
 * @property string $heading
 * @property string $content
 * @property integer $category_id
 * @property string $published
 * @property string $frontpage
 * @property integer $article_order
 * @property string $tags
 * @property string $created_time
 * @property string $modified_date
 * @property string $last_visit_time
 *
 * The followings are the available model relations:
 * @property Category $category
 */
class Article extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{article}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('heading, category_id, created_time, modified_date, last_visit_time', 'required'),
			array('category_id, article_order', 'numerical', 'integerOnly'=>true),
			array('heading', 'length', 'max'=>255),
			array('published, frontpage', 'length', 'max'=>1),
			array('created_time, last_visit_time', 'length', 'max'=>20),
			array('content, tags', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, heading, content, category_id, published, frontpage, article_order, tags, created_time, modified_date, last_visit_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'heading' => 'Heading',
			'content' => 'Content',
			'category_id' => 'Category',
			'published' => 'Published',
			'frontpage' => 'Frontpage',
			'article_order' => 'Article Order',
			'tags' => 'Tags',
			'created_time' => 'Created Time',
			'modified_date' => 'Modified Date',
			'last_visit_time' => 'Last Visit Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('heading',$this->heading,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('published',$this->published,true);
		$criteria->compare('frontpage',$this->frontpage,true);
		$criteria->compare('article_order',$this->article_order);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('created_time',$this->created_time,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('last_visit_time',$this->last_visit_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
