<?php
/* @var $this PartCategoriesController */
/* @var $data PartCategories */
?>

<?php
Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl.'/css/styles.css');
?>

<table class="detail-view" id="yw0" style="margin-bottom: 20px">
    <tr class="odd">
        <th><?php echo CHtml::encode($data->getAttributeLabel('partCatId')); ?></th>
        <td><?php echo CHtml::link(CHtml::encode($data->partCatId), array('view', 'id'=>$data->partCatId)); ?></td>
    </tr>
    <tr class="even">
        <th><?php echo CHtml::encode($data->getAttributeLabel('name')); ?></th>
        <td><?php echo CHtml::encode($data->name); ?></td>
    </tr>
    <tr class="odd">
        <th><?php echo CHtml::encode($data->getAttributeLabel('description')); ?></th>
        <td><?php echo CHtml::encode($data->description); ?></td>
    </tr>
    <tr class="even">
        <th><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?></th>
        <td><?php echo CHtml::encode($data->parent); ?></td>
    </tr>
    <tr class="odd">
        <th><?php echo CHtml::encode($data->getAttributeLabel('isGroup')); ?></th>
        <td><?php echo CHtml::encode($data->isGroup); ?></td>
    </tr>
</table>

<?php /*
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('partCatId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->partCatId), array('view', 'id'=>$data->partCatId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
    <?php echo CHtml::encode($data->description); ?>
    <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?>:</b>
	<?php echo CHtml::encode($data->parent); ?>
	<br />


</div>
 */?>