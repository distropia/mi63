<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Hurahura */
?>
<div class="hurahura-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'hurahura_id',
            'service',
            'owner',
            'quantity',
            'price',
        ],
    ]) ?>

</div>
