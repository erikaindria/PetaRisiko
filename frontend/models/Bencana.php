<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bencana".
 *
 * @property integer $id_bencana
 * @property integer $id_kabupaten
 * @property string $alamat_kejadian
 * @property string $tanggal_kejadian
 * @property string $waktu_kejadian
 */
class Bencana extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bencana';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_bencana'], 'required'],
            [['id_bencana', 'id_kabupaten'], 'integer'],
            [['tanggal_kejadian', 'waktu_kejadian'], 'safe'],
            [['alamat_kejadian'], 'string', 'max' => 300],
            [['id_kabupaten'], 'exist', 'skipOnError' => true, 'targetClass' => Kabupaten::className(), 'targetAttribute' => ['id_kabupaten' => 'id_kabupaten']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_bencana' => 'Id Bencana',
            'id_kabupaten' => 'Id Kabupaten',
            'alamat_kejadian' => 'Alamat Kejadian',
            'tanggal_kejadian' => 'Tanggal Kejadian',
            'waktu_kejadian' => 'Waktu Kejadian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabupatens()
    {
        return $this->hasMany(Kabupaten::className(), ['id_kabupaten' => 'id_kabupaten']);
    }
}
