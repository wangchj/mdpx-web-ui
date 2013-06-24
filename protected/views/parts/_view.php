<?php
/* @var $this PartsController */
/* @var $data Parts */
?>

<?php
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/css/styles.css');
?>

<table class="detail-view" id="yw0" style="margin-bottom: 20px">
    <tr class="odd">
        <th><?php echo CHtml::encode($data->getAttributeLabel('serialNum')); ?></th>
        <td><?php echo CHtml::link(CHtml::encode($data->serialNum), array('view', 'id'=>$data->serialNum)); ?></td>
    </tr>
    <tr class="even">
        <th><?php echo CHtml::encode($data->getAttributeLabel('type')); ?></th>
        <td><?php echo CHtml::encode($data->type); ?></td>
    </tr>
    <tr class="odd">
        <th><?php echo CHtml::encode($data->getAttributeLabel('addedOn')); ?></th>
        <td><?php echo CHtml::encode($data->addedOn); ?></td>
    </tr>
    <tr class="even">
        <th><?php echo CHtml::encode($data->getAttributeLabel('addedBy')); ?></th>
        <td><?php echo CHtml::encode($data->addedBy); ?></td>
    </tr>
</table>