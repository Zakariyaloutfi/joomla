<?php
defined('_JEXEC') or die;

class AteliersViewAtelier extends JViewLegacy
{
    protected $form;
    protected $item;
    protected $state;

    public function display($tpl = null)
    {
        try {
            $this->form  = $this->get('Form'); // Charge le formulaire
            $this->item  = $this->get('Item'); // Charge les données de l'élément actuel
            $this->state = $this->get('State'); // Charge l'état de la vue

            // Vérifie les erreurs
            if (count($errors = $this->get('Errors'))) {
                throw new Exception(implode("\n", $errors));
            }

            $this->addToolbar(); // Ajoute la barre d'outils
            parent::display($tpl);

        } catch (Exception $e) {
            JFactory::getApplication()->enqueueMessage($e->getMessage(), 'error');
            return false;
        }
    }

    protected function addToolbar()
    {
        JFactory::getApplication()->input->set('hidemainmenu', true);

        $isNew = ($this->item->id == 0);

        JToolbarHelper::title(
            JText::_('COM_ATELIERS_MANAGER_' . ($isNew ? 'NEW_ATELIER' : 'EDIT_ATELIER')),
            'pencil-2 article-add'
        );

        JToolbarHelper::save('atelier.save');
        JToolbarHelper::save2new('atelier.save2new');

        if (!$isNew) {
            JToolbarHelper::save2copy('atelier.save2copy');
        }

        JToolbarHelper::cancel('atelier.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
    }
}
