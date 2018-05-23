<?php
use yii\helpers\Html;
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<?= Html::a('learning',['decision-tree/learning'],[ 'class' => 'btn btn-primary'])?>
			<?= Html::a('validate',['decision-tree/validate'],[ 'class' => 'btn btn-primary'])?>
			<?= Html::a('akurasi',['decision-tree/akurasi'],[ 'class' => 'btn btn-primary'])?>
			<?= Html::a('leave one out',['decision-tree/leave-one-out'],[ 'class' => 'btn btn-primary'])?>
			<?= Html::a('10 cross',['decision-tree/ten-cross'],[ 'class' => 'btn btn-primary'])?>
			
		</div>
	</div>
</div>

