<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMFavorites
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por interagir com os documentos e processos favoritos do fluig. Pode ser utilizado para
 * pesquisar os documentos e processos favoritos de cada usuário.
 */
class ECMFavorites extends FluigWebService
{

    /**
     * ECMFavorites constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMFavoritesService?wsdl");
    }

    public function addDocumentToFavorites()
    {
    }

    public function addProcessToFavorites()
    {
    }

    public function findFavorites()
    {
    }

    public function findFavoritesOnDemand()
    {
    }

    public function findFavoritesProcess()
    {
    }

    public function findFavoritesProcessOnDemand()
    {
    }

    public function isFavoriteDocument()
    {
    }

    public function removeFavoriteDocument()
    {
    }

    public function removeFavoriteProcess()
    {
    }
}