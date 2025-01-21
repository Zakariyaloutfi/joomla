<?php
defined('_JEXEC') or die;

use Joomla\CMS\Table\Table;

class AteliersTableAtelier extends Table
{
    public function __construct(&$db)
    {
        parent::__construct('#__ateliers', 'id', $db);
    }

    public function bind($array, $ignore = '')
    {
        // Vérifie si les paramètres existent
        if (isset($array['params']) && is_array($array['params'])) {
            $registry = new JRegistry();
            $registry->loadArray($array['params']);
            $array['params'] = (string) $registry;
        }

        return parent::bind($array, $ignore);
    }

    public function store($updateNulls = false)
    {
        $date = JFactory::getDate();
        $user = JFactory::getUser();

        // Si c'est une mise à jour
        if ($this->id) {
            $this->modified = $date->toSql();
            $this->modified_by = $user->get('id');
        } else {
            // Pour une nouvelle entrée
            if (!(int) $this->created) {
                $this->created = $date->toSql();
            }
            if (empty($this->created_by)) {
                $this->created_by = $user->get('id');
            }
        }

        // Assure que le champ titre est bien défini
        if (empty($this->titre)) {
            $this->setError(JText::_('COM_ATELIERS_ERROR_MISSING_TITLE'));
            return false;
        }

        return parent::store($updateNulls);
    }
}
