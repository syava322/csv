<?php

namespace app\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\Weather]].
 *
 * @see \app\models\Weather
 */
class WeatherQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\Weather[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\Weather|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
