<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_user".
 *
 * @property integer $id
 * @property string $uname
 * @property string $passwd_hash
 */
class TblUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uname', 'passwd_hash'], 'required'],
            [['uname', 'passwd_hash'], 'string', 'max' => 255],
            [['uname'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uname' => 'Uname',
            'passwd_hash' => 'Passwd Hash',
        ];
    }

     public static function findByUsername($username)
    {
        return static::findOne(['uname' => $username ]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->passwd_hash);
    }

    public function setPassword($password)
    {
        $this->passwd_hash = Yii::$app->security->generatePasswordHash($password);
    }
}
