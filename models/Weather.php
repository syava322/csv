<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Weather".
 *
 * @property int $id
 * @property string|null $data
 * @property string|null $degrees
 */
class Weather extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Weather';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'degrees'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'degrees' => 'Degrees',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\WeatherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\WeatherQuery(get_called_class());
    }

}
