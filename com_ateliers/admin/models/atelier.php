<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\AdminModel;

class AteliersModelAtelier extends AdminModel
{
    protected $text_prefix = 'COM_ATELIERS';

    public function getTable($type = 'Atelier', $prefix = 'AteliersTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm('com_ateliers.atelier', 'atelier', array('control' => 'jform', 'load_data' => $loadData));

        if (empty($form)) {
            throw new Exception(JText::_('JERROR_LOADFORM_FAILED'));
        }

        return $form;
    }

    protected function loadFormData()
    {
        // Charge les données depuis la session ou un nouvel élément
        $data = JFactory::getApplication()->getUserState('com_ateliers.edit.atelier.data', array());

        if (empty($data)) {
            $data = $this->getItem(); // Récupère l'élément depuis la base de données
        }

        return $data;
    }
}
