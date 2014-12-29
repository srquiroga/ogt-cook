<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $name_user
 * @property string $last_name_user
 * @property string $nick_user
 * @property string $password_user
 * @property string $email_user
 * @property string $birthday_user
 * @property string $date_register
 * @property integer $active_user
 * @property integer $points_user
 * @property string $recorver_password_user
 * @property string $activation_code
 * The followings are the available model relations:
 * @property Recipe[] $recipes
 * @property ValorationUserRecipe[] $valorationUserRecipes
 */
class User extends CActiveRecord
{
	
	public $repeat_password;
	public $verifyCode;
	public $new_password;
	
	
	public function tableName()
	{
		return 'user';
	}
	
	public function rules()
	{
		return array(
			array('name_user, last_name_user, nick_user, email_user, birthday_user,', 'required','on'=>'insert', 'message'=>'Campo obligatorio'),
			array('password_user','required', 'on'=>'insert', 'message'=>'Campo obligatorio' ),
			array('repeat_password', 'safe'),
			array('repeat_password', 'required', 'on'=>'insert', 'message'=>'Campo obligatorio'),
			array('repeat_password', 'compare', 'compareAttribute'=>'password_user','on'=>'insert'),
			array(array('name_user', 'last_name_user'), 'match','pattern'=>'/^[a-zA-ZáéíóúÁÉÍÓÚ]+$/'),
			array('nick_user', 'match', 'pattern'=>'/^[a-zA-Z0-9_]+$/'),
			array('email_user', 'email', ),
			array('email_user', 'unique'),
			array('nick_user', 'unique'),
			array('new_password','safe'),
			array('active_user, points_user', 'numerical', 'integerOnly'=>true),
			array('name_user, nick_user', 'length', 'max'=>20),
			array('last_name_user', 'length', 'max'=>30),
			array('password_user, email_user', 'length', 'max'=>40),
			array('recorver_password_user, activation_code', 'length', 'max'=>16),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on'=>'insert'),
			array('id, name_user, last_name_user, nick_user, password_user, email_user, birthday_user, date_register, active_user, points_user, recorver_password_user, activation_code', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		
		return array(
			'recipes' => array(self::HAS_MANY, 'Recipe', 'id_user'),
			'valorationUserRecipes' => array(self::HAS_MANY, 'ValorationUserRecipe', 'id_user'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'id' => 'id',
			'name_user' => 'Nombre',
			'last_name_user' => 'Apellido',
			'nick_user' => 'Nick',
			'password_user' => 'Contraseña',
			'email_user' => 'Email',
			'birthday_user' => 'Fecha de nacimento',
			'date_register' => 'Fecha de registro',
			'active_user' => 'Usuario activo',
			'points_user' => 'Puntos',
			'recorver_password_user' => 'Recuperar contraseña',
			'activation_code' => 'Codigo de activación',
			'repeat_password'=>'Repetir contraseña',	
		);
	}
	
	public function search()
	{
		

		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('name_user',$this->name_user,true);
		$criteria->compare('last_name_user',$this->last_name_user,true);
		$criteria->compare('nick_user',$this->nick_user,true);
		$criteria->compare('password_user',$this->password_user,true);
		$criteria->compare('email_user',$this->email_user,true);
		$criteria->compare('birthday_user',$this->birthday_user,true);
		$criteria->compare('date_register',$this->date_register,true);
		$criteria->compare('active_user',$this->active_user);
		$criteria->compare('points_user',$this->points_user);
		$criteria->compare('recorver_password_user',$this->recorver_password_user,true);
		$criteria->compare('activation_code',$this->activation_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeValidate(){
	
		if($this->isNewRecord){
	
			$this->recorver_password_user = $this->generaPass();
			$this->activation_code = $this->generaPass();
			$this->password_user= sha1($this->password_user);
			$this->repeat_password =sha1($this->repeat_password);
		}
		return parent::beforeValidate();
	}
	public function generaPass(){
	
		$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$longitudCadena=strlen($cadena);
		$pass = "";
		$longitudPass=16;
		for($i=1 ; $i<=$longitudPass ; $i++){
			$pos=rand(0,$longitudCadena-1);
			$pass .= substr($cadena,$pos,1);
		}
		return $pass;
	}

	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
