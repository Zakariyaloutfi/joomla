<?php
defined('_JEXEC') or die;

if (!JFactory::getUser()->authorise('core.manage', 'com_ateliers')) {
    throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

$controller = JControllerLegacy::getInstance('Ateliers');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();