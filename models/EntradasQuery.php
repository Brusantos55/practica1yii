<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Entradas]].
 *
 * @see Entradas
 */
class EntradasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Entradas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Entradas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
