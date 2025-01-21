<?php
defined('_JEXEC') or die;


use Joomla\CMS\Log\Log;

if (!empty($this->items)) {
    Log::add('Default view: Items found: ' . count($this->items), Log::DEBUG, 'com_ateliers');
} else {
    Log::add('Default view: No items found', Log::WARNING, 'com_ateliers');
}



if (!empty($this->items)): ?>
    <div class="ateliers-list">
        <?php foreach ($this->items as $item): ?>
            <div class="atelier-item">
                <h3><?php echo htmlspecialchars($item->titre); ?></h3>
                <p><strong>Description :</strong> <?php echo htmlspecialchars($item->description); ?></p>
                <p><strong>Date :</strong> <?php echo JHtml::_('date', $item->date_time, JText::_('DATE_FORMAT_LC4')); ?></p>
                <p><strong>Places disponibles :</strong> <?php echo $item->places_available; ?></p>
                <a href="<?php echo JRoute::_('index.php?option=com_ateliers&task=inscription.add&id=' . (int) $item->id); ?>" class="btn btn-primary">
                    <?php echo JText::_('S\'inscrire'); ?>
                </a>
            </div>
            <hr>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p><?php echo JText::_('Aucun atelier disponible pour le moment.'); ?></p>
<?php endif; ?>


