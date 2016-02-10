<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TypeIdentification".
 *
 * @property integer $idTypeIdentification
 * @property string $name
 *
 * @property Beneficiary[] $beneficiaries
 */
class TypeIdentification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'TypeIdentification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTypeIdentification' => 'Id Type Identification',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeneficiaries()
    {
        return $this->hasMany(Beneficiary::className(), ['idTypeIdentification' => 'idTypeIdentification']);
    }
}
