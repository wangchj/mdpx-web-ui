<?php
/* @var $this PartsController */
/* @var $data Parts */
?>

<?php
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/css/styles.css');
?>

<table class="table table-bordered table-striped" style="margin-bottom: 20px">
    <tr>
        <th style="width:160px"><?php echo CHtml::encode($data->getAttributeLabel('serialNum')); ?></th>
        <td><?php echo CHtml::link(CHtml::encode($data->serialNum), array('view', 'id'=>$data->serialNum)); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('type')); ?></th>
        <td><?php echo CHtml::encode($data->type); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('addedOn')); ?></th>
        <td><?php echo CHtml::encode($data->addedOn); ?></td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($data->getAttributeLabel('addedBy')); ?></th>
        <td><?php echo CHtml::encode($data->addedBy); ?></td>
    </tr>
</table>