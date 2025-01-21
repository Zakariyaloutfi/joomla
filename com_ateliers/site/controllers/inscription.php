<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\FormController;

class AteliersControllerInscription extends FormController
{
    public function add()
    {
        $input = Factory::getApplication()->input;
        $atelierId = $input->getInt('id');

        if (!$atelierId) {
            Factory::getApplication()->enqueueMessage(JText::_('Atelier non trouvé.'), 'error');
            $this->setRedirect(JRoute::_('index.php?option=com_ateliers&view=ateliers', false));
            return false;
        }

        // Logique d'inscription
        $db = Factory::getDbo();
        $query = $db->getQuery(true);

        // Récupère l'atelier pour vérifier les places disponibles
        $query->select('*')
            ->from($db->quoteName('#__ateliers'))
            ->where($db->quoteName('id') . ' = ' . $db->quote($atelierId));
        $db->setQuery($query);
        $atelier = $db->loadObject();

        if (!$atelier || $atelier->places_available <= 0) {
            Factory::getApplication()->enqueueMessage(JText::_('Aucune place disponible pour cet atelier.'), 'error');
            $this->setRedirect(JRoute::_('index.php?option=com_ateliers&view=ateliers', false));
            return false;
        }

        // Réduit les places disponibles
        $query = $db->getQuery(true);
        $query->update($db->quoteName('#__ateliers'))
            ->set($db->quoteName('places_available') . ' = ' . ($atelier->places_available - 1))
            ->where($db->quoteName('id') . ' = ' . $db->quote($atelierId));
        $db->setQuery($query);

        try {
            $db->execute();
            Factory::getApplication()->enqueueMessage(JText::_('Inscription réussie !'), 'message');
        } catch (Exception $e) {
            Factory::getApplication()->enqueueMessage(JText::_('Erreur lors de l\'inscription.'), 'error');
        }

        $this->setRedirect(JRoute::_('index.php?option=com_ateliers&view=ateliers', false));
    }
}
