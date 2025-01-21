<?php
defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

// Variables pour le tri
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
?>

<form action="<?php echo JRoute::_('index.php?option=com_ateliers&view=ateliers'); ?>" method="post" name="adminForm" id="adminForm">
    <div id="j-main-container">
        <table class="table table-striped" id="atelierList">
            <thead>
                <tr>
                    <th width="1%" class="hidden-phone">
                        <?php echo JHtml::_('grid.checkall'); ?>
                    </th>
                    <th>
                        <?php echo JHtml::_('grid.sort', 'COM_ATELIERS_HEADING_TITRE', 'a.titre', $listDirn, $listOrder); ?>
                    </th>
                    <th width="30%" class="hidden-phone">
                        <?php echo JText::_('COM_ATELIERS_HEADING_DESCRIPTION'); ?>
                    </th>
                    <th width="10%" class="hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'COM_ATELIERS_HEADING_DATE', 'a.date_time', $listDirn, $listOrder); ?>
                    </th>
                    <th width="10%" class="hidden-phone">
                        <?php echo JText::_('COM_ATELIERS_HEADING_PLACES'); ?>
                    </th>
                    <th width="10%" class="hidden-phone">
                        <?php echo JText::_('COM_ATELIERS_HEADING_STATUS'); ?>
                    </th>
                    <th width="5%" class="hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'a.published', $listDirn, $listOrder); ?>
                    </th>
                    <th width="1%" class="hidden-phone">
                        <?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($this->items)): ?>
                <?php foreach ($this->items as $i => $item) : ?>
                    <tr class="row<?php echo $i % 2; ?>">
                        <td class="center hidden-phone">
                            <?php echo JHtml::_('grid.id', $i, $item->id); ?>
                        </td>
                        <td>
                            <a href="<?php echo JRoute::_('index.php?option=com_ateliers&task=atelier.edit&id=' . (int) $item->id); ?>">
                                <?php echo $this->escape($item->titre); ?>
                            </a>
                        </td>
                        <td class="hidden-phone">
                            <?php echo $this->escape($item->description); ?>
                        </td>
                        <td class="hidden-phone">
                            <?php echo JHtml::_('date', $item->date_time, JText::_('DATE_FORMAT_LC4')); ?>
                        </td>
                        <td class="hidden-phone">
                            <?php echo $item->places_available; ?>
                        </td>
                        <td class="hidden-phone">
                            <?php echo $item->status == 'open' ? JText::_('COM_ATELIERS_STATUS_OPEN') : JText::_('COM_ATELIERS_STATUS_CLOSED'); ?>
                        </td>
                        <td class="center hidden-phone">
                            <?php echo JHtml::_('jgrid.published', $item->published, $i, 'ateliers.', true); ?>
                        </td>
                        <td class="center hidden-phone">
                            <?php echo $item->id; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8"><?php echo JText::_('Aucun atelier trouvé.'); ?></td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
    <?php echo JHtml::_('form.token'); ?>
</form>
