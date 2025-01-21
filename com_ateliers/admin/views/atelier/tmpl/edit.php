<?php
defined('_JEXEC') or die;

JHtml::_('behavior.formvalidator');
JHtml::_('behavior.keepalive');
JHtml::_('formbehavior.chosen', 'select');

JFactory::getDocument()->addScriptDeclaration('
    Joomla.submitbutton = function(task)
    {
        if (task == "atelier.cancel" || document.formvalidator.isValid(document.getElementById("atelier-form")))
        {
            Joomla.submitform(task, document.getElementById("atelier-form"));
        }
    };
');
?>

<form action="<?php echo JRoute::_('index.php?option=com_ateliers&layout=edit&id=' . (int) $this->item->id); ?>"
    method="post" name="adminForm" id="atelier-form" class="form-validate">

    <div class="form-horizontal">
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', JText::_('COM_ATELIERS_ATELIER_DETAILS')); ?>
        <div class="row-fluid">
            <div class="span9">
                <div class="form-vertical">
                    <?php echo $this->form->renderField('titre'); ?>
                    <?php echo $this->form->renderField('description'); ?>
                    <?php echo $this->form->renderField('date'); ?>
                    <?php echo $this->form->renderField('places_totales'); ?>
                    <?php echo $this->form->renderField('places_reservees'); ?>
                    <?php echo $this->form->renderField('prix'); ?>
                    <?php echo $this->form->renderField('published'); ?>
                </div>
            </div>
        </div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>

        <?php echo JHtml::_('bootstrap.endTabSet'); ?>
    </div>

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
</form>

