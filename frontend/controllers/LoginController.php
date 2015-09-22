<?php

namespace frontend\controllers;

use Yii;
use app\models\LoginForm;
use app\models\TblUser;

class LoginController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$model = new LoginForm();
    	if($model->load(Yii::$app->request->post()) && $model->login())
    	{
    		var_dump($this);
    		exit;
    	}	
    	else
    	{
    		return $this->render('@app/views/app/index', [
    			'model' => $model
			]);
    	}
    }

}
