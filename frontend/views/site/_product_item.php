



    <div class="card">
        <?php if($model->image ==null):?>
            <img src="<?php echo 'http://localhost/YII-2/yii2-ecommerce/frontend/web/img/No-Image-Placeholder.png'.$model->image?>" class="card-img-top" alt="Skyscrapers"/>

        <?php else:?>
        <img src="<?php echo 'http://localhost/YII-2/yii2-ecommerce/frontend/web/storage'.$model->image?>" class="card-img-top" alt="Skyscrapers"/>
        <?php endif;?>
        <div class="card-body">
            <h3 class="card-title">
                <a href="#"><?php echo $model->name ?></a>
            </h3>
            <h5><?php echo Yii::$app->formatter->asCurrency($model->price) ?></h5>
            <div class="card-text">
                <?php echo $model->getShortDescription() ?>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="#" class="btn btn-primary">
                Add To Card
            </a>
        </div>
    </div>


