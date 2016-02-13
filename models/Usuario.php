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
 * @property Permission $permission
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $id;
    public $rememberMe = true;
    public $authKey;
    public $accessToken;

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
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) {
            if($this->isNewRecord) {
                $security = Yii::$app->getSecurity();
                $hash = $security->generatePasswordHash($this->password);

                $this->password = $hash;
            }

            return true;
        }
        else {
            return false;
        }
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
            [['username'], 'unique'],
            [['username'], 'match', 'pattern' => '/^[a-z]\w*$/i'],
            [['password'], 'string', 'max' => 3000],
            [['name', 'aPaterno', 'aMaterno'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 500],
            [['email'], 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUser'   => 'User ID',
            'username' => 'Username',
            'password' => 'Password',
            'name'     => 'First name',
            'aPaterno' => 'Middle name',
            'aMaterno' => 'Last name',
            'email'    => 'Email',
            'active'   => 'Is active?',
            'idPermission' => 'Permission',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermission()
    {
        return $this->hasOne(Permission::className(), ['idPermission' => 'idPermission']);
    }

    /**
     * Returns a plain string representation of 'active'
     * property. [Yes | No]
     */
    public function getIsActiveText()
    {
        return ($this->active == 1) ? 'Yes' : 'No';
    }

    public function isAdmin()
    {
        return $this->idPermission == 2;
    }

    public function isSuperAdmin()
    {
        return $this->idPermission == 1;
    }

    public function isRecorder()
    {
        return $this->idPermission == 3;
    }


    /*************************************************************************/
    /*************************************************************************/

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    /**
     * @inheritdoc
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->idUser;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {}

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {

    }

    /**
     * Validates password
     *
     * @param  string $password The password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

}
