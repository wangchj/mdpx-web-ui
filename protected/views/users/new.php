<?php
/* @var $this UsersController */
/* @var $model Users */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

$this->menu = array(
    array(
        array('label'=>'All Users', 'route'=>'users/index'),
        array('label'=>'New Users', 'route'=>'users/new')
    )
);
?>

<h1>Manage Users</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'userId::User ID',
		'firstName',
		'lastName',
		'phone',
		'email',
		'affiliation',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{approve} {decline}',
            'buttons'=>array(
                'approve'=>array(
                    'label'=>'<i class="icon-ok"></i>',
                    'url'=>'Yii::app()->controller->createUrl("approve",array("id"=>$data->userId,"retUlr"=>Yii::app()->controller->createUrl("users/new")))',
                ),
                'decline'=>array(
                    'label'=>'<i class="icon-remove"></i>',
                    'url'=>'Yii::app()->controller->createUrl("decline",array("id"=>$data->userId))',
                    'click'=>
                        "function()
                        {
                            if(!confirm('Are you sure you want to delete this item?'))
                                return false;
                                
                            $.fn.yiiGridView.update(
                                'users-grid',
                                {
                                    type:'POST',
                                    url:$(this).attr('href'),
                                    success:function(data)
                                    {
                                        $.fn.yiiGridView.update('users-grid');
                                    }
                                }
                            )
                        
                            return false;
                        }",
                 ),
            ),
		),
	),
)); ?>
