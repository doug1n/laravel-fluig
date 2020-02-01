<?php

namespace doug1n\Fluig\Services;

/**
 * Class ECMFolder
 * @package doug1n\Fluig\Services
 *
 * Webservice responsável por realizar operações referentes a pastas no fluig. Pode ser utilizado para criar, alterar,
 * excluir e pesquisar pastas, entre outros recursos.
 */
class ECMFolder extends FluigWebService
{

    /**
     * ECMFolder constructor.
     */
    public function __construct()
    {
        parent::__construct("/webdesk/ECMFolderService?wsdl");
    }

    public function createFolder()
    {
    }

    public function createFolderWithApprovementLevels()
    {
    }

    public function createSimpleFolder()
    {
    }

    public function deleteDocument()
    {
    }

    public function destroyDocument()
    {
    }

    public function findRecycledDocuments()
    {
    }

    public function getApprovers()
    {
    }

    public function getChildren()
    {
    }

    public function getFolder()
    {
    }

    public function getPrivateChildren()
    {
    }

    public function getRootFolders()
    {
    }

    public function getSecurity()
    {
    }

    public function getSubFolders()
    {
    }

    public function getSubFoldersOnDemand()
    {
    }

    public function getSubFoldersPermission()
    {
    }

    public function getSubPrivateFolders()
    {
    }

    public function getUserPermissions()
    {
    }

    public function restoreDocument()
    {
    }

    public function updateFolder()
    {
    }

    public function updateFolderWithApprovementLevels()
    {
    }

    public function updateSimpleFolder()
    {
    }

}