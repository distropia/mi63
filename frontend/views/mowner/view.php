<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Mowner */
?>
<div class="mowner-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'owner_id',
            'owner_name',
        ],
    ]) ?>

</div>
