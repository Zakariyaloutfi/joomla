<?php
defined('_JEXEC') or die;

class AteliersControllerAteliers extends JControllerAdmin
{
    public function getModel($name = 'Atelier', $prefix = 'AteliersModel', $config = array('ignore_request' => true))
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }

    protected function allowAdd($data = array())
    {
        $user = JFactory::getUser();
        return $user->authorise('core.create', 'com_ateliers');
    }
}

