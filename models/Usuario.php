<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "User".
 *
 * @property integer $idUser
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $aPaterno
 * @property string $aMaterno
 * @property string $email
 * @property integer $active
 * @property integer $idPermission
 *
 * @property Permission $idPermission0
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'name', 'aPaterno', 'idPermission'], 'required'],
            [['active', 'idPermission'], 'integer'],
            [['username'], 'string', 'max' => 200],
            [['password'], 'string', 'max' => 3000],
            [['name', 'aPaterno', 'aMaterno'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUser' => 'Id User',
            'username' => 'Username',
            'password' => 'Password',
            'name' => 'Name',
            'aPaterno' => 'A Paterno',
            'aMaterno' => 'A Materno',
            'email' => 'Email',
            'active' => 'Active',
            'idPermission' => 'Id Permission',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPermission0()
    {
        return $this->hasOne(Permission::className(), ['idPermission' => 'idPermission']);
    }
}
