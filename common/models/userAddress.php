<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_addresses}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string|null $zipcode
 *
 * @property User $user
 */
class userAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_addresses}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'address', 'city', 'country'], 'required'],
            [['user_id'], 'integer'],
            [['address', 'city', 'country', 'zipcode'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'address' => 'Address',
            'city' => 'City',
            'country' => 'Country',
            'zipcode' => 'Zipcode',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\userAddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\userAddressQuery(get_called_class());
    }
}
