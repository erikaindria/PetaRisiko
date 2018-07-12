<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kerentanan_ekonomi".
 *
 * @property integer $id_kerenek
 * @property string $lahan_produktif
 * @property string $PDRB
 *
 * @property Kabupaten[] $kabupatens
 */
class KerentananEkonomi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kerentanan_ekonomi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kerenek'], 'required'],
            [['id_kerenek'], 'integer'],
            [['lahan_produktif', 'PDRB'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kerenek' => 'Id Kerenek',
            'lahan_produktif' => 'Lahan Produktif',
            'PDRB' => 'Pdrb',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupatens()
    {
        return $this->hasMany(Kabupaten::className(), ['id_kerenek' => 'id_kerenek']);
    }
}
