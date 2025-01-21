<?php
defined('_JEXEC') or die;

class AteliersViewAtelier extends JViewLegacy
{
    protected $item;

    public function display($tpl = null)
    {
        // Récupère l'élément (atelier spécifique)
        $this->item = $this->get('Item');

        // Gestion des erreurs
        if (count($errors = $this->get('Errors')))
        {
            throw new Exception(implode("\n", $errors));
        }

        parent::display($tpl);
    }
}
