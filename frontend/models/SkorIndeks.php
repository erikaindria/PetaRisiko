<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indeks_kapasitas".
 *
 * @property integer $id_indeks_kapasitas
 * @property string $skor
 *
 * @property Kabupaten[] $kabupatens
 */
class SkorIndeks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'skorindeks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_indeks_kapasitas'], 'required'],
            [['id_indeks_kapasitas'], 'integer'],
            [['skor'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_indeks_kapasitas' => 'Id Indeks Kapasitas',
            'skor' => 'Skor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupatens()
    {
        return $this->hasMany(Kabupaten::className(), ['id_indeks_kapasitas' => 'id_indeks_kapasitas']);
    }
}
