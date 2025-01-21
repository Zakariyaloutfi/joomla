<?php 

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Log\Log;

class AteliersController extends BaseController
{
    public function execute($task)
    {
        Log::add('Controller: Task executed: ' . $task, Log::DEBUG, 'com_ateliers');
        parent::execute($task);
    }
}
