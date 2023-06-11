<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%products}}".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $image
 * @property int $price
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CartItems[] $cartItems
 * @property User $createdBy
 * @property OrderItems[] $orderItems
 */
class Product extends \yii\db\ActiveRecord
{
     /**
     * @var \yii\web\UploadFile
     */
     public $imageFile;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%products}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'status'], 'required'],
            [['description'], 'string'],
            [['price', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['imageFile'],'image','extensions'=>'png,jpg,jpeg,webp','maxSize'=> 10*1024*1024],
            [['name'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 2000],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'product Image',
            'imageFile' => 'product Image',
            'price' => 'Price',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
    public function behaviors()
    {
        return[
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }
    /**
     * Gets query for [[CartItems]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CartItemsQuery
     */
    public function getCartItems()
    {
        return $this->hasMany(CartItems::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\OrderItemsQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::class, ['product_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProductQuery(get_called_class());
    }
    public function save($runValidation = true, $attributeNames = null)
    {
       if($this->imageFile){
        $this->image ='/products/'.Yii::$app->security->generateRandomString().'/'.$this->imageFile->name;
       }
       $transaction = Yii::$app->db->beginTransaction();
        $ok = parent::save($runValidation, $attributeNames);
        
        if($ok){
            $fullPath = Yii::getAlias('@frontend/web/storage/'.$this->image);
            $dir = dirname($fullPath);
            if(!FileHelper::createDirectory(($dir)) |
            !$this->imageFile->saveAs($fullPath)){
                $transaction->rollBack();
                return false;
            }
            $transaction->commit();
        }
        
        return $ok;
    }
    public function getImageUrl(){
        return Yii::$app->params['frontendUrl'].'/storage'.$this->image;
    }
}
