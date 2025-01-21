<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ItemModel;

class AteliersModelAtelier extends ItemModel
{
    protected function populateState()
    {
        $app = JFactory::getApplication();
        $id = $app->input->getInt('id', 0);
        $this->setState('atelier.id', $id);

        parent::populateState();
    }

    public function getItem($id = null)
    {
        $id = (!empty($id)) ? $id : (int) $this->getState('atelier.id');

        if (!$id) {
            return false;
        }

        $db = $this->getDbo();
        $query = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('#__ateliers'))
            ->where($db->quoteName('id') . ' = ' . (int) $id);
        $db->setQuery($query);

        return $db->loadObject();
    }
}
