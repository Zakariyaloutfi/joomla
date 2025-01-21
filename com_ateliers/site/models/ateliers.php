<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;

class AteliersModelAteliers extends ListModel
{
    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select('*')
              ->from($db->quoteName('#__ateliers'))
              ->where($db->quoteName('status') . ' = ' . $db->quote('open'))
              ->order('date_time ASC');

        return $query;
    }
}
