<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ahp_tanah_longsor".
 *
 * @property integer $id_ahp_tanah_longsor
 * @property integer $id_kabupaten
 * @property string $bobot
 */
class AhpTanahLongsor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ahp_tanah_longsor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ahp_tanah_longsor', 'id_kabupaten', 'bobot'], 'required'],
            [['id_ahp_tanah_longsor', 'id_kabupaten'], 'integer'],
            [['bobot'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ahp_tanah_longsor' => 'ID AHP Tanah Longsor',
            'id_kabupaten' => 'ID Kabupaten',
            'bobot' => 'Bobot',
        ];
    }
}
