<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periode".
 *
 * @property integer $id_periode
 * @property integer $tahun
 *
 * @property Kabupaten[] $kabupatens
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupatens()
    {
        return $this->hasMany(Kabupaten::className(), ['id_periode' => 'id_periode']);
    }
}
