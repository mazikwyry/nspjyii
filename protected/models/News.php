<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $date_added
 * @property string $image
 * @property string $type
 * @property string $author
 */
class News extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, author', 'required'),
			array('title, author', 'length', 'max'=>100),
			array('image', 'length', 'max'=>200),
			array('type', 'length', 'max'=>4),
			array('image', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, content, date_added, image, type, author', 'safe', 'on'=>'search'),
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
		  'comments'=>array(self::HAS_MANY, 'Comments', 'news_id', 'order'=>"date_added DESC", 'condition'=>'visible=1'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Tytuł',
			'content' => 'Treść',
			'date_added' => 'Data dodania',
			'image' => 'Zdjęcie/Grafika',
			'type' => 'Typ',
			'author' => 'Autor',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('date_added',$this->date_added,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('author',$this->author,true);
		$criteria->order = 'date_added DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function oftype($type){
        
        $criteria = new CDbCriteria;
        $criteria->order = 'date_added DESC';
        $criteria->compare('type',$type,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}