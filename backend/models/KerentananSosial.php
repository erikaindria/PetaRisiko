<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kerentanan_sosial".
 *
 * @property integer $id_kerensos
 * @property string $kepadatan_penduduk
 * @property string $rasio_jenis_kelamin
 * @property string $rasio_kemiskinan
 * @property string $rasio_orang_cacat
 * @property string $rasio_kelompok_umur
 *
 * @property Kabupaten[] $kabupatens
 */
class KerentananSosial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kerentanan_sosial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kerensos'], 'required'],
            [['id_kerensos'], 'integer'],
            [['kepadatan_penduduk', 'rasio_jenis_kelamin', 'rasio_kemiskinan', 'rasio_orang_cacat', 'rasio_kelompok_umur'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kerensos' => 'ID Kerensos',
            'kepadatan_penduduk' => 'Kepadatan Penduduk',
            'rasio_jenis_kelamin' => 'Rasio Jenis Kelamin',
            'rasio_kemiskinan' => 'Rasio Kemiskinan',
            'rasio_orang_cacat' => 'Rasio Orang Cacat',
            'rasio_kelompok_umur' => 'Rasio Kelompok Umur',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupatens()
    {
        return $this->hasMany(Kabupaten::className(), ['id_kerensos' => 'id_kerensos']);
    }
}
