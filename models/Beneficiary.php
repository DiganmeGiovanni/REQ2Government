<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Beneficiary".
 *
 * @property integer $idBeneficiary
 * @property string $name
 * @property string $aPaterno
 * @property string $aMaterno
 * @property string $email
 * @property string $idNumber
 * @property string $birthday
 * @property integer $idTypeIdentification
 *
 * @property TypeIdentification $idTypeIdentification0
 * @property Request[] $requests
 */
class Beneficiary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Beneficiary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'aPaterno', 'email', 'idNumber', 'idTypeIdentification'], 'required'],
            [['birthday'], 'safe'],
            [['idTypeIdentification'], 'integer'],
            [['name', 'aPaterno', 'aMaterno'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 500],
            [['idNumber'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idBeneficiary' => 'Id Beneficiary',
            'name' => 'Name',
            'aPaterno' => 'A Paterno',
            'aMaterno' => 'A Materno',
            'email' => 'Email',
            'idNumber' => 'Id Number',
            'birthday' => 'Birthday',
            'idTypeIdentification' => 'Id Type Identification',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTypeIdentification0()
    {
        return $this->hasOne(TypeIdentification::className(), ['idTypeIdentification' => 'idTypeIdentification']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['idBeneficiary' => 'idBeneficiary']);
    }
}
