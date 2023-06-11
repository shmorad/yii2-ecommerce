<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\orderAddress]].
 *
 * @see \common\models\orderAddress
 */
class orderAddressQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\orderAddress[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\orderAddress|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
