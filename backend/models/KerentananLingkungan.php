<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kerentanan_lingkungan".
 *
 * @property integer $id_kerenling
 * @property string $hutan_lindung
 * @property string $hutan_alam
 * @property string $hutan_bakau
 * @property string $semak_belukar
 * @property string $rawa
 */
class KerentananLingkungan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kerentanan_lingkungan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kerenling'], 'required'],
            [['id_kerenling'], 'integer'],
            [['hutan_lindung', 'hutan_alam', 'hutan_bakau', 'semak_belukar', 'rawa'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kerenling' => 'Id Kerenling',
            'hutan_lindung' => 'Hutan Lindung',
            'hutan_alam' => 'Hutan Alam',
            'hutan_bakau' => 'Hutan Bakau',
            'semak_belukar' => 'Semak Belukar',
            'rawa' => 'Rawa',
        ];
    }
}
