<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
//$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (Yii::$app->user->identity->name=='admin' and Yii::$app->user->identity->isAdmin==1):?>

<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'title',
            'email:email',
            'password',
            // 'isAdmin',
            // 'photo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php endif; ?>