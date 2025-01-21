<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\FormController;

class AteliersControllerAtelier extends FormController
{
    protected $view_list = 'ateliers'; // Vue par défaut après une action (liste des ateliers)

    public function cancel($key = null)
    {
        // Redirige vers la vue principale après annulation
        $this->setRedirect(JRoute::_('index.php?option=com_ateliers&view=ateliers', false));
    }

    public function save($key = null, $urlVar = null)
    {
        // Récupère les données soumises
        $data = $this->input->post->get('jform', array(), 'array');
    
        // Débogage pour voir les données reçues
        JFactory::getApplication()->enqueueMessage('Données reçues : ' . json_encode($data), 'debug');
    
        // Vérifie si le champ "titre" est présent
        if (empty($data['titre'])) {
            $this->setMessage(JText::_('COM_ATELIERS_ERROR_MISSING_TITLE'), 'error');
            $this->setRedirect(JRoute::_('index.php?option=com_ateliers&view=atelier&layout=edit', false));
            return false;
        }
    
        // Appelle la méthode parent pour sauvegarder
        if (!parent::save($key, $urlVar)) {
            return false;
        }
    
        // Redirige après enregistrement
        $this->setRedirect(JRoute::_('index.php?option=com_ateliers&view=ateliers', false));
        return true;
    }    
    

    public function save2new()
    {
        // Sauvegarde l'élément actuel et prépare un nouveau formulaire
        $data = $this->input->post->get('jform', array(), 'array');

        // Vérifie que le champ "titre" est présent avant de sauvegarder
        if (empty($data['titre'])) {
            $this->setMessage(JText::_('COM_ATELIERS_ERROR_MISSING_TITLE'), 'error');
            $this->setRedirect(JRoute::_('index.php?option=com_ateliers&view=atelier&layout=edit', false));
            return false;
        }

        // Appelle la méthode save du parent
        if (parent::save()) {
            // Réinitialise le formulaire pour un nouvel élément
            $this->setRedirect(JRoute::_('index.php?option=com_ateliers&view=atelier&layout=edit', false));
        } else {
            $this->setRedirect(JRoute::_('index.php?option=com_ateliers&view=ateliers', false));
        }
    }

    public function save2copy()
    {
        // Prépare la copie de l'élément actuel
        $data = $this->input->post->get('jform', array(), 'array');
        $data['id'] = 0; // Réinitialise l'ID pour créer une copie

        $model = $this->getModel();
        if ($model->save($data)) {
            $this->setRedirect(JRoute::_('index.php?option=com_ateliers&view=ateliers', false), JText::_('COM_ATELIERS_SAVE_SUCCESS'));
        } else {
            $this->setRedirect(JRoute::_('index.php?option=com_ateliers&view=atelier&layout=edit', false), JText::_('COM_ATELIERS_SAVE_FAILED'));
        }
    }

    public function delete()
    {
        // Récupère les ID des éléments à supprimer
        $ids = $this->input->get('cid', array(), 'array');

        if (!empty($ids)) {
            $model = $this->getModel();

            // Supprime les éléments sélectionnés
            if ($model->delete($ids)) {
                $this->setRedirect(JRoute::_('index.php?option=com_ateliers&view=ateliers', false), JText::_('COM_ATELIERS_DELETE_SUCCESS'));
            } else {
                $this->setRedirect(JRoute::_('index.php?option=com_ateliers&view=ateliers', false), JText::_('COM_ATELIERS_DELETE_FAILED'));
            }
        } else {
            $this->setRedirect(JRoute::_('index.php?option=com_ateliers&view=ateliers', false), JText::_('COM_ATELIERS_NO_SELECTION'));
        }
    }
}
