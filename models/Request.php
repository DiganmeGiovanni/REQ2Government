<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Request".
 *
 * @property integer $idRequest
 * @property string $createdAt
 * @property string $attendedAt
 * @property string $description
 * @property integer $idRequestCategory
 * @property integer $idBeneficiary
 *
 * @property RequestCategory $idRequestCategory0
 * @property Beneficiary $idBeneficiary0
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createdAt', 'description', 'idRequestCategory', 'idBeneficiary'], 'required'],
            [['createdAt', 'attendedAt'], 'safe'],
            [['description'], 'string'],
            [['idRequestCategory', 'idBeneficiary'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idRequest' => 'Id Request',
            'createdAt' => 'Created At',
            'attendedAt' => 'Attended At',
            'description' => 'Description',
            'idRequestCategory' => 'Id Request Category',
            'idBeneficiary' => 'Id Beneficiary',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRequestCategory0()
    {
        return $this->hasOne(RequestCategory::className(), ['idRequestCategory' => 'idRequestCategory']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBeneficiary0()
    {
        return $this->hasOne(Beneficiary::className(), ['idBeneficiary' => 'idBeneficiary']);
    }
}
