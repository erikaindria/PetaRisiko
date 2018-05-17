<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kerentanan_fisik".
 *
 * @property integer $id_kerenfis
 * @property string $fasilitas_umum
 * @property string $fasilitas_khusus
 * @property string $rumah
 *
 * @property Kabupaten[] $kabupatens
 */
class KerentananFisik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kerentanan_fisik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kerenfis'], 'required'],
            [['id_kerenfis'], 'integer'],
            [['fasilitas_umum', 'fasilitas_kritis', 'rumah'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kerenfis' => 'Id Kerenfis',
            'fasilitas_umum' => 'Fasilitas Umum',
            'fasilitas_kritis' => 'Fasilitas Kritis',
            'rumah' => 'Rumah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
   
    public function getKabupatens()
    {
        return $this->hasMany(Kabupaten::className(), ['id_kerenfis' => 'id_kerenfis']);
    }

    // public function getKabupatens()
    // {
    //     $kabupaten = Kabupaten::find()->where(['id_kerenfis'=>$this->id_kabupaten])->one();
        
    // }
}
  