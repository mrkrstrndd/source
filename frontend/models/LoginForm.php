<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\TblUser;


class LoginForm extends Model
{
	public $username;
	public $password;

	private $_user;

	public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
   			['password','validatePassword'],
        ];
    }

    public function validatePassword( $attribute, $params )
    {
    	 if ( !$this->hasErrors() ) 
    	 {
    	 	$user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) 
            {
                $this->addError($attribute, 'Incorrect username or password.');
                $this->addError('username', '');
            }
        }
    }

	public function login()
	{
		if ( $this->validate() )
		{	
			//return Yii::$app->user->login($this->getUser(),3600);
			echo 'success sya sa login';
			exit();

		}
		else
		{
			return false;
		}
	}

    protected function getUser()
    {
    	if ( $this->_user === null ) {
            $this->_user = TblUser::findByUsername($this->username);
        }
        return $this->_user;
    }
}