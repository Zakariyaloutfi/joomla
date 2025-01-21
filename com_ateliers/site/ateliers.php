<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

$controller = JControllerLegacy::getInstance('Ateliers');
$input = Factory::getApplication()->input;
$controller->execute($input->getCmd('task'));
$controller->redirect();
