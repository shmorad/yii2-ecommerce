<?php

/** @var yii\web\View $this */

use yii\bootstrap5\LinkPager;
use yii\widgets\ListView;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <?php echo ListView::widget([
            'dataProvider'=> $dataProvider,
            'itemView'=>'_product_item',
            'layout'=>'<div class="row">{items}</div>{pager}',
            'options'=>[
                'class'=>'row'
            ],
            'itemOptions' =>[
                'class'=>'col-lg-4 col-md-6 mb-4 d-flex align-items-stretch'
            ],
            'pager'=>[
                'class'=> LinkPager::class,
            ] 
        ]);
        
        ?>
    </div>
</div>
