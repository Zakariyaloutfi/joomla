<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView;
use Joomla\CMS\Log\Log;

class AteliersViewAteliers extends HtmlView
{
    protected $items;

    public function display($tpl = null)
    {
        // Ajoutez un log pour vérifier l'appel
        Log::add('Ateliers View: Display called', Log::DEBUG, 'com_ateliers');

        $this->items = $this->get('Items');

        // Vérifiez si les items sont chargés correctement
        if (empty($this->items)) {
            Log::add('Ateliers View: No items found', Log::WARNING, 'com_ateliers');
        } else {
            Log::add('Ateliers View: Items loaded: ' . count($this->items), Log::DEBUG, 'com_ateliers');
        }

        parent::display($tpl);
    }
}
