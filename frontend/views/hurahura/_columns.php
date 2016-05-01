<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'date',
        'value'=>function($model) { $dateformat = new DateTime($model->date); 
        							return date_format($dateformat, 'Y-m-d'); }
	],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'service',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'label'=>'Owner',
        'attribute'=>'owner_id',
        'value'=>'owner.owner_name',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'quantity',
        'value'=>function($model) { return number_format($model->quantity); },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'price',
        'value'=>function($model) { return number_format($model->price); },
    ],
    [
        'label'=>'Total',
        'value'=> function($model)
        			{	$total_price = $model->price * $model->quantity;
        				return number_format($total_price);
        			},
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   