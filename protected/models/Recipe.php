<?php

/**
 * This is the model class for table "recipe".
 *
 * The followings are the available columns in table 'recipe':
 * @property string $id
 * @property integer $id_user
 * @property string $title_recipe
 * @property string $author_recipe
 * @property string $season_recipe
 * @property string $category_recipe
 * @property string $time_recipe
 * @property string $ingredients_recipe
 * @property string $making_recipe
 * @property integer $valoration_recipe
 * @property string $date_register_recipe
 * @property string $extras_recipe
 * @property integer $number_person_recipe
 * @property string $type_kitchen_recipe
 * @property integer $times_vote_recipe
 * @property string $tag_type_recipe
 * @property string $tag_extra
 *
 * The followings are the available model relations:
 * @property User $idUser
 */
class Recipe extends CActiveRecord
{
    public $measure = null;
    public $quantity = null;
    public $one_ingredient = null;
   
	
	public function tableName()
	{
		return 'recipe';
	}

	
	public function rules()
	{
		
		return array(
			array('title_recipe,ingredients_recipe, making_recipe,', 'required', 'on'=>'insert', 'message'=>'Campo obligatorio'),
			array('id_user, valoration_recipe, number_person_recipe, times_vote_recipe', 'numerical', 'integerOnly'=>true),
			array('title_recipe', 'length', 'max'=>50),
                        array(array('measure', 'quantity','one_ingredient'),'safe'),
			array('author_recipe, tag_type_recipe, tag_extra', 'length', 'max'=>20),
			array('season_recipe', 'length', 'max'=>10),
			array('category_recipe', 'length', 'max'=>30),
			array('time_recipe', 'length', 'max'=>6),
			array('ingredients_recipe, making_recipe, extras_recipe', 'length', 'max'=>255),
			array('type_kitchen_recipe', 'length', 'max'=>16),
                      
			array('title_recipe, author_recipe, season_recipe, category_recipe, time_recipe, ingredients_recipe, making_recipe, valoration_recipe, date_register_recipe, extras_recipe, number_person_recipe, type_kitchen_recipe, times_vote_recipe, tag_type_recipe, tag_extra', 'safe', 'on'=>'search'),
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
			'idUser' => array(self::BELONGS_TO, 'User', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'id usuario',
			'title_recipe' => 'Titulo',
			'author_recipe' => 'Autor',
			'season_recipe' => 'Temporada',
			'category_recipe' => 'Categoria',
			'time_recipe' => 'tiempo de preparación',
			'ingredients_recipe' => 'Ingredientes',
			'making_recipe' => 'Preparación',
			'valoration_recipe' => 'Valoración',
			'date_register_recipe' => 'Fecha de creación',
			'extras_recipe' => 'Extras',// informacion extra
			'number_person_recipe' => 'Numero de comensales',
			'type_kitchen_recipe' => 'Tipo de cocina',
			'times_vote_recipe' => 'Número de votaciones',
			'tag_type_recipe' => 'Tipo de receta',//tipo de plato: primer plato, segundo plato, postre etc
			'tag_extra' => 'Pensada para',//fechas, eventos,
                        'quantity'=>'canitdad',
                        'measure'=>'medida',
                        'one_ingredient'=>'ingrediente',
		);
	}


	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('title_recipe',$this->title_recipe,true);
		$criteria->compare('author_recipe',$this->author_recipe,true);
		$criteria->compare('season_recipe',$this->season_recipe,true);
		$criteria->compare('category_recipe',$this->category_recipe,true);
		$criteria->compare('time_recipe',$this->time_recipe,true);
		$criteria->compare('ingredients_recipe',$this->ingredients_recipe,true);
		$criteria->compare('making_recipe',$this->making_recipe,true);
		$criteria->compare('valoration_recipe',$this->valoration_recipe);
		$criteria->compare('date_register_recipe',$this->date_register_recipe,true);
		$criteria->compare('extras_recipe',$this->extras_recipe,true);
		$criteria->compare('number_person_recipe',$this->number_person_recipe);
		$criteria->compare('type_kitchen_recipe',$this->type_kitchen_recipe,true);
		$criteria->compare('times_vote_recipe',$this->times_vote_recipe);
		$criteria->compare('tag_type_recipe',$this->tag_type_recipe,true);
		$criteria->compare('tag_extra',$this->tag_extra,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Recipe the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
