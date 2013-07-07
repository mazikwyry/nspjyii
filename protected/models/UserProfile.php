<?php

/**
 * This is the model class for table "user_profile".
 *
 * The followings are the available columns in table 'user_profile':
 * @property string $ug_id
 * @property string $first_name
 * @property string $last_name
 * @property string $organization
 */
class UserProfile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserProfile the static model class
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
		return 'user_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name', 'required'),
			array('ug_id', 'length', 'max'=>20),
			array('first_name, last_name', 'length', 'max'=>100),
			array('organization', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ug_id, first_name, last_name, organization', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ug_id' => 'Ug',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'organization' => 'Organization',
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

		$criteria->compare('ug_id',$this->ug_id,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('organization',$this->organization,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    /** * returns an array that contains the views name to be loaded * @return array */ 
    public function profileViews() {
         return array( UserGroupsUser::VIEW => 'index', UserGroupsUser::EDIT => 'update', UserGroupsUser::REGISTRATION => 'create', ); 
    }
}