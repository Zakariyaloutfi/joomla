<?php
defined('_JEXEC') or die;

class AteliersModelAteliers extends JModelList
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id', 'a.id',
                'titre', 'a.titre', 
                'date_time', 'a.date_time',
                'places_available', 'a.places_available',
                'status', 'a.status',
                'created', 'a.created',
            );
        }

        parent::__construct($config);
    }

    protected function getListQuery()
    {
        // Récupère la connexion à la base de données
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Construction de la requête
        $query->select('a.*') // Sélectionne toutes les colonnes de la table aliasée "a"
              ->from($db->quoteName('#__ateliers', 'a')) // Table avec alias "a"
              ->order('a.date_time ASC'); // Trie par date

        return $query;
    }
}
