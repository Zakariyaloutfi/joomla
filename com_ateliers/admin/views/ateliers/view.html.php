<?php
defined('_JEXEC') or die;

class AteliersViewAteliers extends JViewLegacy
{
    protected $items;
    protected $pagination;
    protected $state;

    public function display($tpl = null)
    {
        $this->items         = $this->get('Items');
        $this->pagination    = $this->get('Pagination');
        $this->state         = $this->get('State');

        if (count($errors = $this->get('Errors')))
        {
            throw new Exception(implode("\n", $errors));
        }

        $this->addToolbar();

        parent::display($tpl);
    }

    protected function addToolbar()
    {
        JToolbarHelper::title(JText::_('COM_ATELIERS_MANAGER_ATELIERS'));
        JToolbarHelper::addNew('atelier.add');
        JToolbarHelper::editList('atelier.edit');
        JToolbarHelper::publish('ateliers.publish', 'JTOOLBAR_PUBLISH', true);
        JToolbarHelper::unpublish('ateliers.unpublish', 'JTOOLBAR_UNPUBLISH', true);
        JToolbarHelper::deleteList('', 'ateliers.delete', 'JTOOLBAR_DELETE');
    }
}