<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "RequestCategory".
 *
 * @property integer $idRequestCategory
 * @property string $name
 *
 * @property Request[] $requests
 */
class RequestCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'RequestCategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idRequestCategory' => 'Id Request Category',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::className(), ['idRequestCategory' => 'idRequestCategory']);
    }
}
