<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kabupaten".
 *
 * @property integer $id_kabupaten
 * @property integer $id_periode
 * @property integer $id_kerenek
 * @property integer $id_kerenfis
 * @property integer $id_kerenling
 * @property integer $id_kerensos
 * @property integer $id_indeks_kapasitas
 * @property string $nama_kabupaten
 * @property string $longtitude
 * @property string $latitude
 *
 * @property KerentananSosial $idKerensos
 * @property KerentananFisik $idKerenfis
 * @property KerentananLingkungan $idKerenling
 * @property KerentananEkonomi $idKerenek
 * @property IndeksKapasitas $idIndeksKapasitas
 * @property Periode $idPeriode
 */
class Kabupaten extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kabupaten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kabupaten'], 'required'],
            [['id_kabupaten', 'id_periode', 'id_kerenek', 'id_kerenfis', 'id_kerenling', 'id_kerensos', 'id_indeks_kapasitas'], 'integer'],
            [['nama_kabupaten', 'longtitude', 'latitude'], 'string', 'max' => 30],
            [['id_kerensos'], 'exist', 'skipOnError' => true, 'targetClass' => KerentananSosial::className(), 'targetAttribute' => ['id_kerensos' => 'id_kerensos']],
            [['id_kerenfis'], 'exist', 'skipOnError' => true, 'targetClass' => KerentananFisik::className(), 'targetAttribute' => ['id_kerenfis' => 'id_kerenfis']],
            [['id_kerenling'], 'exist', 'skipOnError' => true, 'targetClass' => KerentananLingkungan::className(), 'targetAttribute' => ['id_kerenling' => 'id_kerenling']],
            [['id_kerenek'], 'exist', 'skipOnError' => true, 'targetClass' => KerentananEkonomi::className(), 'targetAttribute' => ['id_kerenek' => 'id_kerenek']],
            [['id_indeks_kapasitas'], 'exist', 'skipOnError' => true, 'targetClass' => IndeksKapasitas::className(), 'targetAttribute' => ['id_indeks_kapasitas' => 'id_indeks_kapasitas']],
            [['id_periode'], 'exist', 'skipOnError' => true, 'targetClass' => Periode::className(), 'targetAttribute' => ['id_periode' => 'id_periode']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kabupaten' => 'ID Kabupaten',
            'id_periode' => 'ID Periode',
            'id_kerenek' => 'ID Kerenek',
            'id_kerenfis' => 'ID Kerenfis',
            'id_kerenling' => 'ID Kerenling',
            'id_kerensos' => 'ID Kerensos',
            'id_indeks_kapasitas' => 'ID Indeks Kapasitas',
            'nama_kabupaten' => 'Nama Kabupaten',
            'longtitude' => 'Longtitude',
            'latitude' => 'Latitude',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKerensos()
    {
        return $this->hasOne(KerentananSosial::className(), ['id_kerensos' => 'id_kerensos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKerenfis()
    {
        return $this->hasOne(KerentananFisik::className(), ['id_kerenfis' => 'id_kerenfis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKerenling()
    {
        return $this->hasOne(KerentananLingkungan::className(), ['id_kerenling' => 'id_kerenling']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKerenek()
    {
        return $this->hasOne(KerentananEkonomi::className(), ['id_kerenek' => 'id_kerenek']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdIndeksKapasitas()
    {
        return $this->hasOne(IndeksKapasitas::className(), ['id_indeks_kapasitas' => 'id_indeks_kapasitas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPeriode()
    {
        return $this->hasOne(Periode::className(), ['id_periode' => 'id_periode']);
    }
}
