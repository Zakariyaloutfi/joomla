<?php
defined('_JEXEC') or die;

// Vérifie que l'élément existe
if (empty($this->item)) {
    echo JText::_('COM_ATELIERS_NO_ITEM_FOUND');
    return;
}
?>

<div class="atelier-details">
    <h1><?php echo $this->escape($this->item->title); ?></h1>
    <div class="description">
        <?php echo $this->item->description; ?>
    </div>
    <p>
        <strong><?php echo JText::_('COM_ATELIERS_FIELD_DATE_LABEL'); ?>:</strong>
        <?php echo JHtml::_('date', $this->item->date_time, JText::_('DATE_FORMAT_LC2')); ?>
    </p>
    <p>
        <strong><?php echo JText::_('COM_ATELIERS_FIELD_PLACES_AVAILABLE_LABEL'); ?>:</strong>
        <?php echo $this->item->places_available; ?>
    </p>
    <p>
        <strong><?php echo JText::_('COM_ATELIERS_FIELD_PRICE_LABEL'); ?>:</strong>
        <?php echo number_format($this->item->price, 2); ?> €
    </p>
    <p>
        <strong><?php echo JText::_('COM_ATELIERS_FIELD_STATUS_LABEL'); ?>:</strong>
        <?php echo ($this->item->status == 'open') ? JText::_('COM_ATELIERS_STATUS_OPEN') : JText::_('COM_ATELIERS_STATUS_CLOSED'); ?>
    </p>
</div>
