<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "periode".
 *
 * @property integer $id_periode
 * @property integer $tahun
 */
class Periode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_periode'], 'required'],
            [['id_periode', 'tahun'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_periode' => 'Id Periode',
            'tahun' => 'Tahun',
        ];
    }
}
