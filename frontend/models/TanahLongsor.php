<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tanah_longsor".
 *
 * @property integer $id_tanah_longsor
 * @property integer $id_bencana
 * @property string $kerentanan_gerakan_tanah
 * @property string $longtitude
 * @property string $latitude
 */
class TanahLongsor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tanah_longsor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tanah_longsor'], 'required'],
            [['id_tanah_longsor', 'id_bencana'], 'integer'],
            [['kerentanan_gerakan_tanah', 'longtitude', 'latitude'], 'string', 'max' => 30],
            [['id_bencana'], 'exist', 'skipOnError' => true, 'targetClass' => Bencana::className(), 'targetAttribute' => ['id_bencana' => 'id_bencana']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tanah_longsor' => 'Id Tanah Longsor',
            'id_bencana' => 'Id Bencana',
            'kerentanan_gerakan_tanah' => 'Kerentanan Gerakan Tanah',
            'longtitude' => 'Longtitude',
            'latitude' => 'Latitude',
        ];
    }

    // public function getKabupatens()
    // {
    //     return $this->hasMany(Kabupaten::className(), ['id_kabupaten' => 'id_kabupaten']);
    // }

    public function getBencana()
    {
        return $this->hasMany(Bencana::className(), ['id_bencana' => 'id_bencana']);
    }
}
