<?php
    use yii\grid\GridView;
?>

<?= GridView::widget([
   'dataProvider'=>$dataProvider,
    'summary'=>"Mostrando {begin} - {end} de {totalCount} elementos",
    'columns'=> [
        ['class'=> 'yii\grid\SerialColumn'],
        'id',
        'texto',
    ],
]); ?>


