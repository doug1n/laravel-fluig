<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMSearchDocument
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por realizar operações referentes às buscas no fluig. Pode ser utilizado para buscar
 * documentos utilizando a busca simples e avançada.
 */
class ECMSearchDocument extends FluigWebService
{

    /**
     * ECMSearchDocument constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMSearchDocumentService?wsdl");
    }

    public function advancedSearchDocuments()
    {
    }

    public function advancedSearchDocumentsWithMetadata()
    {
    }

    public function searchDocuments()
    {
    }

    public function searchFavoritesDocuments()
    {
    }
}